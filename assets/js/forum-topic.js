document.addEventListener('DOMContentLoaded', function() {
    // Voting functionality for main post and replies
    document.querySelectorAll('.vote-btn').forEach(button => {
        button.addEventListener('click', function() {
            const voteContainer = this.closest('.vote-controls, .reply-votes');
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
            showToast('Vote recorded!');
        });
    });
    
    // Save discussion button
    const saveBtn = document.querySelector('.discussion-actions .btn-text:first-child');
    if (saveBtn) {
        saveBtn.addEventListener('click', function() {
            const icon = this.querySelector('i');
            
            if (this.classList.contains('saved')) {
                this.classList.remove('saved');
                icon.classList.replace('fas', 'far');
                showToast('Discussion removed from saved items');
            } else {
                this.classList.add('saved');
                icon.classList.replace('far', 'fas');
                showToast('Discussion saved to your list');
            }
        });
    }
    
    // Share discussion button
    const shareBtn = document.querySelector('.discussion-actions .btn-text:last-child');
    if (shareBtn) {
        shareBtn.addEventListener('click', function() {
            showToast('Share options coming soon!');
        });
    }
    
    // Reply buttons
    document.querySelectorAll('.reply-btn, .reply-actions .btn-text:first-child').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('reply-content').focus();
        });
    });
    
    // Report buttons
    document.querySelectorAll('.reply-actions .btn-text:last-child').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            showToast('Report submitted. Thank you!');
        });
    });
    
    // Load more replies button
    const loadMoreBtn = document.querySelector('.load-more .btn-text');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            // In a real app, this would load more replies from the server
            showToast('Loading more replies...');
            this.disabled = true;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            
            // Simulate loading delay
            setTimeout(() => {
                showToast('No more replies to load');
                this.innerHTML = '<i class="fas fa-check"></i> All replies loaded';
            }, 1500);
        });
    }
    
    // Sort replies dropdown
    const sortDropdown = document.getElementById('sort-replies');
    if (sortDropdown) {
        sortDropdown.addEventListener('change', function() {
            showToast(`Sorted by: ${this.options[this.selectedIndex].text}`);
        });
    }
    
    // Reply form submission
    const replyForm = document.getElementById('replyForm');
    if (replyForm) {
        replyForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const replyContent = document.getElementById('reply-content').value;
            
            if (replyContent.trim() === '') {
                showToast('Please write a reply before posting');
                return;
            }
            
            // In a real app, you would send this to the server
            console.log('New reply:', replyContent);
            showToast('Your reply has been posted!');
            
            // Reset form
            this.reset();
        });
    }
    
    // Cancel reply button
    const cancelReplyBtn = document.getElementById('cancelReplyBtn');
    if (cancelReplyBtn) {
        cancelReplyBtn.addEventListener('click', function() {
            document.getElementById('replyForm').reset();
            showToast('Reply cancelled');
        });
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