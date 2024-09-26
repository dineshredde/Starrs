<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Add your SQL query to check login credentials and role
// For example:
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Logged in successfully as $role";
} else {
    echo "Invalid credentials";
}

$conn->close();
?>