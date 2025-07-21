<?php
// Connect to the database
require_once __DIR__ . '/../../app/config.php'; // adjust path if needed

// Define the categories to seed
$categories = [
    [
        'name' => 'Career Discussions',
        'description' => 'Share job opportunities, career advice, and professional development tips',
        'icon' => 'briefcase'
    ],
    [
        'name' => 'Campus Memories',
        'description' => 'Relive your university days and share stories from your time on campus',
        'icon' => 'graduation-cap'
    ],
    [
        'name' => 'Class Reunions',
        'description' => 'Organize and discuss upcoming class reunions and alumni events',
        'icon' => 'users'
    ],
    [
        'name' => 'Industry Groups',
        'description' => 'Connect with alumni in your industry for networking and collaboration',
        'icon' => 'lightbulb'
    ]
];

foreach ($categories as $category) {
    $stmt = $pdo->prepare("
        INSERT INTO forum_categories (name, description, icon)
        VALUES (?, ?, ?)
    ");
    $stmt->execute([
        $category['name'],
        $category['description'],
        $category['icon']
    ]);
}

echo "Forum categories seeded successfully.\n";
