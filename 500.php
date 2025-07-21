<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <link rel="stylesheet" href="/assets/css/index.css">
    <style>
        /* 500 Page Specific Styles */
        .error-page {
            min-height: 120vh;
            display: flex;
            flex-direction: column;
            background-color: var(--color-bg);
            color: var(--color-text);
        }

        .error-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .error-content::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, var(--color-primary) 0%, transparent 70%);
            opacity: 0.1;
            z-index: -1;
            animation: pulse 15s infinite alternate;
        }

        .error-graphic {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 0 auto -6rem;
        }

        .error-number {
            font-size: 10rem;
            font-weight: 700;
            color: var(--color-primary);
            line-height: 1;
            position: relative;
            display: inline-block;
            animation: float 6s ease-in-out infinite;
        }

        .error-number::before,
        .error-number::after {
            content: '500';
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .error-number::before {
            color: rgba(var(--color-primary-rgb), 0.3);
            transform: scale(1.1) translate(5px, 5px);
        }

        .error-number::after {
            color: rgba(var(--color-primary-rgb), 0.1);
            transform: scale(1.2) translate(10px, 10px);
        }

        .error-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out;
        }

        .error-message {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 2rem;
            opacity: 0.8;
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .error-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .error-illustration {
            position: absolute;
            opacity: 0.1;
            z-index: -1;
        }

        .error-illustration.top-left {
            top: 20px;
            left: 20px;
            font-size: 5rem;
            animation: float 8s ease-in-out infinite, rotate 20s linear infinite;
        }

        .error-illustration.top-right {
            top: 20px;
            right: 20px;
            font-size: 5rem;
            animation: float 7s ease-in-out infinite 1s, rotate-reverse 25s linear infinite;
        }

        .error-illustration.bottom-left {
            bottom: 20px;
            left: 20px;
            font-size: 5rem;
            animation: float 9s ease-in-out infinite 0.5s, rotate 30s linear infinite;
        }

        .error-illustration.bottom-right {
            bottom: 20px;
            right: 20px;
            font-size: 5rem;
            animation: float 6s ease-in-out infinite 1.5s, rotate-reverse 35s linear infinite;
        }

        .error-search {
            max-width: 500px;
            width: 100%;
            margin: 2rem auto;
            position: relative;
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        .error-search input {
            width: 100%;
            padding: 1rem 1.5rem;
            border-radius: 50px;
            border: 2px solid var(--color-primary);
            background-color: var(--color-bg);
            color: var(--color-text);
            font-size: 1rem;
            transition: all var(--transition-fast);
        }

        .error-search input:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(var(--color-primary-rgb), 0.2);
        }

        .error-search button {
            position: absolute;
            right: 5px;
            top: 5px;
            background-color: var(--color-primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .error-search button:hover {
            background-color: var(--color-secondary);
            transform: scale(1.1);
        }

        .error-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
            animation: fadeInUp 1s ease-out 0.8s both;
        }

        .error-links a {
            color: var(--color-primary);
            text-decoration: none;
            transition: all var(--transition-fast);
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .error-links a:hover {
            background-color: rgba(var(--color-primary-rgb), 0.1);
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.1; }
            100% { transform: scale(1.1); opacity: 0.15; }
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes rotate-reverse {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(-360deg); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Dark mode specific */
        .dark-mode .error-number {
            text-shadow: 0 0 10px rgba(var(--color-primary-rgb), 0.5);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .error-number {
                font-size: 8rem;
            }
            
            .error-title {
                font-size: 2rem;
            }
            
            .error-message {
                font-size: 1rem;
            }
            
            .error-illustration {
                font-size: 3rem !important;
            }
        }

        @media (max-width: 480px) {
            .error-number {
                font-size: 6rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
            
            .error-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .error-illustration {
                display: none;
            }
        }
    </style>
</head>
<body class="error-page">
    <!-- 500 Content -->
    <main class="error-content">
        <!-- Decorative elements -->
        <i class="fas fa-graduation-cap error-illustration top-left"></i>
        <i class="fas fa-university error-illustration top-right"></i>
        <i class="fas fa-book error-illustration bottom-left"></i>
        <i class="fas fa-user-graduate error-illustration bottom-right"></i>
        
        <div class="error-graphic">
            <div class="error-number animate__animated animate__pulse animate__infinite">500</div>
        </div>
        
        <h1 class="error-title">Internal Server Error</h1>
        <p class="error-message">
            Something went wrong on our end. Our team has been notified and we're working to fix it. 
            Please try again later or return to a safe page.
        </p>
        
        <div class="error-search">
            <input type="text" placeholder="Search for alumni, events, or opportunities...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
        
        <div class="error-actions">
            <a href="/" class="btn btn-primary">
                <i class="fas fa-home"></i> Return Home
            </a>
            <a href="/dashboard" class="btn btn-secondary">
                <i class="fas fa-tachometer-alt"></i> Go to Dashboard
            </a>
        </div>
        
        <div class="error-links">
            <a href="#"><i class="fas fa-calendar-alt"></i> Events</a>
            <a href="#"><i class="fas fa-briefcase"></i> Jobs</a>
            <a href="#"><i class="fas fa-users"></i> Alumni Directory</a>
            <a href="#"><i class="fas fa-question-circle"></i> Help Center</a>
        </div>
    </main>

    <!-- JavaScript -->
    <script src="/assets/js/index.js"></script>
    <script>
        // Additional 500 page interactions
        document.addEventListener('DOMContentLoaded', function() {
            const errorNumber = document.querySelector('.error-number');
            errorNumber.addEventListener('mouseenter', function() {
                this.classList.add('animate__rubberBand');
            });
            errorNumber.addEventListener('animationend', function() {
                this.classList.remove('animate__rubberBand');
            });

            const searchInput = document.querySelector('.error-search input');
            searchInput.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.05)';
            });
            searchInput.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });

            const quickLinks = document.querySelectorAll('.error-links a');
            quickLinks.forEach(link => {
                link.addEventListener('mouseenter', function() {
                    const icon = this.querySelector('i');
                    if (icon) icon.style.transform = 'rotate(10deg)';
                });
                link.addEventListener('mouseleave', function() {
                    const icon = this.querySelector('i');
                    if (icon) icon.style.transform = 'rotate(0)';
                });
            });

            setInterval(() => {
                const illustrations = document.querySelectorAll('.error-illustration');
                illustrations.forEach(illustration => {
                    if (Math.random() > 0.7) {
                        illustration.classList.add('animate__animated', 'animate__tada');
                        setTimeout(() => {
                            illustration.classList.remove('animate__animated', 'animate__tada');
                        }, 1000);
                    }
                });
            }, 3000);
        });
    </script>
</body>
</html>