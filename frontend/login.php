<?php
session_start();
if(isset($_SESSION['student_id'])){
    header("Location: voting.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Voting System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="login-container">
    <h1>Student Login</h1>
    <form action="../backend/authenticate.php" method="POST">
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
