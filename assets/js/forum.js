document.addEventListener('DOMContentLoaded', function() {
    // New Topic Modal
    const newTopicBtn = document.getElementById('newTopicBtn');
    const newTopicModal = document.getElementById('newTopicModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelTopicBtn = document.getElementById('cancelTopicBtn');
    const newTopicForm = document.getElementById('newTopicForm');

    // Show modal when new topic button is clicked
    if (newTopicBtn) {
        newTopicBtn.addEventListener('click', function() {
            newTopicModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }

    // Close modal when close button is clicked
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeModal);
    }

    // Close modal when cancel button is clicked
    if (cancelTopicBtn) {
        cancelTopicBtn.addEventListener('click', closeModal);
    }

    // Close modal when clicking outside the modal content
    newTopicModal.addEventListener('click', function(e) {
        if (e.target === newTopicModal) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && newTopicModal.classList.contains('active')) {
            closeModal();
        }
    });

    // Form submission
    if (newTopicForm) {
        newTopicForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const title = document.getElementById('topic-title').value;
            const category = document.getElementById('topic-category').value;
            const content = document.getElementById('topic-content').value;
            
            // In a real app, you would send this data to the server
            console.log('New topic submitted:', { title, category, content });
            
            // Show success message
            showToast('Your discussion has been posted!');
            
            // Close modal and reset form
            closeModal();
            newTopicForm.reset();
        });
    }

    // Voting functionality
    document.querySelectorAll('.vote-btn').forEach(button => {
        button.addEventListener('click', function() {
            const voteContainer = this.closest('.discussion-votes');
            const voteCount = voteContainer.querySelector('.vote-count');
            let count = parseInt(voteCount.textContent);
            
            // Remove active class from all buttons in this container
            voteContainer.querySelectorAll('.vote-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Determine if this is an upvote or downvote
            if (this.classList.contains('upvote')) {
                if (this.classList.contains('active')) {
                    // Already upvoted, remove vote
                    voteCount.textContent = count - 1;
                    this.classList.remove('active');
                } else {
                    // New upvote
                    voteCount.textContent = count + 1;
                    this.classList.add('active');
                }
            } else if (this.classList.contains('downvote')) {
                if (this.classList.contains('active')) {
                    // Already downvoted, remove vote
                    voteCount.textContent = count + 1;
                    this.classList.remove('active');
                } else {
                    // New downvote
                    voteCount.textContent = count - 1;
                    this.classList.add('active');
                }
            }
            
            // In a real app, you would send the vote to the server
        });
    });
    
    // View options (newest, popular, unanswered)
    document.querySelectorAll('.view-options .btn-text').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.view-options .btn-text').forEach(btn => {
                btn.classList.remove('active');
            });
            this.classList.add('active');
            
            // In a real app, you would fetch and display the appropriate discussions
            showToast(`Showing ${this.textContent} discussions`);
        });
    });
    
    // Connect buttons in popular alumni section
    document.querySelectorAll('.alumni-card .btn-text').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const alumniName = this.closest('.alumni-card').querySelector('h3').textContent;
            showToast(`Connection request sent to ${alumniName}`);
        });
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
    
    // Helper function to close modal
    function closeModal() {
        newTopicModal.classList.remove('active');
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