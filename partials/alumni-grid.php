<?php
// This partial is used for AJAX responses
if (!empty($alumni)): ?>
    <?php foreach ($alumni as $alumnus): ?>
        <div class="alumni-card">
            <div class="alumni-avatar">
                <img src="<?= htmlspecialchars($alumnus['profile_picture'] ?? 'default.jpg') ?>">
            </div>
            <div class="alumni-info">
                <h3><?= htmlspecialchars($alumnus['first_name'] . ' ' . $alumnus['last_name']) ?></h3>
                <p><?= htmlspecialchars($alumnus['email']) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no-results">
        <p>No alumni found <?= !empty($search) ? 'for "' . htmlspecialchars($search) . '"' : '' ?></p>
    </div>
<?php endif; ?>