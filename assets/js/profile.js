document.addEventListener('DOMContentLoaded', function() {
    // Profile picture preview
    const profilePictureInput = document.getElementById('profilePicture');
    const profilePicturePreview = document.getElementById('profilePicturePreview');
    
    if (profilePictureInput && profilePicturePreview) {
        profilePictureInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePicturePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    }
    
    // Character counter for bio
    const bioTextarea = document.getElementById('bio');
    if (bioTextarea) {
        const charLimit = 500;
        const charCounter = document.createElement('div');
        charCounter.className = 'char-counter';
        charCounter.style.fontSize = '0.8rem';
        charCounter.style.marginTop = '0.3rem';
        charCounter.style.color = 'var(--color-text)';
        charCounter.style.opacity = '0.7';
        bioTextarea.parentNode.insertBefore(charCounter, bioTextarea.nextSibling);
        
        function updateCharCounter() {
            const remaining = charLimit - bioTextarea.value.length;
            charCounter.textContent = `${remaining} characters remaining`;
            
            if (remaining < 0) {
                charCounter.style.color = '#e74c3c';
                bioTextarea.value = bioTextarea.value.substring(0, charLimit);
            } else {
                charCounter.style.color = 'var(--color-text)';
            }
        }
        
        bioTextarea.addEventListener('input', updateCharCounter);
        updateCharCounter(); // Initialize counter
    }
    
    // Form submission loading spinner
    const profileForm = document.querySelector('.profile-form');
    if (profileForm) {
        profileForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
            submitBtn.disabled = true;
        });
    }
});