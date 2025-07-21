<?php
require_once __DIR__ . '/../../app/config.php'; // adjust path as needed

$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

function generateRandomEmail($firstName, $lastName) {
    $domain = ['example.com', 'mail.com', 'test.org'];
    return strtolower($firstName . '.' . $lastName . rand(100, 999) . '@' . $domain[array_rand($domain)]);
}

function randomName() {
    $names = ['John', 'Alice', 'Michael', 'Sophia', 'David', 'Emma', 'Daniel', 'Olivia', 'James', 'Isabella'];
    return $names[array_rand($names)];
}

function randomLastName() {
    $lastNames = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Miller', 'Davis', 'Garcia', 'Clark', 'Lewis'];
    return $lastNames[array_rand($lastNames)];
}

function randomDegree() {
    $degrees = ['BSc Computer Science', 'BSc Information Technology', 'BSc Software Engineering'];
    return $degrees[array_rand($degrees)];
}

$password = 'Test@1234'; // default password
$hash = password_hash($password, PASSWORD_DEFAULT);

for ($i = 0; $i < 95; $i++) {
    $first = randomName();
    $last = randomLastName();
    $email = generateRandomEmail($first, $last);
    $gradYear = rand(2015, 2025);
    $degree = randomDegree();

    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, graduation_year, degree_program, password_hash) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$first, $last, $email, $gradYear, $degree, $hash]);
}

echo "95 users added successfully.";
