<?php
include 'config.php';  // Include your database connection configuration

// Check if 'uniq_id' and 'decision' are set and not empty
if (isset($_POST['uniq_id'], $_POST['decision']) && !empty($_POST['uniq_id']) && !empty($_POST['decision'])) {
    $uniq_id = $_POST['uniq_id'];
    $decision = $_POST['decision'];

    // Prepare the SQL statement to update the applications table
    $stmt = $conn->prepare("UPDATE applications SET status = ? WHERE uniq_id = ?");
    if ($stmt) {
        // Bind the parameters to the SQL query. Both parameters are strings.
        $stmt->bind_param("ss", $decision, $uniq_id);
        if (!$stmt->execute()) {
            echo "Error submitting status: " . $stmt->error;
        } else {
            if ($stmt->affected_rows > 0) {
                echo "Status submitted successfully.";
            } else {
                echo "No rows updated. Please check if the uniq_id is correct and the new decision is different from the old one.";
            }
        }
        $stmt->close(); // Close the statement
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Unique ID or decision not provided. Please check your input fields.";
}

$conn->close(); // Close the database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni</title>
    
</head>
<body>
<div id="post-submission">
      <p>Click <a href="index.php">here</a> to return to your student dashboard.</p>
</div>
</body>

</html>
