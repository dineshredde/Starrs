<?php
include 'config.php';

$alumni_id = $_POST['alumni_id'];
$sql = "SELECT courses.course_name, enrollments.semester FROM enrollments JOIN courses ON enrollments.course_id = courses.course_id WHERE enrollments.alumni_id = '$alumni_id'";

$result = $conn->query($sql);
$courses = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
    echo json_encode($courses);
} else {
    echo json_encode([]);
}

$conn->close();
?>