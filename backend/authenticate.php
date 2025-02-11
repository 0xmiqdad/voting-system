<?php
// authenticate.php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];
    
    // Fetch the user record
    $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = ?");
    $stmt->execute([$student_id]);
    $user = $stmt->fetch();
    
    // Check if user exists and the password is correct
    if ($user && $password === $user['password']) {
        $_SESSION['student_id'] = $student_id;
        header("Location: ../frontend/voting.php");
        exit();        
    } else {
        echo "Invalid student ID or password.";
    }
}
?>
