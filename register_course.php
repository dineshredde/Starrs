<?php
session_start();
include 'config.php'; // Assumes this file contains the correct database connection setup

if (!isset($_SESSION['uniq_id'])) {
    die('Please log in first.'); // Redirect or message prompting login
}

$uniq_id = $_SESSION['uniq_id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['courses'])) {
    $selected_courses = $_POST['courses'];

    // Check if at least three courses are selected
    if (count($selected_courses) < 3) {
        echo "<p>Please select at least three courses.</p>";
    } else {
        $conn->begin_transaction();

        try {
            // Clear existing selections
            $stmt = $conn->prepare("DELETE FROM student_courses WHERE student_id = (SELECT id FROM applications WHERE uniq_id = ?)");
            $stmt->bind_param("s", $uniq_id);
            $stmt->execute();
            $stmt->close();

            // Insert new selections
            $stmt = $conn->prepare("INSERT INTO student_courses (student_id, course_id) VALUES ((SELECT id FROM applications WHERE uniq_id = ?), ?)");
            foreach ($selected_courses as $course_id) {
                $stmt->bind_param("si", $uniq_id, $course_id);
                $stmt->execute();
            }
            $stmt->close();

            $conn->commit();
            echo "Courses updated successfully!";
        } catch (mysqli_sql_exception $exception) {
            $conn->rollback();
            echo "An error occurred: " . $exception->getMessage();
        }
    }
}

// Fetch all available courses for selection
$result = $conn->query("SELECT course_id, course_name, course_description, schedule FROM courses");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Courses</title>
</head>
<body>
    <h1>Select Courses</h1>
    <form action="" method="post">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<input type='checkbox' name='courses[]' value='" . $row['course_id'] . "' id='course_" . $row['course_id'] . "'>";
                echo "<label for='course_" . $row['course_id'] . "'>" . $row['course_name'] . " - " . $row['schedule'] . " - " . $row['course_description'] . "</label>";
                echo "</div>";
            }
        } else {
            echo "<p>No available courses.</p>";
        }
        ?>
        <input type="submit" value="Update Courses">
    </form>
    <div id="post-submission">
    
    <p>Click <a href="student.php">here</a> to return to your student portal.</p>
</div>
</body>
</html>
