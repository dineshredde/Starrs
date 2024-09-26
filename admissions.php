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




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES)) {
    $targetDirectory = __DIR__ . "/uploads/";
    $transcriptFile = $targetDirectory . basename($_FILES["transcripts"]["name"]);
    $recommendationFile = $targetDirectory . basename($_FILES["recommendation"]["name"]);

    // Check if file actually exists and is uploaded via POST
    if (is_uploaded_file($_FILES["transcripts"]["tmp_name"])) {
        if (move_uploaded_file($_FILES["transcripts"]["tmp_name"], $transcriptFile)) {
            echo "The file ". htmlspecialchars(basename($_FILES["transcripts"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file was uploaded for transcripts or file upload was not via POST.";
    }

    // Repeat for the second file
    if (is_uploaded_file($_FILES["recommendation"]["tmp_name"])) {
        if (move_uploaded_file($_FILES["recommendation"]["tmp_name"], $recommendationFile)) {
            echo "The file ". htmlspecialchars(basename($_FILES["recommendation"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file was uploaded for recommendation or file upload was not via POST.";
    }
}


include 'config.php';

?> 





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admissions Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>University Admissions Form</h1>
    <form action="submit_application.php" method="post" enctype="multipart/form-data">
    <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="text" name="uniq_id" placeholder="Unique ID" required>

        <input type="text" name="gpa" placeholder="GPA" required>
        <input type="text" name="gre" placeholder="GRE" required>

        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="personal_statement" placeholder="Address"></textarea>
        <input type="file" name="transcripts" required>
        <input type="file" name="recommendation" required>
        <button type="submit">Submit Application</button>
    </form>

    
</body>
</html>

