<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty Login</title>
</head>
<body>
    <h1>Faculty Login</h1>
    <form action="" method="post">
        <label for="faculty_id">Faculty ID:</label>
        <input type="text" id="faculty_id" name="faculty_id" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <?php
session_start(); // Start the session at the beginning of the script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'config.php';  // Include your database connection configuration

    $faculty_id = $_POST['faculty_id'] ?? '';
    $password = $_POST['password'] ?? '';

    // Default password for all faculty
    $defaultPassword = 'faculty1';

    if ($password === $defaultPassword) {
        $stmt = $conn->prepare("SELECT * FROM faculty WHERE faculty_id = ?");
        if ($stmt) {
            $stmt->bind_param("s", $faculty_id); // Use 'i' if faculty_id is an integer
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $_SESSION['logged_in'] = true; // Set session variable
                $_SESSION['faculty_id'] = $faculty_id; // Store faculty id in session
                header('Location: faculty_review.php'); // Redirect to faculty_review.php
                exit(); // Make sure to stop script execution after a redirect
            } else {
                echo "Login failed. Faculty ID does not exist.";
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . htmlspecialchars($conn->error);
        }
    } else {
        echo "Login failed. Incorrect password.";
    }

    $conn->close();
}
?>
</body>
</html>