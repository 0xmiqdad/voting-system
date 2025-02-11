<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Departmental Executive Voting</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="voting-container">
    <h1>Vote for Your Departmental Executives</h1>
    <form id="votingForm" action="../backend/process_vote.php" method="POST">
      
      <!-- President Section -->
      <section>
        <h2>President</h2>
        <label>
          <input type="radio" name="president" value="Candidate A" required> Candidate A
        </label>
        <label>
          <input type="radio" name="president" value="Candidate B"> Candidate B
        </label>
      </section>
      
      <!-- Vice President Section -->
      <section>
        <h2>Vice President</h2>
        <label>
          <input type="radio" name="vicePresident" value="Candidate A" required> Candidate A
        </label>
        <label>
          <input type="radio" name="vicePresident" value="Candidate B"> Candidate B
        </label>
      </section>
      
      <!-- Secretary Section -->
      <section>
        <h2>Secretary</h2>
        <label>
          <input type="radio" name="secretary" value="Candidate A" required> Candidate A
        </label>
        <label>
          <input type="radio" name="secretary" value="Candidate B"> Candidate B
        </label>
      </section>
      
      <button type="submit">Submit Vote</button>
    </form>
    <a href="../backend/logout.php">Logout</a>
  </div>
  <script src="validate.js"></script>
</body>
</html>
