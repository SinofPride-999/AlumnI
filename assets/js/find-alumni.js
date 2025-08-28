document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input[name="search"]');
    const alumniGrid = document.querySelector('.alumni-grid');
    const resultsHeader = document.querySelector('.results-header h2');
    const loadingIndicator = document.getElementById('loadingIndicator');
    let searchTimeout;

    // Real-time search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.trim();
            
            // Clear previous timeout
            clearTimeout(searchTimeout);
            
            // Show loading indicator for searches with more than 2 characters
            if (searchTerm.length > 2) {
                showLoading();
            }
            
            // Set timeout to debounce the search
            searchTimeout = setTimeout(() => {
                performSearch(searchTerm);
            }, 300); // 300ms debounce
        });

        // Prevent form submission on enter (we're using real-time search)
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
            }
        });
    }

    // Function to perform the search
    function performSearch(searchTerm) {
        // Create URL with search parameters
        const url = new URL('/find-alumni', window.location.origin);
        if (searchTerm) {
            url.searchParams.set('search', searchTerm);
        }

        // Add realtime parameter to identify AJAX requests
        url.searchParams.set('realtime', 'true');

        fetch(url.toString())
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(html => {
                // Parse the HTML response
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                
                // Extract the alumni grid and results count
                const newAlumniGrid = doc.querySelector('.alumni-grid');
                const newResultsHeader = doc.querySelector('.results-header h2');
                
                if (newAlumniGrid && alumniGrid) {
                    alumniGrid.innerHTML = newAlumniGrid.innerHTML;
                }
                
                if (newResultsHeader && resultsHeader) {
                    resultsHeader.textContent = newResultsHeader.textContent;
                }

                hideLoading();
                reinitializeEventListeners();
            })
            .catch(error => {
                console.error('Search error:', error);
                hideLoading();
                showToast('Search failed. Please try again.');
            });
    }

    // Show loading indicator
    function showLoading() {
        if (loadingIndicator) {
            loadingIndicator.style.display = 'block';
        }
        if (alumniGrid) {
            alumniGrid.style.opacity = '0.5';
        }
    }

    // Hide loading indicator
    function hideLoading() {
        if (loadingIndicator) {
            loadingIndicator.style.display = 'none';
        }
        if (alumniGrid) {
            alumniGrid.style.opacity = '1';
        }
    }

    // Reinitialize event listeners after content update
    function reinitializeEventListeners() {
        // Reattach message button listeners
        document.querySelectorAll('.message-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-userid');
                showToast('Messaging feature coming soon! Would message user ID: ' + userId);
            });
        });

        // Reattach other interactive elements as needed
    }

    // Toast notification function
    function showToast(message) {
        // Remove existing toast if any
        const existingToast = document.querySelector('.toast-message');
        if (existingToast) {
            existingToast.remove();
        }

        const toast = document.createElement('div');
        toast.className = 'toast-message';
        toast.textContent = message;
        document.body.appendChild(toast);
        
        // Add toast styles if not already present
        if (!document.querySelector('#toast-styles')) {
            const toastStyles = document.createElement('style');
            toastStyles.id = 'toast-styles';
            toastStyles.textContent = `
                .toast-message {
                    position: fixed;
                    bottom: 20px;
                    left: 50%;
                    transform: translateX(-50%) translateY(100px);
                    background-color: var(--color-primary);
                    color: white;
                    padding: 12px 24px;
                    border-radius: 50px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                    z-index: 1000;
                    opacity: 0;
                    transition: all 0.3s ease;
                }
                
                .toast-message.show {
                    opacity: 1;
                    transform: translateX(-50%) translateY(0);
                }
            `;
            document.head.appendChild(toastStyles);
        }
        
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

    // Existing modal functionality (keep this from your original code)
    const advancedSearchBtn = document.getElementById('advancedSearchBtn');
    const advancedSearchModal = document.getElementById('advancedSearchModal');
    const closeModalBtn = document.getElementById('closeModalBtn');

    if (advancedSearchBtn && advancedSearchModal) {
        advancedSearchBtn.addEventListener('click', function() {
            advancedSearchModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', function() {
            advancedSearchModal.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    if (advancedSearchModal) {
        advancedSearchModal.addEventListener('click', function(e) {
            if (e.target === advancedSearchModal) {
                advancedSearchModal.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && advancedSearchModal && advancedSearchModal.classList.contains('active')) {
            advancedSearchModal.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
});