<?php
include 'config.php';

$query = "SELECT * FROM courses";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='course'><h2>" . $row["course_name"] . "</h2>";
        echo "<p>" . $row["course_description"] . "</p>";
        echo "<p>Schedule: " . $row["schedule"] . " | Section: " . $row["section"] . " | Faculty ID: " . $row["faculty_id"] . "</p></div>";
    }
} else {
    echo "No courses available.";
}
$conn->close();
?>