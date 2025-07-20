document.addEventListener('DOMContentLoaded', function() {
    // Apply/Save button functionality
    document.querySelectorAll('.apply-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing';
            
            // Simulate API call
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check"></i> Applied';
                this.classList.add('applied');
                this.disabled = true;
                
                // Show success message
                const jobCard = this.closest('.job-listing');
                const successMsg = document.createElement('div');
                successMsg.className = 'success-message';
                successMsg.innerHTML = '<i class="fas fa-check-circle"></i> Application submitted successfully!';
                jobCard.querySelector('.job-footer').prepend(successMsg);
                
                // Remove message after 5 seconds
                setTimeout(() => {
                    successMsg.remove();
                }, 5000);
            }, 1500);
        });
    });
    
    // Save job functionality
    document.querySelectorAll('.save-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const icon = this.querySelector('i');
            
            if (this.classList.contains('saved')) {
                this.classList.remove('saved');
                icon.classList.replace('fas', 'far');
                
                // Show unsaved message
                showToast('Job removed from saved items');
            } else {
                this.classList.add('saved');
                icon.classList.replace('far', 'fas');
                
                // Show saved message
                showToast('Job saved to your list');
            }
        });
    });
    
    // Filter reset functionality
    document.getElementById('resetFilters').addEventListener('click', function() {
        document.querySelectorAll('.filter-options select').forEach(select => {
            select.selectedIndex = 0;
        });
        
        // In a real app, you would trigger a job search refresh here
        showToast('Filters reset');
    });
    
    // Post job modal (would be implemented in a real app)
    document.querySelector('.post-job-cta button').addEventListener('click', function() {
        showToast('Post job feature coming soon!');
    });
    
    // Pagination buttons
    document.querySelectorAll('.pagination button:not([disabled])').forEach(button => {
        button.addEventListener('click', function() {
            if (this.textContent.includes('Previous') || this.textContent.includes('Next')) {
                showToast(`Navigating to ${this.textContent.trim()} page`);
            } else {
                document.querySelector('.page-numbers button.active').classList.remove('active');
                this.classList.add('active');
                showToast(`Showing page ${this.textContent}`);
            }
        });
    });
    
    // Helper function to show toast messages
    function showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'toast-message';
        toast.textContent = message;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.add('show');
        }, 10);
        
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3000);
    }
    
    // Add toast styles dynamically
    const toastStyles = document.createElement('style');
    toastStyles.textContent = `
        .toast-message {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--color-primary);
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .toast-message.show {
            opacity: 1;
        }
    `;
    document.head.appendChild(toastStyles);
});