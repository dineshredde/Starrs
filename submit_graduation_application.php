<?php
session_start();
include 'config.php'; // Database connection setup

$message = ''; // Message to display to the user

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['student_Id'])) {
    $student_id = $_POST['studentId'];
    $current_date = date('Y-m-d');

    // Start transaction
    $conn->begin_transaction();

    try {
        // Check if the student ID exists in the students table
        $student_check_stmt = $conn->prepare("SELECT student_id FROM student_courses WHERE student_id = ?");
        $student_check_stmt->bind_param("s", $student_id);
        $student_check_stmt->execute();
        $student_check_result = $student_check_stmt->get_result();

        if ($student_check_result->num_rows == 0) {
            throw new Exception("Student ID does not exist.");
        }

        // Check if the student has taken at least 10 courses
        $courses_count_stmt = $conn->prepare("SELECT COUNT(course_id) AS course_count FROM student_courses WHERE student_id = ?");
        $courses_count_stmt->bind_param("s", $student_id);
        $courses_count_stmt->execute();
        $courses_count_result = $courses_count_stmt->get_result();
        $courses_count_row = $courses_count_result->fetch_assoc();

        if ($courses_count_row['course_count'] < 10) {
            throw new Exception("Student has not completed the required 10 courses.");
        }

        // Assume all other requirements are met, and the student is eligible for graduation
        // Insert into graduated_students table
        $insert_grad_stmt = $conn->prepare("INSERT INTO graduated_students (student_id, graduation_date, email, full_name) VALUES (?, ?, ?, ?)");
        $insert_grad_stmt->bind_param("ssss", $student_id, $current_date, $_POST['email'], $_POST['fullName']);
        $insert_grad_stmt->execute();

        // Delete the student's records from active tables
        $delete_student_stmt = $conn->prepare("DELETE FROM students WHERE student_id = ?");
        $delete_student_stmt->bind_param("s", $student_id);
        $delete_student_stmt->execute();

        // Commit transaction
        $conn->commit();
        $message = "Congratulations! Application submitted successfully.";
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        $message = "Error: " . $e->getMessage();
    }

    $conn->close();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Graduation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h1>Graduation Application Form</h1>
        <form id="apply_for_graduation_form" action="submit_graduation_application.php" method="post">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="studentId">Student ID:</label>
            <input type="text" id="studentId" name="studentId" required>

            <label for="Grade">Grade:</label>
            <input type="text" id="grade" name="grade" required>

            <label for="program">Program:</label>
            <select id="program" name="program" required>
                <option value="Undergraduate">Undergraduate</option>
                <option value="Graduate">Graduate</option>
            </select>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="graduationDate">Expected Graduation Date:</label>
            <input type="date" id="graduationDate" name="graduationDate" required>

            <button type="submit">Submit Application</button>
        </form>
       
    </div>


<style>body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.form-container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    width: 300px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="date"],
select {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
</style>
 

</body>
</html>
