<html>
    <head>
</head>
<body>
<?php


include 'config.php'; // Include your database configuration file

// Initialize variables and sanitize input
$first_name = $conn->real_escape_string($_POST['first_name'] ?? '');
$last_name = $conn->real_escape_string($_POST['last_name'] ?? '');
$email = $conn->real_escape_string($_POST['email'] ?? '');
$uniq_id = $conn->real_escape_string($_POST['uniq_id'] ?? '');

$gre = $conn->real_escape_string($_POST['GRE'] ?? '');
$GPA = $conn->real_escape_string($_POST['GPA'] ?? '');

$personal_statement = $conn->real_escape_string($_POST['personal_statement'] ?? '');

// Prepare a function to handle file upload
function uploadFile($fileInfo, $uploadDir = "uploads/") {
    if ($fileInfo['error'] !== UPLOAD_ERR_OK) {
        echo "No file uploaded or there was an upload error.";
        return false;
    }

    $fileName = basename($fileInfo["name"]);
    $targetPath = $uploadDir . $fileName;
    $fileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));

   

    // Check file size - let's restrict it to 5MB
    if ($fileInfo["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        return false;
    }

    // Allow certain file formats
    $allowedTypes = array('pdf', 'doc', 'docx');
    if (!in_array($fileType, $allowedTypes)) {
        echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
        return false;
    }

    if (move_uploaded_file($fileInfo["tmp_name"], $targetPath)) {
        return $targetPath; // Return the target path if the file is successfully uploaded
    } else {
        echo "Sorry, there was an error uploading your file.";
        return false;
    }
}

// Check if files are set
$transcriptsPath = isset($_FILES["transcripts"]) ? uploadFile($_FILES["transcripts"]) : false;
$recommendationPath = isset($_FILES["recommendation"]) ? uploadFile($_FILES["recommendation"]) : false;

if ($transcriptsPath && $recommendationPath) {
    // SQL to insert data into the database
    $sql = "INSERT INTO applications (firstname, lastname, email, address, transcripts, recommendation_letter, uniq_id, status) VALUES ('$first_name', '$last_name', '$email', '$personal_statement', '$transcriptsPath', '$recommendationPath' , '$uniq_id', 'incomplete')";

    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully! "; 


       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Failed to upload one or more files.";
}

$conn->close();



?>
<a href="index.php">Click here to go to home page</a>
</body>
</html>