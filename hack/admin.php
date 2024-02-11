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

// Modify the SQL query to select only rows where status is null
$sql = "SELECT * FROM reg";
$all = $conn->query($sql);

// Check if the query execution was successful
if (!$all) {
    die("Query failed: " . $conn->error);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #003F88;
            font-size: 16px;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 0;
            background-color: #003F88;
            color: #fff;
            z-index: 99;
        }

        .logo {
            height: 50px;
            width: 50px;
            margin-right: 10px;
        }

        .navigation {
            display: flex;
            align-items: center;
        }

        .navigation a {
            position: relative;
            font-size: 1.1em;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            margin-left: 20px;
        }

        .navigation a:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 100%;
            height: 3px;
            background: #fff;
            border-radius: 5px;
            transform-origin: right;
            transform: scaleX(0);
            transition: transform 0.5s;
        }

        .navigation a:hover::after {
            transform-origin: left;
            transform: scaleX(1);
        }

        #form {
            display: grid;
            grid-template-columns: repeat(1, auto);
            gap: 10px;
            margin-top: 80px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        img.profile-image {
            height: 120px;
            width: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        input[type="submit"] {
            padding: 10px;
            width: 80px;
            border-radius: 10px;
            cursor: pointer;
        }

        .modal-body {
            text-align: center;
        }

        footer {
            background-color: #003F88;
            padding: 20px 0;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            
            <h2 class="car">Admin Dashboard</h2>
        </div>
    </header>

    <section id="form">
        <table>
            <tr>
                <th>Profile</th>
                <th>Name</th>
                <th>Email</th>
                <th>Verification</th>
            </tr>
            <?php 
            while($row = mysqli_fetch_assoc($all)) {
            ?>
            <tr>
                <td><img src="./image/<?php echo $row['id']; ?>" class="profile-image"></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <input type="submit" value="Approved" style="background-color: Green; color: #fff;">
                    <input type="submit" value="Rejected" style="background-color: Red; color: #fff;">
                </td>
            </tr>
            <?php } ?>
        </table>
    </section>

    <!-- Modal and JavaScript code remain unchanged -->

  
</body>
<!-- Add the following script to your HTML file -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $('input[value="Approved"]').click(function() {
            var row = $(this).closest('tr');
            var userId = row.find('td:first-child img').attr('src').split('/')[2];

            // AJAX request to update verification status
            $.ajax({
                url: 'update_verification.php',
                method: 'POST',
                data: { userId: userId, action: 'Approved' },
                success: function(response) {
                    alert(response);
                    // Update UI
                    row.find('td:last-child input[value="Approved"]').prop('disabled', true);
                    row.find('td:last-child input[value="Rejected"]').remove();
                    row.append('<td>Approved</td>');
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>


</script>
</html>
