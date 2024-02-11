<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];
    $action = $_POST["action"];

    $status = ($action == 'Approved') ? 1 : 0;

    $updateStmt = $conn->prepare("UPDATE reg SET status = ? WHERE id = ?");
    $updateStmt->bind_param("ii", $status, $userId);

    if ($updateStmt->execute()) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }

    $updateStmt->close();
}

$conn->close();
?>
