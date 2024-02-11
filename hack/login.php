
<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session
session_start();

// Set session variables
$_SESSION['name'] = '$name';
$_SESSION['email'] = '$email';


// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the user is an admin
    $adminStmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
    $adminStmt->bind_param("ss", $email, $password);
    $adminStmt->execute();
    
    $adminResult = $adminStmt->get_result();

    if ($adminResult->num_rows == 1) {
        // Admin login successful
        // Redirect to admin.php page after a delay
        header("refresh:0.25; url=admin.php");
        exit();
    }

    // Prepare the SQL statement for regular users
    $userStmt = $conn->prepare("SELECT * FROM reg WHERE email = ? AND password = ? AND status=1");
    $userStmt->bind_param("ss", $email, $password);
    $userStmt->execute();
    
    // Get the result
    $userResult = $userStmt->get_result();

    if ($userResult->num_rows == 1) {
        // Regular user login successful
        // Redirect to post.html page after a delay
        header("refresh:0.25; url=card.php");
        exit();
    } else {
        // Login failed for both admin and regular user
        echo "<script>alert('Verification under process!!!');</script>";
    }

    // Close the statements
    $adminStmt->close();
    $userStmt->close();
}

// Close the database connection
$conn->close();
?>
