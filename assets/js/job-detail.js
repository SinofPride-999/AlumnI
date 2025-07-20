document.addEventListener('DOMContentLoaded', function() {
    // Apply button functionality
    const applyBtn = document.querySelector('.apply-btn');
    if (applyBtn) {
        applyBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing';
            
            // Simulate API call
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check"></i> Application Submitted';
                this.classList.add('applied');
                this.disabled = true;
                
                // Show success message
                const successMsg = document.createElement('div');
                successMsg.className = 'success-message';
                successMsg.innerHTML = `
                    <i class="fas fa-check-circle"></i> 
                    <div>
                        <h4>Application Successful!</h4>
                        <p>We've received your application for this position. The employer will review your profile and contact you if there's a match.</p>
                    </div>
                `;
                
                // Insert after job actions
                const jobHeader = document.querySelector('.job-header-content');
                jobHeader.appendChild(successMsg);
                
                // Remove message after 8 seconds
                setTimeout(() => {
                    successMsg.classList.add('fade-out');
                    setTimeout(() => {
                        successMsg.remove();
                    }, 300);
                }, 8000);
            }, 1500);
        });
    }
    
    // Save job functionality
    const saveBtn = document.querySelector('.save-btn');
    if (saveBtn) {
        saveBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const icon = this.querySelector('i');
            
            if (this.classList.contains('saved')) {
                this.classList.remove('saved');
                icon.classList.replace('fas', 'far');
                showToast('Job removed from saved items');
            } else {
                this.classList.add('saved');
                icon.classList.replace('far', 'fas');
                showToast('Job saved to your list');
            }
        });
    }
    
    // Share buttons functionality
    document.querySelectorAll('.share-buttons .btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const platform = this.textContent.trim();
            showToast(`Share via ${platform} coming soon!`);
        });
    });
    
    // Message alumni button
    const messageAlumniBtn = document.querySelector('.alumni-connection .btn');
    if (messageAlumniBtn) {
        messageAlumniBtn.addEventListener('click', function(e) {
            e.preventDefault();
            showToast('Messaging feature coming soon!');
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
        
        .success-message {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            background-color: rgba(76, 175, 80, 0.1);
            border-left: 4px solid #4CAF50;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1.5rem;
            animation: fadeIn 0.3s ease;
        }
        
        .success-message i {
            color: #4CAF50;
            font-size: 1.5rem;
            margin-top: 0.2rem;
        }
        
        .success-message h4 {
            color: #4CAF50;
            margin-bottom: 0.5rem;
        }
        
        .success-message p {
            font-size: 0.9rem;
            opacity: 0.9;
            line-height: 1.5;
        }
        
        .success-message.fade-out {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(toastStyles);
});