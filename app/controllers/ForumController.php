<?php
require_once __DIR__ . '/Controller.php';

class ForumController extends Controller {

    public function __construct($pdo) {
        parent::__construct($pdo);
    }
    public function index() {
        requireAuth();

        try {
            $categories = $this->getCategoriesWithStats();
            error_log("Categories: " . print_r($categories, true)); // Debug
            
            $discussions = $this->getRecentDiscussions();
            error_log("Discussions: " . print_r($discussions, true)); // Debug
            
            $popularAlumni = $this->getPopularAlumni();
            error_log("Popular Alumni: " . print_r($popularAlumni, true)); // Debug

            $this->renderView('pages/dashboard/forum.view.php', [
                'categories' => $categories,
                'discussions' => $discussions,
                'popularAlumni' => $popularAlumni,
                'current_user_id' => $_SESSION['user_id']
            ]);

        } catch (Exception $e) {
            error_log("ForumController ERROR: " . $e->getMessage());
            error_log("Stack trace: " . $e->getTraceAsString());
            
            $this->renderView('pages/dashboard/forum.view.php', [
                'categories' => [],
                'discussions' => [],
                'popularAlumni' => [],
                'current_user_id' => $_SESSION['user_id'],
                'error' => "Unable to load forum at this time. Error: " . $e->getMessage()
            ]);
        }
    }
    
    public function showCategory($categoryId) {
        requireAuth();
        
        try {
            // Get category details
            $stmt = $this->pdo->prepare("SELECT * FROM forum_categories WHERE id = ?");
            $stmt->execute([$categoryId]);
            $category = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$category) {
                redirect('/forum');
            }
            
            // Get topics in this category
            $stmt = $this->pdo->prepare("
                SELECT t.*, u.first_name, u.last_name, u.profile_picture,
                (SELECT COUNT(*) FROM forum_posts WHERE topic_id = t.id) as reply_count
                FROM forum_topics t
                JOIN users u ON t.user_id = u.id
                WHERE t.category_id = ?
                ORDER BY t.is_pinned DESC, t.updated_at DESC
            ");
            $stmt->execute([$categoryId]);
            $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $this->renderView('pages/dashboard/forum-category.view.php', [
                'category' => $category,
                'topics' => $topics
            ]);
            
        } catch (PDOException $e) {
            error_log("Forum category error: " . $e->getMessage());
            redirect('/forum');
        }
    }
    
    public function showTopic($topicId) {
        requireAuth();
        
        try {
            // Get topic details
            $stmt = $this->pdo->prepare("
                SELECT t.*, u.first_name, u.last_name, u.profile_picture, c.name as category_name
                FROM forum_topics t
                JOIN users u ON t.user_id = u.id
                JOIN forum_categories c ON t.category_id = c.id
                WHERE t.id = ?
            ");
            $stmt->execute([$topicId]);
            $topic = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$topic) {
                redirect('/forum');
            }
            
            // Increment view count
            $this->pdo->prepare("UPDATE forum_topics SET views = views + 1 WHERE id = ?")
                ->execute([$topicId]);
            
            // Get posts (replies)
            $stmt = $this->pdo->prepare("
                SELECT p.*, u.first_name, u.last_name, u.profile_picture,
                (SELECT COUNT(*) FROM forum_votes WHERE post_id = p.id AND vote_type = 'up') as upvotes,
                (SELECT COUNT(*) FROM forum_votes WHERE post_id = p.id AND vote_type = 'down') as downvotes,
                (SELECT vote_type FROM forum_votes WHERE post_id = p.id AND user_id = ?) as user_vote
                FROM forum_posts p
                JOIN users u ON p.user_id = u.id
                WHERE p.topic_id = ?
                ORDER BY p.is_answer DESC, p.created_at ASC
            ");
            $stmt->execute([$_SESSION['user_id'], $topicId]);
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $this->renderView('pages/dashboard/forum-topic.view.php', [
                'topic' => $topic,
                'posts' => $posts
            ]);
            
        } catch (PDOException $e) {
            error_log("Forum topic error: " . $e->getMessage());
            redirect('/forum');
        }
    }
    
    public function createTopic() {
        requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleCreateTopic();
            return;
        }
        
        try {
            $categories = $this->pdo->query("SELECT * FROM forum_categories ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
            $this->renderView('pages/dashboard/forum-create-topic.view.php', [
                'categories' => $categories
            ]);
        } catch (PDOException $e) {
            error_log("Forum create topic error: " . $e->getMessage());
            redirect('/forum');
        }
    }
    
    private function handleCreateTopic() {
        try {
            $errors = [];
            
            $categoryId = intval($_POST['category_id']);
            $title = sanitizeInput($_POST['title']);
            $content = sanitizeInput($_POST['content']);
            
            if (empty($categoryId)) $errors['category'] = 'Category is required';
            if (empty($title)) $errors['title'] = 'Title is required';
            if (empty($content)) $errors['content'] = 'Content is required';
            
            if (!empty($errors)) {
                $_SESSION['forum_errors'] = $errors;
                $_SESSION['forum_data'] = $_POST;
                redirect('/forum/new-topic');
            }
            
            // Create topic
            $stmt = $this->pdo->prepare("
                INSERT INTO forum_topics (user_id, category_id, title, content)
                VALUES (?, ?, ?, ?)
            ");
            $stmt->execute([
                $_SESSION['user_id'],
                $categoryId,
                $title,
                $content
            ]);
            
            $topicId = $this->pdo->lastInsertId();
            
            $_SESSION['forum_success'] = 'Topic created successfully!';
            redirect("/forum/topic/$topicId");
            
        } catch (PDOException $e) {
            error_log("Topic creation error: " . $e->getMessage());
            $_SESSION['forum_error'] = 'An error occurred while creating the topic';
            redirect('/forum/new-topic');
        }
    }
    
    public function createPost($topicId) {
        requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect("/forum/topic/$topicId");
        }
        
        try {
            $content = sanitizeInput($_POST['content']);
            
            if (empty($content)) {
                $_SESSION['post_error'] = 'Post content cannot be empty';
                redirect("/forum/topic/$topicId");
            }
            
            // Create post
            $stmt = $this->pdo->prepare("
                INSERT INTO forum_posts (topic_id, user_id, content)
                VALUES (?, ?, ?)
            ");
            $stmt->execute([
                $topicId,
                $_SESSION['user_id'],
                $content
            ]);
            
            // Update topic's updated_at
            $this->pdo->prepare("UPDATE forum_topics SET updated_at = CURRENT_TIMESTAMP WHERE id = ?")
                ->execute([$topicId]);
            
            $_SESSION['post_success'] = 'Reply posted successfully!';
            redirect("/forum/topic/$topicId");
            
        } catch (PDOException $e) {
            error_log("Post creation error: " . $e->getMessage());
            $_SESSION['post_error'] = 'An error occurred while posting your reply';
            redirect("/forum/topic/$topicId");
        }
    }
    
    public function votePost($postId, $voteType) {
        requireAuth();
        
        if (!in_array($voteType, ['up', 'down'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid vote type']);
            return;
        }
        
        try {
            // Check if user already voted
            $stmt = $this->pdo->prepare("
                SELECT vote_type FROM forum_votes 
                WHERE user_id = ? AND post_id = ?
            ");
            $stmt->execute([$_SESSION['user_id'], $postId]);
            $existingVote = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($existingVote) {
                if ($existingVote['vote_type'] === $voteType) {
                    // Remove vote
                    $this->pdo->prepare("DELETE FROM forum_votes WHERE user_id = ? AND post_id = ?")
                        ->execute([$_SESSION['user_id'], $postId]);
                } else {
                    // Change vote
                    $this->pdo->prepare("UPDATE forum_votes SET vote_type = ? WHERE user_id = ? AND post_id = ?")
                        ->execute([$voteType, $_SESSION['user_id'], $postId]);
                }
            } else {
                // New vote
                $this->pdo->prepare("INSERT INTO forum_votes (user_id, post_id, vote_type) VALUES (?, ?, ?)")
                    ->execute([$_SESSION['user_id'], $postId, $voteType]);
            }
            
            // Return updated vote counts
            $stmt = $this->pdo->prepare("
                SELECT 
                (SELECT COUNT(*) FROM forum_votes WHERE post_id = ? AND vote_type = 'up') as upvotes,
                (SELECT COUNT(*) FROM forum_votes WHERE post_id = ? AND vote_type = 'down') as downvotes,
                (SELECT vote_type FROM forum_votes WHERE post_id = ? AND user_id = ?) as user_vote
            ");
            $stmt->execute([$postId, $postId, $postId, $_SESSION['user_id']]);
            $votes = $stmt->fetch(PDO::FETCH_ASSOC);
            
            header('Content-Type: application/json');
            echo json_encode($votes);
            
        } catch (PDOException $e) {
            error_log("Vote error: " . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'An error occurred while processing your vote']);
        }
    }
    
    public function markAsAnswer($postId) {
        requireAuth();
        
        try {
            // Verify user owns the topic
            $stmt = $this->pdo->prepare("
                SELECT t.user_id FROM forum_topics t
                JOIN forum_posts p ON p.topic_id = t.id
                WHERE p.id = ?
            ");
            $stmt->execute([$postId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$result || $result['user_id'] != $_SESSION['user_id']) {
                http_response_code(403);
                echo json_encode(['error' => 'You can only mark answers for your own topics']);
                return;
            }
            
            // Get topic ID
            $stmt = $this->pdo->prepare("SELECT topic_id FROM forum_posts WHERE id = ?");
            $stmt->execute([$postId]);
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$post) {
                http_response_code(404);
                echo json_encode(['error' => 'Post not found']);
                return;
            }
            
            // Clear any existing answer for this topic
            $this->pdo->prepare("UPDATE forum_posts SET is_answer = FALSE WHERE topic_id = ?")
                ->execute([$post['topic_id']]);
            
            // Mark this post as answer
            $this->pdo->prepare("UPDATE forum_posts SET is_answer = TRUE WHERE id = ?")
                ->execute([$postId]);
            
            // Close the topic
            $this->pdo->prepare("UPDATE forum_topics SET is_closed = TRUE WHERE id = ?")
                ->execute([$post['topic_id']]);
            
            echo json_encode(['success' => true]);
            
        } catch (PDOException $e) {
            error_log("Mark as answer error: " . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'An error occurred while marking the answer']);
        }
    }
    
    private function getCategoriesWithStats() {
        $stmt = $this->pdo->query("
            SELECT c.*, 
            (SELECT COUNT(*) FROM forum_topics WHERE category_id = c.id) as topic_count,
            (SELECT COUNT(*) FROM forum_posts p JOIN forum_topics t ON p.topic_id = t.id WHERE t.category_id = c.id) as post_count
            FROM forum_categories c
            ORDER BY c.name
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    private function getRecentDiscussions($limit = 5) {
        try {
            $query = "
                SELECT 
                    t.id, 
                    t.title, 
                    t.content, 
                    t.created_at, 
                    t.views,
                    u.id as user_id, 
                    u.first_name, 
                    u.last_name, 
                    u.profile_picture,
                    u.graduation_year,
                    u.degree_program,
                    c.name as category_name,
                    (SELECT COUNT(*) FROM forum_posts WHERE topic_id = t.id) as reply_count
                FROM forum_topics t
                JOIN users u ON t.user_id = u.id
                JOIN forum_categories c ON t.category_id = c.id
                ORDER BY t.created_at DESC
                LIMIT ?
            ";
            
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("PDO Error in getRecentDiscussions(): " . $e->getMessage());
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
    
    private function getPopularAlumni($limit = 3) {
        try {
            $stmt = $this->pdo->prepare("
                SELECT u.id, u.first_name, u.last_name, u.profile_picture, 
                u.graduation_year, u.degree_program,
                (SELECT COUNT(*) FROM forum_topics WHERE user_id = u.id) as topic_count,
                (SELECT COUNT(*) FROM forum_posts WHERE user_id = u.id) as post_count
                FROM users u
                WHERE (SELECT COUNT(*) FROM forum_topics WHERE user_id = u.id) > 0
                OR (SELECT COUNT(*) FROM forum_posts WHERE user_id = u.id) > 0
                ORDER BY (topic_count + post_count) DESC
                LIMIT ?
            ");
            $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("PDO Error in getPopularAlumni(): " . $e->getMessage());
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    
}