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
    $post = $_POST["post"];
    $des = $_POST["des"];
    $stmt = $conn->prepare("INSERT INTO reg (post,des) VALUES (?, ?)");
    $stmt->bind_param("ss",$post,$des);
        if ($stmt->execute()) {
        header("refresh:0.5; url=card.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>