<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review Transcripts</title>
</head>
<body>




    <h1>Review Transcripts</h1>
    <?php
    
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: faculty_login.php'); // Redirect to the login page
        exit();
    }
    include 'config.php';  // Make sure you include your database connection configuration

    // Fetching data from the applications table
    $query = "SELECT uniq_id, transcripts FROM applications WHERE status = 'incomplete'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p>Applicant ID: " . $row['uniq_id'] . "</p>";
            echo "<p>Transcript Details: " . $row['transcripts'] . "</p>";
            echo "<a href='submit_decision.php?uniq_id=" . $row['uniq_id'] . "'>Submit Decision</a>";
            echo "</div><hr>";
        }
    } else {
        echo "No transcripts available to review.";
    }

    $conn->close();
    ?>
    <div id="post-submission">
    
    <p>Click <a href="index.php">here</a> to return to your student dashboard.</p>
</div>
</body>
</html>