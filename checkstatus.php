<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admissions Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h2>Check Application Status</h2>
    <form action="check_status.php" method="post">
        <input type="email" name="email" placeholder="Enter your email to check your status" required>
        <button type="submit">Check Status</button>
    </form>
    
</body>
</html>
<script src="admission_scripts.js"></script>
    <style>
        /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

h1, h2 {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 20px;
}

form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="text"],
input[type="email"],
textarea,
input[type="file"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button[type="submit"] {
    width: calc(100% - 20px);
    padding: 10px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    box-sizing: border-box;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

/* Responsive styles */
@media (max-width: 768px) {
    form {
        width: 90%;
    }
}

    </style>
