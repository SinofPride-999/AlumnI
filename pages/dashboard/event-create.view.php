<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event Announcement - Alumni Connect</title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/events.css">
    <style>
        /* Enhanced form styles */
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: var(--color-card-bg);
            border-radius: 12px;
            box-shadow: var(--shadow);
        }
        
        .form-header {
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .form-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--color-primary);
        }
        
        .form-header p {
            color: var(--color-text-secondary);
        }
        
        .event-form {
            display: grid;
            gap: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--color-text);
        }
        
        .form-group input[type="text"],
        .form-group input[type="datetime-local"],
        .form-group textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid rgba(var(--color-text), 0.2);
            border-radius: 8px;
            background-color: var(--color-bg);
            color: var(--color-text);
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        
        .form-group input[type="text"]:focus,
        .form-group input[type="datetime-local"]:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.1);
        }
        
        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--color-primary);
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(var(--color-text), 0.1);
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column-reverse;
            }
            
            .form-actions .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body class="dashboard">
    <!-- Simplified Header -->
    <?php
    define('BASE_PATH', dirname(__DIR__, 2));
    include BASE_PATH . '/partials/nav.php'; 
    ?>

    <main class="dashboard-content">
        <div class="container">
            <div class="form-container">
                <div class="form-header">
                    <h1>Create Event Announcement</h1>
                    <p>Share upcoming events with the alumni community</p>
                </div>
                
                <?php if (!empty($error)): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="event-form">
                    <div class="form-group">
                        <label for="title">Event Title*</label>
                        <input type="text" id="title" name="title" required 
                               value="<?= htmlspecialchars($formData['title'] ?? '') ?>"
                               placeholder="Enter event title">
                    </div>

                    <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea id="description" name="description" required
                                  placeholder="Provide details about the event"><?= 
                            htmlspecialchars($formData['description'] ?? '') 
                        ?></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="event_date">Date & Time*</label>
                            <input type="datetime-local" id="event_date" name="event_date" required
                                   value="<?= htmlspecialchars($formData['event_date'] ?? '') ?>">
                        </div>

                        <div class="form-group">
                            <label>Event Type</label>
                            <div class="checkbox-group">
                                <input type="checkbox" id="is_online" name="is_online" 
                                    <?= isset($formData['is_online']) ? 'checked' : '' ?>>
                                <label for="is_online">Online Event</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location">Location*</label>
                        <input type="text" id="location" name="location" required
                               value="<?= htmlspecialchars($formData['location'] ?? '') ?>"
                               placeholder="Physical address or online meeting link">
                    </div>

                    <div class="form-actions">
                        <a href="/events" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-calendar-plus"></i> Create Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php 
    include BASE_PATH . '/partials/footer.php'; 
    ?>

    <!-- JavaScript -->
    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
    <script>
        // Set default datetime to now + 1 hour
        document.addEventListener('DOMContentLoaded', function() {
            const now = new Date();
            now.setHours(now.getHours() + 1);
            
            // Format for datetime-local input
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            
            const datetimeString = `${year}-${month}-${day}T${hours}:${minutes}`;
            
            // Only set if no existing value
            const datetimeInput = document.getElementById('event_date');
            if (!datetimeInput.value) {
                datetimeInput.value = datetimeString;
            }
        });
    </script>
</body>
</html>