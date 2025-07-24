document.addEventListener('DOMContentLoaded', function() {
  // Character counters
  const titleInput = document.getElementById('title');
  const titleCounter = document.getElementById('title-counter');
  const contentInput = document.getElementById('content');
  const contentCounter = document.getElementById('content-counter');

  function updateCounters() {
      titleCounter.textContent = `${titleInput.value.length}/120 characters`;
      contentCounter.textContent = `${contentInput.value.length}/5000 characters`;
  }

  titleInput.addEventListener('input', updateCounters);
  contentInput.addEventListener('input', updateCounters);
  updateCounters();

  // Preview toggle
  const togglePreview = document.getElementById('togglePreview');
  const contentPreview = document.getElementById('content-preview');

  togglePreview.addEventListener('click', function() {
      const isPreview = contentPreview.style.display === 'block';
      
      if (isPreview) {
          contentPreview.style.display = 'none';
          togglePreview.innerHTML = '<i class="far fa-eye"></i> Preview';
      } else {
          contentPreview.style.display = 'block';
          contentPreview.innerHTML = marked.parse(contentInput.value);
          togglePreview.innerHTML = '<i class="far fa-edit"></i> Edit';
      }
  });

  // Auto-resize textarea
  function adjustTextareaHeight() {
      contentInput.style.height = 'auto';
      contentInput.style.height = (contentInput.scrollHeight) + 'px';
  }

  contentInput.addEventListener('input', adjustTextareaHeight);
  adjustTextareaHeight();
  });