document.addEventListener('DOMContentLoaded', function() {
    // Initialize theme toggler
    const themeToggle = document.getElementById('themeToggle');
    if (themeToggle) {
        const icon = themeToggle.querySelector('i');
        const savedTheme = localStorage.getItem('theme') || 
                         (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

        if (savedTheme === 'dark') {
            document.body.classList.add('dark-mode');
            icon.classList.replace('fa-moon', 'fa-sun');
        }

        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
                icon.classList.replace('fa-moon', 'fa-sun');
            } else {
                localStorage.setItem('theme', 'light');
                icon.classList.replace('fa-sun', 'fa-moon');
            }
        });
    }

    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileSidebar = document.getElementById('mobileSidebar');
    
    if (mobileMenuBtn && mobileSidebar) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileSidebar.classList.toggle('active');
            document.body.style.overflow = mobileSidebar.classList.contains('active') ? 'hidden' : '';
        });
    }

    // RSVP button functionality
    const rsvpButton = document.querySelector('.event-actions .btn-primary');
    if (rsvpButton) {
        rsvpButton.addEventListener('click', function(e) {
            e.preventDefault();
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            
            // Simulate API call
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check"></i> RSVP Confirmed';
                this.classList.add('confirmed');
                this.disabled = true;
                
                // Show success message
                const successMsg = document.createElement('div');
                successMsg.className = 'success-message';
                successMsg.innerHTML = `
                    <i class="fas fa-check-circle"></i>
                    <p>Your RSVP has been confirmed. We've sent the details to your email.</p>
                `;
                this.closest('.event-actions').appendChild(successMsg);
            }, 1000);
        });
    }

    // Share button functionality
    const shareButton = document.querySelector('.event-actions .btn-secondary');
    if (shareButton) {
        shareButton.addEventListener('click', function(e) {
            e.preventDefault();
            // In a real app, this would use the Web Share API or open a share modal
            console.log('Share event functionality would go here');
        });
    }

    // Add to Calendar button functionality
    const calendarButton = document.querySelector('.event-actions .btn-text');
    if (calendarButton) {
        calendarButton.addEventListener('click', function(e) {
            e.preventDefault();
            // In a real app, this would download an .ics file or similar
            console.log('Add to calendar functionality would go here');
        });
    }
});