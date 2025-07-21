document.addEventListener('DOMContentLoaded', function() {
    // Password visibility toggle
    const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    
    togglePasswordButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('input');
            const icon = this.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });
    
    // Password strength indicator for register page
    const passwordInput = document.getElementById('registerPassword');
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const strengthBars = document.querySelectorAll('.strength-bar');
            const strengthText = document.querySelector('.strength-text');
            const password = this.value;
            
            // Reset
            strengthBars.forEach(bar => {
                bar.style.backgroundColor = 'rgba(var(--color-text), 0.1)';
            });
            
            if (password.length === 0) {
                strengthText.textContent = 'Password strength';
                return;
            }
            
            // Very weak (just length)
            if (password.length < 6) {
                strengthBars[0].style.backgroundColor = 'var(--color-primary)';
                strengthText.textContent = 'Very weak';
                return;
            }
            
            // Weak (length + lowercase)
            if (/[a-z]/.test(password)) {
                strengthBars[0].style.backgroundColor = 'var(--color-primary)';
                strengthBars[1].style.backgroundColor = 'var(--color-primary)';
                strengthText.textContent = 'Weak';
            }
            
            // Medium (length + lowercase + uppercase/number)
            if (/[A-Z]/.test(password) || /[0-9]/.test(password)) {
                strengthBars[0].style.backgroundColor = 'var(--color-primary)';
                strengthBars[1].style.backgroundColor = 'var(--color-primary)';
                strengthBars[2].style.backgroundColor = 'var(--color-primary)';
                strengthText.textContent = 'Medium';
            }
            
            // Strong (length + lowercase + uppercase + number + special)
            if (/[^A-Za-z0-9]/.test(password)) {
                strengthBars[0].style.backgroundColor = 'var(--color-secondary)';
                strengthBars[1].style.backgroundColor = 'var(--color-secondary)';
                strengthBars[2].style.backgroundColor = 'var(--color-secondary)';
                strengthText.textContent = 'Strong';
            }
        });
    }

    // Password strength indicator for reset password form
    const resetPasswordInput = document.getElementById('newPassword');
    if (resetPasswordInput) {
        resetPasswordInput.addEventListener('input', function() {
            const strengthBars = this.closest('form').querySelectorAll('.strength-bar');
            const strengthText = this.closest('form').querySelector('.strength-text');
            const password = this.value;
            
            // Reset
            strengthBars.forEach(bar => {
                bar.style.backgroundColor = 'rgba(var(--color-text), 0.1)';
            });
            
            if (password.length === 0) {
                strengthText.textContent = 'Password strength';
                return;
            }
            
            // Very weak (just length)
            if (password.length < 6) {
                strengthBars[0].style.backgroundColor = 'var(--color-primary)';
                strengthText.textContent = 'Very weak';
                return;
            }
            
            // Weak (length + lowercase)
            if (/[a-z]/.test(password)) {
                strengthBars[0].style.backgroundColor = 'var(--color-primary)';
                strengthBars[1].style.backgroundColor = 'var(--color-primary)';
                strengthText.textContent = 'Weak';
            }
            
            // Medium (length + lowercase + uppercase/number)
            if (/[A-Z]/.test(password) || /[0-9]/.test(password)) {
                strengthBars[0].style.backgroundColor = 'var(--color-primary)';
                strengthBars[1].style.backgroundColor = 'var(--color-primary)';
                strengthBars[2].style.backgroundColor = 'var(--color-primary)';
                strengthText.textContent = 'Medium';
            }
            
            // Strong (length + lowercase + uppercase + number + special)
            if (/[^A-Za-z0-9]/.test(password)) {
                strengthBars[0].style.backgroundColor = 'var(--color-secondary)';
                strengthBars[1].style.backgroundColor = 'var(--color-secondary)';
                strengthBars[2].style.backgroundColor = 'var(--color-secondary)';
                strengthText.textContent = 'Strong';
            }
        });
    }
    
    // Loading spinner for reset password form
    const resetPasswordForm = document.getElementById('resetPasswordForm');
    if (resetPasswordForm) {
        resetPasswordForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            submitBtn.disabled = true;
        });
    }
    
    // Form submission
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            // Loading Spinner
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            submitBtn.disabled = true;
        });
    }
    
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            // Loading Spinner
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            submitBtn.disabled = true;
        });
    }
    
    // Floating label initialization
    document.querySelectorAll('.form-group.floating input').forEach(input => {
        // Add placeholder to trigger floating effect
        if (!input.placeholder) {
            input.placeholder = ' ';
        }
        
        // Check if input has value on page load
        if (input.value) {
            const label = input.nextElementSibling;
            label.style.transform = 'translateY(-1.8rem) translateX(-1rem) scale(0.85)';
            label.style.opacity = '1';
            label.style.color = 'var(--color-primary)';
            label.style.backgroundColor = 'var(--color-bg)';
            label.style.padding = '0 0.5rem';
        }
    });
    
    // Graduation year input formatting
    const graduationYearInput = document.getElementById('graduationYear');
    if (graduationYearInput) {
        graduationYearInput.addEventListener('input', function() {
            // Only allow numbers
            this.value = this.value.replace(/[^0-9]/g, '');
            
            // Limit to 4 digits
            if (this.value.length > 4) {
                this.value = this.value.slice(0, 4);
            }
            
            // Validate year (1900-current year + 5)
            const currentYear = new Date().getFullYear();
            const maxYear = currentYear + 5;
            
            if (this.value.length === 4) {
                const year = parseInt(this.value);
                if (year < 1900 || year > maxYear) {
                    this.setCustomValidity(`Please enter a year between 1900 and ${maxYear}`);
                } else {
                    this.setCustomValidity('');
                }
            }
        });
    }
});