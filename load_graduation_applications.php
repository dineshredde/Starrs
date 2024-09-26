<?php
include 'config.php';

$query = "SELECT application_id, student_id, application_date, status FROM graduation_applications";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='application'><p>Application ID: " . $row["application_id"] . " - Student ID: " . $row["student_id"] . " - Applied on: " . $row["application_date"] . " - Status: " . $row["status"] . "</p>";
        echo "<button onclick='finalizeApplication(" . $row["application_id"] . ")'>Finalize</button></div>";
    }
} else {
    echo "No applications to review.";
}
$conn->close();
?>