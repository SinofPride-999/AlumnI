<?php
require_once __DIR__ . '/Controller.php';

class EventController extends Controller {
    public function show() {
        requireAuth();
        
        try {
            // Get all events ordered by date (newest first)
            $stmt = $this->pdo->prepare("
                SELECT e.*, u.first_name, u.last_name, u.profile_picture 
                FROM events e
                JOIN users u ON e.user_id = u.id
                ORDER BY e.event_date DESC
            ");
            $stmt->execute();
            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $this->renderView('pages/dashboard/events.view.php', [
                'events' => $events,
                'current_user_id' => $_SESSION['user_id']
            ]);
            
        } catch (PDOException $e) {
            error_log("Events error: " . $e->getMessage());
            $this->renderView('pages/dashboard/events.view.php', [
                'events' => []
            ]);
        }
    }

    public function showDetail($id) {
        requireAuth();
        
        try {
            $stmt = $this->pdo->prepare("
                SELECT e.*, u.first_name, u.last_name, u.profile_picture 
                FROM events e
                JOIN users u ON e.user_id = u.id
                WHERE e.id = ?
            ");
            $stmt->execute([$id]);
            $event = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$event) {
                redirect('/events');
            }
            
            $this->renderView('pages/dashboard/event-detail.view.php', [
                'event' => $event,
                'current_user_id' => $_SESSION['user_id']
            ]);
            
        } catch (PDOException $e) {
            error_log("Event detail error: " . $e->getMessage());
            redirect('/events');
        }
    }

    public function create() {
        requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $title = $_POST['title'] ?? '';
                $description = $_POST['description'] ?? '';
                $location = $_POST['location'] ?? '';
                $eventDate = $_POST['event_date'] ?? '';
                $isOnline = isset($_POST['is_online']) ? 1 : 0;

                // Basic validation
                if (empty($title)) {
                    throw new Exception('Title is required');
                }

                $stmt = $this->pdo->prepare("
                    INSERT INTO events 
                    (user_id, title, description, location, event_date, is_online)
                    VALUES (?, ?, ?, ?, ?, ?)
                ");
                $stmt->execute([
                    $_SESSION['user_id'],
                    $title,
                    $description,
                    $location,
                    $eventDate,
                    $isOnline
                ]);

                redirect('/events');
                
            } catch (Exception $e) {
                error_log("Create event error: " . $e->getMessage());
                $this->renderView('pages/dashboard/event-create.view.php', [
                    'error' => $e->getMessage(),
                    'formData' => $_POST
                ]);
            }
        } else {
            $this->renderView('pages/dashboard/event-create.view.php');
        }
    }

    public function edit($id) {
        requireAuth();
        
        try {
            // Get the event
            $stmt = $this->pdo->prepare("SELECT * FROM events WHERE id = ?");
            $stmt->execute([$id]);
            $event = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$event) {
                redirect('/events');
            }
            
            // Check if current user is the creator
            if ($event['user_id'] != $_SESSION['user_id']) {
                redirect('/events');
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = $_POST['title'] ?? '';
                $description = $_POST['description'] ?? '';
                $location = $_POST['location'] ?? '';
                $eventDate = $_POST['event_date'] ?? '';
                $isOnline = isset($_POST['is_online']) ? 1 : 0;

                // Basic validation
                if (empty($title)) {
                    throw new Exception('Title is required');
                }

                $stmt = $this->pdo->prepare("
                    UPDATE events SET
                    title = ?,
                    description = ?,
                    location = ?,
                    event_date = ?,
                    is_online = ?,
                    updated_at = CURRENT_TIMESTAMP
                    WHERE id = ?
                ");
                $stmt->execute([
                    $title,
                    $description,
                    $location,
                    $eventDate,
                    $isOnline,
                    $id
                ]);

                redirect('/events/' . $id);
                
            } else {
                $this->renderView('pages/dashboard/event-edit.view.php', [
                    'event' => $event
                ]);
            }
            
        } catch (Exception $e) {
            error_log("Edit event error: " . $e->getMessage());
            redirect('/events');
        }
    }

    public function delete($id) {
        requireAuth();
        
        try {
            // First check if the event exists and belongs to the user
            $stmt = $this->pdo->prepare("SELECT user_id FROM events WHERE id = ?");
            $stmt->execute([$id]);
            $event = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($event && $event['user_id'] == $_SESSION['user_id']) {
                $stmt = $this->pdo->prepare("DELETE FROM events WHERE id = ?");
                $stmt->execute([$id]);
            }
            
            redirect('/events');
            
        } catch (Exception $e) {
            error_log("Delete event error: " . $e->getMessage());
            redirect('/events');
        }
    }
}