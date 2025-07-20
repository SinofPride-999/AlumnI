// Theme Toggle Functionality
function setupThemeToggle() {
    const themeToggle = document.getElementById('themeToggle');
    if (!themeToggle) return;

    const icon = themeToggle.querySelector('i');
    const savedTheme = localStorage.getItem('theme') || 
                      (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

    // Apply saved theme
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        icon.classList.replace('fa-moon', 'fa-sun');
    }

    // Toggle theme on button click
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

document.addEventListener('DOMContentLoaded', function() {
    
    setupThemeToggle();

    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileSidebar = document.getElementById('mobileSidebar');
    
    if (mobileMenuBtn && mobileSidebar) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileSidebar.classList.toggle('active');
            document.body.style.overflow = mobileSidebar.classList.contains('active') ? 'hidden' : '';
        });
    }

    // Close mobile menu when clicking on a link
    document.querySelectorAll('.mobile-sidebar a').forEach(link => {
        link.addEventListener('click', function() {
            mobileSidebar.classList.remove('active');
            document.body.style.overflow = '';
        });
    });

    // Event category filtering
    const categoryButtons = document.querySelectorAll('.event-categories .category');
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            // In a real app, you would filter events here
        });
    });

    // Event RSVP functionality
    document.querySelectorAll('.event-actions .btn-primary').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            
            // Simulate API call
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check"></i> Registered';
                this.classList.add('confirmed');
                this.disabled = true;
            }, 1000);
        });
    });

    // Pagination buttons
    document.querySelectorAll('.page-numbers button').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelector('.page-numbers button.active').classList.remove('active');
            this.classList.add('active');
            // In a real app, this would load the corresponding page
        });
    });

    // Time filter toggle
    document.querySelectorAll('.filter-toggle button').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelector('.filter-toggle button.active').classList.remove('active');
            this.classList.add('active');
            // In a real app, this would filter events by time
        });
    });
});