<?php
session_start();
include 'config.php';

// Check if uniq_id is set in the session
if (!isset($_SESSION['uniq_id'])) {
    // Redirect or message prompting login
    header('Location: login.php');
    exit();
}

$uniq_id = $_SESSION['uniq_id'];

// Fetch the courses the student is registered for
// Assume that `id` from the applications table matches `student_id` in the student_courses table
$stmt = $conn->prepare("SELECT c.course_id, c.course_name, c.course_description, c.schedule FROM courses c JOIN student_courses sc ON c.course_id = sc.course_id WHERE sc.student_id = (SELECT id FROM applications WHERE uniq_id = ? LIMIT 1)");
$stmt->bind_param("s", $uniq_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>University</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="top-bar">
            <div class="logo">UNIVERSITY</div>
            <nav>
                <ul>
                    <li><a href="registration.php">Register for courses</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="submit_graduation_application.php">Apply for Graduation</a></li>
                    <li><a href="#">Student Life</a></li><h4>
                    
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h1>Your Courses</h1>
    <ul>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row['course_name']) . " (" . htmlspecialchars($row['schedule']) . ") - " . htmlspecialchars($row['course_description']) . "</li>";
            }
        } else {
            echo "<li>No courses registered yet.</li>";
        }
        ?>
    </ul>

    <footer>
        <!-- Footer Content Here -->
    </footer>
    
    <script src="script.js"></script>
</body>
</html>
