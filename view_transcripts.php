<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review Transcripts</title>
</head>
<body>
    <h1>Review Transcripts</h1>
    <?php
    include 'config.php';  // Make sure you include your database connection configuration

    // Fetching data from the applications table
    $query = "SELECT firstname, transcripts FROM applications WHERE firstname NOT IN (SELECT uniq_id FROM applications WHERE status IS NOT NULL)";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p>Applicant: " . htmlspecialchars($row['firstname']) . "</p>";
            echo "<p>Transcript Details: " . htmlspecialchars($row['transcripts']) . "</p>";
            echo "<a href='submit_decision.php?uniq_id=" . urlencode($row['uniq_id']) . "'>Submit Decision</a>";
            echo "</div><hr>";
        }
    } else {
        echo "No transcripts available to review.";
    }

    $conn->close();
    ?>
</body>
</html>