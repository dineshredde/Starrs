<?php
include 'config.php';

$student_id = $_POST['student_id']; // This should be fetched from session or login system

$sql = "SELECT courses.course_name, enrollments.semester, enrollments.grade FROM enrollments JOIN courses ON enrollments.course_id = courses.course_id WHERE enrollments.student_id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>" . $row["course_name"] . " - " . $row["semester"] . " - Grade: " . $row["grade"] . "</p>";
    }
} else {
    echo "No enrollments found.";
}

$conn->close();
?>