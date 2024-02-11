
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session
session_start();

// Set session variables
$_SESSION['name'] = '$name';
$_SESSION['email'] = '$email';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profile = $_POST["profile"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $id = $_POST["id"];
    $stmt = $conn->prepare("INSERT INTO reg (profile,name,email,password,id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss",$profile, $name,$email,$password,$id);
        if ($stmt->execute()) {
        header("refresh:0.5; url=index.html");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>