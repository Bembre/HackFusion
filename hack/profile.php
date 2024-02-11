<!-- Filename: profile_list.php -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$sql = "SELECT * FROM reg";
$conn = new mysqli($servername, $username, $password, $dbname);
$all = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head section with necessary meta tags, stylesheets, and scripts -->
    <style>
        /* Add this styling to your existing CSS file or create a new one */

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 20px;
}

.card {
    width: 200px;
    height: 250px;
    border-radius: 15px;
    margin: 10px;
    box-sizing: border-box;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
}

.card:hover {
    transform: scale(1.05);
}

.card img {
    width: 100%;
    height: 120px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    object-fit: cover;
}

.card h4 {
    margin: 10px;
    font-size: 16px;
    text-align: center;
    color: #333;
}

/* Add more styles as needed for additional user information */

/* Optional: Add media queries for responsiveness */
@media (max-width: 768px) {
    .card {
        width: 100%;
    }
}
    </style>
</head>

<body>

    <?php
    while ($row = mysqli_fetch_assoc($all)) {
    ?>
        <!-- HTML code to display user profiles -->
        <section>
            <div class="card">
                <!-- Display user profile information -->
                <img src="./image/<?php echo $row['profile']; ?>" style="height:80px; width:80px;">
                <h4><?php echo $row['name']; ?></h4>
                <!-- Add other user information as needed -->
            </div>
        </section>
    <?php } ?>

    <!-- Additional HTML content or scripts if needed -->

</body>
<script></script>

</html>
