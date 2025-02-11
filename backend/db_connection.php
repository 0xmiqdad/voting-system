<?php
// db_connection.php
$host = 'localhost';
$db   = 'voting_db';    // This should match the name you created in phpMyAdmin
$user = 'root';         // Default XAMPP MySQL username
$pass = '';             // Default XAMPP MySQL password is usually empty
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
