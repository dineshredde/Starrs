<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Faculty Portal</h1>
    <section>
        <h2>Enter Grades</h2>
        <form action="php/submit_grades.php" method="post">
            <input type="text" name="student_id" placeholder="Student ID">
            <input type="text" name="course_id" placeholder="Course ID">
            <input type="text" name="grade" placeholder="Grade">
            <button type="submit">Submit Grade</button>
        </form>
    </section>

    <section>
        <h2>Advisee Information</h2>
        <!-- Advisee details will be loaded here -->
    </section>

    <script src="faculty_scripts.js"></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin-top: 20px;
}

section {
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-bottom: 10px;
}

form {
    max-width: 400px;
    margin: 0 auto;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}
</style>
</body>
</html>