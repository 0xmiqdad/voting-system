<?php
session_start();
require '../backend/db_connection.php';

if (!isset($_SESSION['student_id'])) {
    die("Unauthorized access.");
}

$studentId = $_SESSION['student_id'];

// Sanitize form inputs
$president = filter_input(INPUT_POST, 'president', FILTER_SANITIZE_STRING);
$vicePresident = filter_input(INPUT_POST, 'vicePresident', FILTER_SANITIZE_STRING);
$secretary = filter_input(INPUT_POST, 'secretary', FILTER_SANITIZE_STRING);

// Check if the student has already voted
$query = "SELECT * FROM votes WHERE student_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$studentId]);

if($stmt->rowCount() > 0) {
    die("You have already voted.");
}

// Insert the vote into the database
$query = "INSERT INTO votes (student_id, president, vice_president, secretary) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($query);

if($stmt->execute([$studentId, $president, $vicePresident, $secretary])) {
    // Optionally, destroy the session if you want the user to log in again
    session_destroy();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Vote Recorded</title>
        <!-- Meta refresh tag to redirect after 5 seconds -->
        <meta http-equiv="refresh" content="5;url=../frontend/login.php">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f7f7f7;
                padding: 20px;
                text-align: center;
            }
            .confirmation {
                background: #fff;
                padding: 20px;
                max-width: 500px;
                margin: 0 auto;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
        </style>
    </head>
    <body>
        <div class="confirmation">
            <h1>Thank you for voting!</h1>
            <p>Your vote has been recorded successfully.</p>
            <h3>Your Choices:</h3>
            <ul style="list-style-type: none; padding: 0;">
                <li><strong>President:</strong> <?php echo htmlspecialchars($president); ?></li>
                <li><strong>Vice President:</strong> <?php echo htmlspecialchars($vicePresident); ?></li>
                <li><strong>Secretary:</strong> <?php echo htmlspecialchars($secretary); ?></li>
            </ul>
            <p>You will be redirected to the login page in 5 seconds.</p>
            <p>If not redirected, <a href="../frontend/login.php">click here</a>.</p>
        </div>
    </body>
    </html>
    <?php
    exit();
} else {
    echo "There was an error recording your vote.";
}
?>
