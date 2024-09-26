<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Course Registration</h1>
    <form action="register_course.php" method="post">
    <label for="course_id">Select Term:</label>
    <select name="course_id" id="course_id">
    <option value="select">SELECT A TERM</option>
        <option value="fall_2024"><a href="register_courses.php" >Fall 2024</option>
        <option value="summer_2024">Summer 2024</option>
    </select>
        <button type="submit">Register</button>
    </form>

    <!-- Display of courses -->
    <div id="courses">
       
    </div>
    <style>
/* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

h1 {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 20px;
}

form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: #fff;
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