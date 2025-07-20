document.addEventListener('DOMContentLoaded', function() {
    // Advanced Search Modal
    const advancedSearchBtn = document.getElementById('advancedSearchBtn');
    const advancedSearchModal = document.getElementById('advancedSearchModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const resetSearchBtn = document.getElementById('resetSearchBtn');
    const advancedSearchForm = document.getElementById('advancedSearchForm');

    // Show modal when advanced search button is clicked
    if (advancedSearchBtn) {
        advancedSearchBtn.addEventListener('click', function() {
            advancedSearchModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }

    // Close modal when close button is clicked
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeModal);
    }

    // Close modal when clicking outside the modal content
    advancedSearchModal.addEventListener('click', function(e) {
        if (e.target === advancedSearchModal) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && advancedSearchModal.classList.contains('active')) {
            closeModal();
        }
    });

    // Reset search form
    if (resetSearchBtn) {
        resetSearchBtn.addEventListener('click', function() {
            advancedSearchForm.reset();
            showToast('Search filters reset');
        });
    }

    // Form submission
    if (advancedSearchForm) {
        advancedSearchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const name = document.getElementById('search-name').value;
            const company = document.getElementById('search-company').value;
            const major = document.getElementById('search-major').value;
            const year = document.getElementById('search-year').value;
            const industry = document.getElementById('search-industry').value;
            const location = document.getElementById('search-location').value;
            const skills = document.getElementById('search-skills').value;
            
            // In a real app, you would send this data to the server
            console.log('Advanced search:', { 
                name, 
                company, 
                major, 
                year, 
                industry, 
                location, 
                skills 
            });
            
            // Show success message
            showToast('Searching alumni with your criteria...');
            
            // Close modal
            closeModal();
        });
    }

    // Connect buttons
    document.querySelectorAll('.connect-btn').forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.alumni-card');
            const name = card.querySelector('h3').textContent;
            
            if (this.classList.contains('connected')) {
                // Already connected
                showToast(`You're already connected with ${name}`);
            } else if (this.classList.contains('pending')) {
                // Connection pending
                showToast(`Connection request already sent to ${name}`);
            } else {
                // New connection
                this.innerHTML = '<i class="fas fa-clock"></i>';
                this.classList.add('pending');
                showToast(`Connection request sent to ${name}`);
                
                // Simulate connection acceptance after delay
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-check"></i>';
                    this.classList.remove('pending');
                    this.classList.add('connected');
                    showToast(`${name} accepted your connection request`);
                }, 3000);
            }
        });
    });

    // Message buttons
    document.querySelectorAll('.alumni-actions .btn-primary').forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.alumni-card');
            const name = card.querySelector('h3').textContent;
            showToast(`Messaging feature coming soon! Would message ${name}`);
        });
    });

    // View profile buttons
    document.querySelectorAll('.alumni-actions .btn-text').forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.alumni-card');
            const name = card.querySelector('h3').textContent;
            showToast(`Would view profile of ${name}`);
        });
    });

    // Quick filter buttons
    document.querySelectorAll('.quick-filters .filter-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.quick-filters .filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            this.classList.add('active');
            
            // In a real app, you would filter the alumni results
            const filterText = this.textContent.trim();
            showToast(`Filtering by: ${filterText}`);
        });
    });

    // Sort dropdown
    const sortDropdown = document.getElementById('sort-by');
    if (sortDropdown) {
        sortDropdown.addEventListener('change', function() {
            const sortOption = this.options[this.selectedIndex].text;
            showToast(`Sorted by: ${sortOption}`);
        });
    }

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

    // Helper function to close modal
    function closeModal() {
        advancedSearchModal.classList.remove('active');
        document.body.style.overflow = '';
    }
    
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