document.addEventListener('DOMContentLoaded', function() {
    // Voting functionality
    document.querySelectorAll('.vote-btn').forEach(button => {
        button.addEventListener('click', async function() {
            const postId = this.closest('[data-post-id]')?.dataset.postId;
            if (!postId) return;
            
            const voteType = this.classList.contains('upvote') ? 'up' : 'down';
            
            try {
                const response = await fetch(`/forum/post/${postId}/vote/${voteType}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });
                
                if (!response.ok) throw new Error('Vote failed');
                
                const data = await response.json();
                
                if (data.error) {
                    showToast(data.error);
                    return;
                }
                
                // Update UI
                const voteContainer = this.closest('.discussion-votes');
                const voteCount = voteContainer.querySelector('.vote-count');
                voteCount.textContent = data.upvotes - data.downvotes;
                
                // Update active states
                voteContainer.querySelectorAll('.vote-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                if (data.user_vote === 'up') {
                    voteContainer.querySelector('.upvote').classList.add('active');
                } else if (data.user_vote === 'down') {
                    voteContainer.querySelector('.downvote').classList.add('active');
                }
                
            } catch (error) {
                console.error('Vote error:', error);
                showToast('Failed to process your vote');
            }
        });
    });
    
    // Mark as answer
    document.querySelectorAll('.mark-answer-btn').forEach(button => {
        button.addEventListener('click', async function() {
            const postId = this.dataset.postId;
            if (!postId) return;
            
            if (!confirm('Mark this post as the accepted answer?')) return;
            
            try {
                const response = await fetch(`/forum/post/${postId}/answer`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });
                
                if (!response.ok) throw new Error('Action failed');
                
                const data = await response.json();
                
                if (data.error) {
                    showToast(data.error);
                    return;
                }
                
                showToast('Post marked as answer');
                // Refresh or update UI
                window.location.reload();
                
            } catch (error) {
                console.error('Error:', error);
                showToast('Failed to mark as answer');
            }
        });
    });
    
    // View options (newest, popular, unanswered)
    document.querySelectorAll('.view-options .btn-text').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.view-options .btn-text').forEach(btn => {
                btn.classList.remove('active');
            });
            this.classList.add('active');
            
            // In a real implementation, you would fetch and display the appropriate discussions
            const viewType = this.textContent.toLowerCase();
            showToast(`Showing ${viewType} discussions`);
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
});