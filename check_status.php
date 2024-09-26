<?php
include 'config.php';

// Ensure the email is posted and not empty
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);

    $sql = "SELECT status FROM applications WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $statuses = [];
    while ($row = $result->fetch_assoc()) {
        $statuses[] = $row["status"];
    }
    $stmt->close();

    // Remove duplicate statuses if they are not necessary
    $statuses = array_unique($statuses);
} else {
    $statuses = [];
    echo "Please provide an email address.";
}

$conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni</title>
    <style>
        .status-item {
            margin: 10px 0;
            padding: 10px;
            background-color: #f0f0f0;
            border-left: 5px solid #007bff;
        }
    </style>
</head>
<body>
<div class="form-container">
    
</div>
<div id="post-submission">
    <?php if (count($statuses) > 0): ?>
        <?php foreach ($statuses as $status): ?>
            <div class="status-item">Application Status: <?= htmlspecialchars($status); ?></div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No application found for this email.</p>
    <?php endif; ?>
    <p>Click <a href="index.php">here</a> to return to your student dashboard.</p>
</div>
</body>
</html>
