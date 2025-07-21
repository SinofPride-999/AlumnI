<?php
require_once __DIR__ . '/Controller.php';

class ProfileController extends Controller {
    public function show() {
        requireAuth();
        $this->renderView('pages/dashboard/profile.view.php');
    }

    public function update() {
      try {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/profile');
        }

        // Validate and sanitize input
        $data = [
            'first_name' => sanitizeInput($_POST['first_name']),
            'last_name' => sanitizeInput($_POST['last_name']),
            'graduation_year' => intval($_POST['graduation_year']),
            'degree_program' => sanitizeInput($_POST['degree_program']),
            'current_job_title' => sanitizeInput($_POST['current_job_title'] ?? null),
            'current_company' => sanitizeInput($_POST['current_company'] ?? null),
            'bio' => sanitizeInput($_POST['bio'] ?? null),
            'linkedin_url' => filter_var($_POST['linkedin_url'] ?? null, FILTER_SANITIZE_URL),
            'personal_website_url' => filter_var($_POST['personal_website_url'] ?? null, FILTER_SANITIZE_URL),
            'twitter_url' => filter_var($_POST['twitter_url'] ?? null, FILTER_SANITIZE_URL),
            'instagram_url' => filter_var($_POST['instagram_url'] ?? null, FILTER_SANITIZE_URL),
            'whatsapp_url' => filter_var($_POST['whatsapp_url'] ?? null, FILTER_SANITIZE_URL),
            'phone_number' => sanitizeInput($_POST['phone_number'] ?? null),
            'id' => $_SESSION['user_id']
        ];

        // Handle file upload
        if (!empty($_FILES['profile_picture']['name'])) {
            $uploadResult = $this->handleFileUpload();
            if ($uploadResult['success']) {
                $data['profile_picture'] = $uploadResult['path'];
            } else {
                $_SESSION['profile_errors'] = ['profile_picture' => $uploadResult['error']];
                redirect('/profile');
            }
        }

        // Update user in database
        $sql = "UPDATE users SET 
                first_name = :first_name,
                last_name = :last_name,
                graduation_year = :graduation_year,
                degree_program = :degree_program,
                current_job_title = :current_job_title,
                current_company = :current_company,
                bio = :bio,
                linkedin_url = :linkedin_url,
                personal_website_url = :personal_website_url,
                twitter_url = :twitter_url,
                instagram_url = :instagram_url,
                whatsapp_url = :whatsapp_url,
                phone_number = :phone_number"
        ;
        
        // Add profile picture if uploaded
        if (isset($data['profile_picture'])) {
            $sql .= ", profile_picture = :profile_picture";
        }
        
        $sql .= " WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);

        $_SESSION['profile_success'] = 'Profile updated successfully!';
        
        redirect('/profile');

      } catch (Exception $e) {
        error_log("Profile update error: " . $e->getMessage());
        $_SESSION['profile_errors'] = ['general' => 'An error occurred while updating your profile'];
        redirect('/profile');
      }
    }

    private function handleFileUpload() {
      try {
          $targetDir = __DIR__ . "/../../public/uploads/profiles/";
          
          // Create directory if it doesn't exist
          if (!file_exists($targetDir)) {
              if (!mkdir($targetDir, 0755, true)) {
                  throw new Exception('Failed to create upload directory');
              }
          }

          // Verify directory is writable
          if (!is_writable($targetDir)) {
              throw new Exception('Upload directory is not writable');
          }

          $fileName = uniqid() . '-' . basename($_FILES["profile_picture"]["name"]);
          $targetFile = $targetDir . $fileName;
          $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
          $maxFileSize = 2 * 1024 * 1024; // 2MB

          // Check if file is an actual image
          $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
          if ($check === false) {
              throw new Exception('File is not an image');
          }

          // Check file size
          if ($_FILES["profile_picture"]["size"] > $maxFileSize) {
              throw new Exception('File is too large (max 2MB)');
          }

          // Allow certain file formats
          if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
              throw new Exception('Only JPG, JPEG, PNG & GIF files are allowed');
          }

          // Try to upload file
          if (!move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
              throw new Exception('Error uploading file');
          }

          return ['success' => true, 'path' => "/public/uploads/profiles/" . $fileName];
          
      } catch (Exception $e) {
          error_log("File upload error: " . $e->getMessage());
          return ['success' => false, 'error' => $e->getMessage()];
      }
    }
}