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
    <header id="dashboard-header">
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="home.html" class="logo">
                        <i class="fas fa-graduation-cap"></i>
                        <span>AlumnI</span>
                    </a>
                </div>
                
                <div class="nav-actions">
                    <button class="theme-toggle" id="themeToggle">
                        <i class="fas fa-moon"></i>
                    </button>

                    <div class="user-menu">
                        <?php $user = $GLOBALS['auth_user'] ?? null; ?>
                        
                        <button class="user-avatar" id="userMenuBtn">
                            <?php if (!empty($user['profile_picture'])): ?>
                                <a href="/profile">
                                    <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="Profile picture">
                                </a>
                            <?php else: ?>
                                <a href="/profile">
                                    <img src="https://t3.ftcdn.net/jpg/06/31/16/54/360_F_631165406_6HfMsexCGHstso3udEHJmlFVzdSOevJ5.jpg" alt="Default avatar">
                                </a>
                            <?php endif; ?>
                        </button>
                    </div>

                    <!-- Logout Button -->
                    <form action="/logout" method="POST" style="display: inline;">
                        <button type="submit" class="btn btn-secondary logout-btn" style="margin-left: 1rem;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </nav>
        </div>
    </header>

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
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>AlumnI</h3>
                    <p>Bridging the gap between alumni and their alma mater through technology and community.</p>
                </div>
                
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#team">Team</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 AlumnI. All rights reserved. Developed by Group 12.</p>
            </div>
        </div>
    </footer>

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