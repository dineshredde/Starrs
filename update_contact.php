<?php
include 'config.php';

$alumni_id = $_POST['alumni_id'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "UPDATE alumni SET email = '$email', phone = '$phone', address = '$address' WHERE alumni_id = '$alumni_id'";

if ($conn->query($sql) === TRUE) {
    echo "Contact information updated successfully.";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>