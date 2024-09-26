<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Decision</title>
</head>
<body>
    <h1>Submit Decision for Applicant</h1>
    <?php
      
    include 'config.php';  // Database connection
    $uniq_id = $_GET['uniq_id'] ?? die('Applicant ID is required.');

    // Fetch the first name for display
    $stmt = $conn->prepare("SELECT firstname FROM applications WHERE uniq_id = ?");
    $stmt->bind_param("i", $uniq_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($data = $result->fetch_assoc()) {
        echo "<p>Submitting decision for: " . htmlspecialchars($data['firstname']) . "</p>";
    } else {
        die("Applicant not found.");
    }
 
    ?>
   <form action="process_decision.php" method="post">
   <input type="hidden" name="uniq_id" value="<?php echo htmlspecialchars($uniq_id); ?>">
    <input type="hidden" name="firstname" value="<?php echo $firstname; ?>"> <!-- Assuming this is correct and passed -->
    <label for="decision">Decision:</label>
        <select id="decision" name="decision">
            <option value="Admit">Admit</option>
            <option value="Admit with Aid">Admit with Aid</option>
            <option value="Reject">Reject</option>
    </select><br><br>
    <input type="submit" value="Submit Decision">
    </form>
</body>
</html>