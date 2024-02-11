<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];
    $action = $_POST["action"];

    // Update verification status
    $status = ($action == 'Approved') ? 1 : 0;

    // Update status directly in the 'reg' table
    $stmt = $conn->prepare("UPDATE reg SET status = ? WHERE id = ?");
    $stmt->bind_param("ss", $status, $userId);

    if ($stmt->execute()) {
        echo "Verification status updated successfully!";
    } else {
        echo "Error updating verification status: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
