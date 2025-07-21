<?php
require_once __DIR__ . '/Controller.php';

class JobsController extends Controller {
    public function show() {
        requireAuth();
        
        try {
            $search = $_GET['search'] ?? '';
            $category = $_GET['category'] ?? '';
            $technology = $_GET['technology'] ?? '';
            
            $query = "SELECT j.*, u.first_name, u.last_name, u.profile_picture 
                      FROM jobs j
                      JOIN users u ON j.user_id = u.id
                      WHERE j.is_active = TRUE";
            
            $params = [];
            
            if (!empty($search)) {
                $query .= " AND (j.title LIKE ? OR j.company LIKE ? OR j.description LIKE ?)";
                $params = array_merge($params, ["%$search%", "%$search%", "%$search%"]);
            }
            
            if (!empty($category)) {
                $query .= " AND j.category = ?";
                $params[] = $category;
            }
            
            if (!empty($technology)) {
                $query .= " AND FIND_IN_SET(?, j.technologies)";
                $params[] = $technology;
            }
            
            $query .= " ORDER BY j.created_at DESC";
            
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Get distinct categories and technologies for filters
            $categories = $this->getDistinctValues('category');
            $technologies = $this->getTechnologiesList();
            
            $this->renderView('pages/dashboard/jobs.view.php', [
                'jobs' => $jobs,
                'search' => $search,
                'category' => $category,
                'technology' => $technology,
                'categories' => $categories,
                'technologies' => $technologies,
                'current_user_id' => $_SESSION['user_id'] // Add this line
            ]);
            
        } catch (PDOException $e) {
            error_log("Jobs error: " . $e->getMessage());
            $this->renderView('pages/dashboard/jobs.view.php', [
                'jobs' => [],
                'error' => "Unable to load jobs at this time"
            ]);
        }
    }
    
    public function create() {
        requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleCreate();
            return;
        }
        
        $categories = $this->getDistinctValues('category');
        $technologies = $this->getTechnologiesList();
        
        $this->renderView('pages/dashboard/job-create.view.php', [
            'categories' => $categories,
            'technologies' => $technologies
        ]);
    }
    
    private function handleCreate() {
        try {
            $errors = [];
            
            // Validate input
            $title = sanitizeInput($_POST['title']);
            $company = sanitizeInput($_POST['company']);
            $location = sanitizeInput($_POST['location']);
            $description = sanitizeInput($_POST['description']);
            $requirements = sanitizeInput($_POST['requirements']);
            $jobType = sanitizeInput($_POST['job_type']);
            $category = sanitizeInput($_POST['category']);
            $salaryRange = sanitizeInput($_POST['salary_range'] ?? '');
            $applicationEmail = filter_var($_POST['application_email'], FILTER_SANITIZE_EMAIL);
            $applicationUrl = filter_var($_POST['application_url'] ?? '', FILTER_SANITIZE_URL);
            $technologies = sanitizeInput($_POST['technologies'] ?? '');
            
            // Basic validation
            if (empty($title)) $errors['title'] = 'Title is required';
            if (empty($company)) $errors['company'] = 'Company is required';
            if (empty($location)) $errors['location'] = 'Location is required';
            if (empty($description)) $errors['description'] = 'Description is required';
            if (empty($requirements)) $errors['requirements'] = 'Requirements are required';
            if (empty($jobType)) $errors['job_type'] = 'Job type is required';
            if (empty($category)) $errors['category'] = 'Category is required';
            
            if (!empty($applicationEmail) && !filter_var($applicationEmail, FILTER_VALIDATE_EMAIL)) {
                $errors['application_email'] = 'Invalid email format';
            }
            
            if (!empty($applicationUrl) && !filter_var($applicationUrl, FILTER_VALIDATE_URL)) {
                $errors['application_url'] = 'Invalid URL format';
            }
            
            if (!empty($errors)) {
                $_SESSION['job_errors'] = $errors;
                $_SESSION['job_data'] = $_POST;
                redirect('/jobs/create');
            }
            
            // Insert job into database
            $stmt = $this->pdo->prepare("INSERT INTO jobs 
                (user_id, title, company, location, description, requirements, 
                 job_type, category, salary_range, application_email, 
                 application_url, technologies)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
            $stmt->execute([
                $_SESSION['user_id'],
                $title,
                $company,
                $location,
                $description,
                $requirements,
                $jobType,
                $category,
                $salaryRange,
                $applicationEmail,
                $applicationUrl,
                $technologies
            ]);
            
            $_SESSION['job_success'] = 'Job posted successfully!';
            redirect('/jobs');
            
        } catch (PDOException $e) {
            error_log("Job creation error: " . $e->getMessage());
            $_SESSION['job_errors'] = ['general' => 'An error occurred while posting the job'];
            redirect('/jobs/create');
        }
    }
    
    private function getDistinctValues($column) {
        try {
            $stmt = $this->pdo->prepare("SELECT DISTINCT $column FROM jobs WHERE is_active = TRUE ORDER BY $column");
            $stmt->execute();
            $values = $stmt->fetchAll(PDO::FETCH_COLUMN);
            
            // If no values found, return default categories
            if (empty($values)) {
                return [
                    'Software Engineering',
                    'Networking',
                    'DevOps',
                    'Systems Programmer',
                    'IT',
                    'Cyber Security',
                    'Data Science',
                    'AI/ML',
                    'Robotics',
                    'IoT',
                    'Embedded',
                    'Cloud',
                    'Web Development',
                    'App Development',
                    'Desktop App Development'
                ];
            }
            
            return $values;
        } catch (PDOException $e) {
            error_log("Error getting distinct values: " . $e->getMessage());
            return [];
        }
    }
    
    private function getTechnologiesList() {
        $stmt = $this->pdo->query("SELECT technologies FROM jobs WHERE is_active = TRUE");
        $technologies = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (!empty($row['technologies'])) {
                $techs = explode(',', $row['technologies']);
                foreach ($techs as $tech) {
                    $tech = trim($tech);
                    if (!empty($tech) && !in_array($tech, $technologies)) {
                        $technologies[] = $tech;
                    }
                }
            }
        }
        
        sort($technologies);
        return $technologies;
    }

    public function edit($jobId) {
        requireAuth();
        
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM jobs WHERE id = ? AND user_id = ?");
            $stmt->execute([$jobId, $_SESSION['user_id']]);
            $job = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$job) {
                $_SESSION['error'] = 'Job not found or you do not have permission to edit it';
                redirect('/jobs');
            }
            
            $categories = $this->getDistinctValues('category');
            $technologies = $this->getTechnologiesList();
            
            $this->renderView('pages/dashboard/job-edit.view.php', [
                'job' => $job,
                'categories' => $categories,
                'technologies' => $technologies
            ]);
            
        } catch (PDOException $e) {
            error_log("Job edit error: " . $e->getMessage());
            $_SESSION['error'] = 'Error loading job for editing';
            redirect('/jobs');
        }
    }

    public function update($jobId) {
        requireAuth();
        
        try {
            // Verify job exists and belongs to user
            $stmt = $this->pdo->prepare("SELECT id FROM jobs WHERE id = ? AND user_id = ?");
            $stmt->execute([$jobId, $_SESSION['user_id']]);
            if (!$stmt->fetch()) {
                $_SESSION['error'] = 'Job not found or you do not have permission to edit it';
                redirect('/jobs');
            }
            
            // Same validation as create
            $errors = [];
            $title = sanitizeInput($_POST['title']);
            $company = sanitizeInput($_POST['company']);
            $location = sanitizeInput($_POST['location']);
            $description = sanitizeInput($_POST['description']);
            $requirements = sanitizeInput($_POST['requirements']);
            $jobType = sanitizeInput($_POST['job_type']);
            $category = sanitizeInput($_POST['category']);
            $salaryRange = sanitizeInput($_POST['salary_range'] ?? '');
            $applicationEmail = filter_var($_POST['application_email'], FILTER_SANITIZE_EMAIL);
            $applicationUrl = filter_var($_POST['application_url'] ?? '', FILTER_SANITIZE_URL);
            $technologies = sanitizeInput($_POST['technologies'] ?? '');
            
            // Validation (same as create)
            if (empty($title)) $errors['title'] = 'Title is required';
            if (empty($company)) $errors['company'] = 'Company is required';
            if (empty($location)) $errors['location'] = 'Location is required';
            if (empty($description)) $errors['description'] = 'Description is required';
            if (empty($requirements)) $errors['requirements'] = 'Requirements are required';
            if (empty($jobType)) $errors['job_type'] = 'Job type is required';
            if (empty($category)) $errors['category'] = 'Category is required';
            
            if (!empty($applicationEmail) && !filter_var($applicationEmail, FILTER_VALIDATE_EMAIL)) {
                $errors['application_email'] = 'Invalid email format';
            }
            
            if (!empty($applicationUrl) && !filter_var($applicationUrl, FILTER_VALIDATE_URL)) {
                $errors['application_url'] = 'Invalid URL format';
            }
            
            if (!empty($errors)) {
                $_SESSION['job_errors'] = $errors;
                $_SESSION['job_data'] = $_POST;
                redirect("/jobs/edit/$jobId");
            }
            
            // Update job
            $stmt = $this->pdo->prepare("UPDATE jobs SET 
                title = ?, company = ?, location = ?, description = ?, requirements = ?,
                job_type = ?, category = ?, salary_range = ?, application_email = ?,
                application_url = ?, technologies = ?, updated_at = CURRENT_TIMESTAMP
                WHERE id = ? AND user_id = ?");
                
            $stmt->execute([
                $title, $company, $location, $description, $requirements,
                $jobType, $category, $salaryRange, $applicationEmail,
                $applicationUrl, $technologies, $jobId, $_SESSION['user_id']
            ]);
            
            $_SESSION['job_success'] = 'Job updated successfully!';
            redirect('/jobs');
            
        } catch (PDOException $e) {
            error_log("Job update error: " . $e->getMessage());
            $_SESSION['error'] = 'Error updating job';
            redirect("/jobs/edit/$jobId");
        }
    }

    public function delete($jobId) {
        requireAuth();
        
        try {
            // Soft delete (set is_active to false)
            $stmt = $this->pdo->prepare("UPDATE jobs SET is_active = FALSE WHERE id = ? AND user_id = ?");
            $stmt->execute([$jobId, $_SESSION['user_id']]);
            
            if ($stmt->rowCount() > 0) {
                $_SESSION['job_success'] = 'Job deleted successfully!';
            } else {
                $_SESSION['error'] = 'Job not found or you do not have permission to delete it';
            }
            
            redirect('/jobs');
            
        } catch (PDOException $e) {
            error_log("Job delete error: " . $e->getMessage());
            $_SESSION['error'] = 'Error deleting job';
            redirect('/jobs');
        }
    }

}