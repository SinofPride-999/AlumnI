<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($topic['title']) ?> - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/forum-topic.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>
<body class="dashboard">
    <!-- Header -->
    <?php
    require_once dirname(__DIR__, 2) . '/app/config.php';
    include BASE_PATH . '/partials/nav.php'; 
    ?>

    <!-- Main Content -->
    <main class="forum-topic-content">
        <div class="container">
            <!-- Breadcrumb Navigation -->
            <nav class="breadcrumb">
                <a href="/forum">Forum</a>
                <i class="fas fa-chevron-right"></i>
                <a href="/forum/category/<?= $topic['category_id'] ?>"><?= htmlspecialchars($topic['category_name']) ?></a>
                <i class="fas fa-chevron-right"></i>
                <span><?= htmlspecialchars($topic['title']) ?></span>
            </nav>

            <!-- Discussion Header -->
            <section class="discussion-header">
                <div class="header-content">
                    <div class="category-badge <?= strtolower(str_replace(' ', '-', $topic['category_name'])) ?>">
                        <?= htmlspecialchars($topic['category_name']) ?>
                    </div>
                    <h1><?= htmlspecialchars($topic['title']) ?></h1>
                    <div class="discussion-meta">
                        <div class="author-info">
                            <?php if (!empty($topic['profile_picture'])): ?>
                                <img src="<?= htmlspecialchars($topic['profile_picture']) ?>" alt="Author avatar">
                            <?php else: ?>
                                <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Author avatar">
                            <?php endif; ?>
                            <div>
                                <span class="author-name"><?= htmlspecialchars($topic['first_name'] . ' ' . $topic['last_name']) ?></span>
                                <span class="author-title">Class of <?= htmlspecialchars($topic['graduation_year'] ?? 'N/A') ?></span>
                            </div>
                        </div>
                        <div class="post-info">
                            <span class="post-time"><?= time_elapsed_string($topic['created_at']) ?></span>
                            <span class="post-views"><i class="far fa-eye"></i> <?= $topic['views'] ?> views</span>
                        </div>
                    </div>
                </div>
                <div class="discussion-actions">
                    <button class="btn btn-text">
                        <i class="far fa-bookmark"></i> Save
                    </button>
                    <button class="btn btn-text">
                        <i class="fas fa-share-alt"></i> Share
                    </button>
                </div>
            </section>

            <!-- Discussion Content -->
            <section class="discussion-content">
                <div class="post-content">
                    <?= nl2br(htmlspecialchars($topic['content'])) ?>
                </div>
                
                <div class="post-actions">
                    <div class="vote-controls">
                        <button class="vote-btn upvote">
                            <i class="fas fa-chevron-up"></i>
                        </button>
                        <span class="vote-count">0</span>
                        <button class="vote-btn downvote">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <button class="btn btn-text reply-btn">
                        <i class="far fa-comment"></i> Reply
                    </button>
                </div>
            </section>

            <!-- Replies Section -->
            <section class="replies-section">
                <div class="section-header">
                    <h2><?= count($posts) - 1 ?> Replies</h2>
                    <div class="sort-options">
                        <label for="sort-replies">Sort by:</label>
                        <select id="sort-replies">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="votes">Most Votes</option>
                        </select>
                    </div>
                </div>
                
                <?php foreach ($posts as $post): ?>
                    <?php if ($post['id'] != $topic['id']): // Skip the original post ?>
                    <div class="reply-card" data-post-id="<?= $post['id'] ?>">
                        <div class="reply-votes">
                            <button class="vote-btn upvote" data-vote-type="up">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="vote-count"><?= $post['upvotes'] - $post['downvotes'] ?></span>
                            <button class="vote-btn downvote" data-vote-type="down">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="reply-content">
                            <div class="reply-header">
                                <div class="author-info">
                                    <?php if (!empty($post['profile_picture'])): ?>
                                        <img src="<?= htmlspecialchars($post['profile_picture']) ?>" alt="User avatar">
                                    <?php else: ?>
                                        <img src="https://randomuser.me/api/portraits/men/31.jpg" alt="User avatar">
                                    <?php endif; ?>
                                    <div>
                                        <span class="author-name"><?= htmlspecialchars($post['first_name'] . ' ' . $post['last_name']) ?></span>
                                        <span class="author-title">Class of <?= htmlspecialchars($post['graduation_year'] ?? 'N/A') ?></span>
                                        <?php if ($post['is_answer']): ?>
                                            <span class="badge accepted-answer">Accepted Answer</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <span class="reply-time"><?= time_elapsed_string($post['created_at']) ?></span>
                            </div>
                            <div class="reply-text">
                                <?= nl2br(htmlspecialchars($post['content'])) ?>
                            </div>
                            <div class="reply-actions">
                                <button class="btn btn-text reply-to-post">
                                    <i class="far fa-comment"></i> Reply
                                </button>
                                <?php if ($topic['user_id'] == $_SESSION['user_id'] && !$post['is_answer'] && !$topic['is_closed']): ?>
                                    <button class="btn btn-text mark-answer" data-post-id="<?= $post['id'] ?>">
                                        <i class="fas fa-check"></i> Mark as Answer
                                    </button>
                                <?php endif; ?>
                                <button class="btn btn-text">
                                    <i class="fas fa-flag"></i> Report
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                
                <!-- Load More Replies -->
                <div class="load-more">
                    <button class="btn btn-text">
                        <i class="fas fa-chevron-down"></i> Load More Replies
                    </button>
                </div>
            </section>

            <!-- Reply Form -->
            <section class="reply-form-section">
                <h2>Post Your Reply</h2>
                <form id="replyForm" action="/forum/topic/<?= $topic['id'] ?>/reply" method="POST">
                    <div class="form-group">
                        <textarea id="reply-content" name="content" placeholder="Write your reply here..." required></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-text" id="cancelReplyBtn">Cancel</button>
                        <button type="submit" class="btn btn-primary">Post Reply</button>
                    </div>
                </form>
            </section>

            <!-- Similar Discussions -->
            <section class="similar-discussions">
                <h2 class="section-title">Similar Discussions</h2>
                <div class="discussion-list">
                    <!-- You would typically fetch these from your database -->
                    <div class="discussion-card">
                        <div class="discussion-content">
                            <div class="discussion-header">
                                <span class="category-badge career">Career</span>
                                <h3><a href="#">Tech interview preparation resources</a></h3>
                            </div>
                            <p class="discussion-excerpt">Sharing my curated list of resources that helped me land offers from FAANG companies...</p>
                            <div class="discussion-meta">
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> 32 replies</span>
                                    <span class="post-time">1 week ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="discussion-card">
                        <div class="discussion-content">
                            <div class="discussion-header">
                                <span class="category-badge career">Career</span>
                                <h3><a href="#">Remote work opportunities for alumni</a></h3>
                            </div>
                            <p class="discussion-excerpt">Compiling a list of companies that are hiring remote workers, with alumni referral options...</p>
                            <div class="discussion-meta">
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> 18 replies</span>
                                    <span class="post-time">2 weeks ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <?php 
    include BASE_PATH . '/partials/footer.php'; 
    ?>

    <!-- JavaScript -->
    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/js/forum-topic.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Voting functionality
            document.querySelectorAll('.vote-btn').forEach(button => {
                button.addEventListener('click', async function() {
                    const postId = this.closest('[data-post-id]').dataset.postId;
                    const voteType = this.dataset.voteType;
                    
                    try {
                        const response = await fetch(`/forum/post/${postId}/vote/${voteType}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        });
                        
                        if (!response.ok) throw new Error('Vote failed');
                        
                        const data = await response.json();
                        
                        if (data.error) {
                            alert(data.error);
                            return;
                        }
                        
                        // Update UI
                        const voteContainer = this.closest('.reply-votes');
                        const voteCount = voteContainer.querySelector('.vote-count');
                        voteCount.textContent = data.upvotes - data.downvotes;
                        
                        // Update active states
                        voteContainer.querySelectorAll('.vote-btn').forEach(btn => {
                            btn.classList.remove('active');
                        });
                        
                        if (data.user_vote === 'up') {
                            voteContainer.querySelector('.upvote').classList.add('active');
                        } else if (data.user_vote === 'down') {
                            voteContainer.querySelector('.downvote').classList.add('active');
                        }
                        
                    } catch (error) {
                        console.error('Vote error:', error);
                        alert('Failed to process your vote');
                    }
                });
            });
            
            // Mark as answer
            document.querySelectorAll('.mark-answer').forEach(button => {
                button.addEventListener('click', async function() {
                    const postId = this.dataset.postId;
                    
                    if (!confirm('Mark this post as the accepted answer?')) return;
                    
                    try {
                        const response = await fetch(`/forum/post/${postId}/answer`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        });
                        
                        if (!response.ok) throw new Error('Action failed');
                        
                        const data = await response.json();
                        
                        if (data.error) {
                            alert(data.error);
                            return;
                        }
                        
                        alert('Post marked as answer');
                        // Refresh or update UI
                        window.location.reload();
                        
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Failed to mark as answer');
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $weeks = floor($diff->d / 7);  // Calculate weeks separately
    $diff->d -= $weeks * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );

    // Inject 'w' into the diff manually
    $diff_array = (array) $diff;
    $diff_array['w'] = $weeks;

    foreach ($string as $k => &$v) {
        if (!empty($diff_array[$k])) {
            $v = $diff_array[$k] . ' ' . $v . ($diff_array[$k] > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>