<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Alumni Connect' ?></title>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Base styles -->
    <link rel="stylesheet" href="/assets/css/index.css">

    <!-- Page-specific styles -->
    <?php if (!empty($styles)): ?>
        <?php foreach ($styles as $style): ?>
            <link rel="stylesheet" href="<?= $style ?>">
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Optional inline styles (optional if you move inline CSS to files) -->
    <?php if (!empty($inlineStyle)): ?>
    <style>
        <?= $inlineStyle ?>
    </style>
    <?php endif; ?>
</head>
