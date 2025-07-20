<?php if (!empty($scripts)): ?>
  <?php foreach ((array) $scripts as $js): ?>
    <script src="<?= $js ?>"></script>
  <?php endforeach; ?>
<?php endif; ?>