<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graduation Application</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Apply for Graduation</h1>
    <form action="submit_graduation_application.php" method="post">
        <input type="hidden" name="student_id" value="student_id"> <!-- This should be dynamically set based on logged-in user -->
        <button type="submit">Apply for Graduation</button>
    </form>
    <style>
        <script src="scripts/graduation_scripts.js"></script>
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

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="hidden"] {
    display: none;
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