<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$sql="SELECT * FROM pool";
$conn = new mysqli($servername, $username, $password, $dbname);
$all = $conn->query($sql);
?>




<section id="form">
        <?php 
        while($row = mysqli_fetch_assoc($all)) {
        ?>
        <div class="card" style="width:500px; height:600px; align-items: center; border-radius:20px">
                            <img src="./image/<?php echo $row['file']; ?>" style="height:80px; width:80px;">
                                <h4><?php echo $row['name']; ?></h4>        </div>
        <?php } ?>
    </section>
    <script type='text/javascript'>
        $(document).ready(function(){
        $('.userinfo').click(function(){
            var adhar = $(this).data('id'); // Use 'id' instead of 'adhar'
            $.ajax({
                url: 'final2.php',
                type: 'post',
                data: { adhar: adhar },
                success: function(response){ 
                    $('#empModal .modal-body').html(response); 
                    $('#empModal').modal('show'); 
                }
            });
        });
        });
    </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
    <div class="nav-bar">
        <div id="menuToggle" class="toggle-menu active">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </div>
      
      <div class="main">
        <div id="sideMenu" class="side-menu">
          <div class="mobile-search">
            <div class="profile-menu">
                <!-- Add your profile menu items here -->
                <!-- <span class="fa fa-user-circle-o fa-3x" onclick="open()"></span>
                <a href="#" class="profile-item">Profile</a>
                <a href="#" class="profile-item">Settings</a>
                <a href="#" class="profile-item">Logout</a> -->
                <div class="dropdown">
                    <span class="fa fa-user-circle-o fa-3x" onclick="openDropdown()"></span>
                    <div class="dropdown-content" id="myDropdown">
                      <a href="#">view profile</a>
                      <a href="#">Switch Account</a>
                      <a href="#">Log Out</a>
                    
                    </div>
                  </div>




              </div>
            </form>
          </div>
      
          <div class="menu-items">
            <a href="#" class="item">Home</a>

            <div></div>




          
            <!-- <a href="#" class="item">Department</a> -->
            <!-- <div class="btn-group">
               <a class="item"> <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                Department
              </button></a> -->

              <a href="" class="dropdown-toggle item" data-bs-toggle="dropdown" data-bs-auto-close="true">Department</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item item bg-dark" href="#" >IT</a></li>
                  <li><a class="dropdown-item item bg-dark" href="#">CSE</a></li>
                  <li><a class="dropdown-item item bg-dark" href="#">ETC</a></li>
                  <li><a class="dropdown-item item bg-dark" href="#">MECH</a></li>
                  <li><a class="dropdown-item item bg-dark" href="#">CIVIL</a></li>
                </ul>
              </div>


          


            <a href="#" class="item">Porject</a>
            <a href="#" class="item">Earning</a>
            <a href="#" class="item">Report</a>
            <a href="#" class="item">Services</a>
            <a href="#" class="item active">About</a>
            <a href="#" class="item">Help</a>
            <a href="#" class="item">contact</a>
          </div>
        </div>
        <!-- Your side menu content -->
      <!-- ... (your existing HTML code) ... -->

<div class="content">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Container for posts -->
            <div class="posts-container">
                <!-- Individual post -->
                <?php 
                while ($row = mysqli_fetch_assoc($all)) {
                    ?>
                    <div class="post">
                        <div class="post-header">
                            <img src="./image/<?php echo $row['file']; ?>" alt="User Avatar">
                            <div class="post-info">
                                <h3><?php echo $row['name']; ?></h3>
                                <!-- Assuming you have a 'created_at' field in your database for post date -->
                                <p>Posted on <?php echo $row['created_at']; ?></p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p><?php echo $row['content']; ?></p>
                        </div>
                        <div class="post-actions">
                            <div class="post-actions">
                                <button class="react-button">Like</button>
                                <button class="react-button" onclick="toggleCommentInput()">Comment</button>
                            </div>
                            <div class="comments-container">
                                <!-- Comments will be dynamically added here -->
                            </div>
                            <div class="comment-input" id="commentInput" style="display: none;">
                                <input type="text" placeholder="Write a comment..." class="comment-text" id="commentText">
                                <button onclick="postComment()" class="comment-button">Post</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- Additional posts can be added similarly -->
            </div>
        </div>
    </div>
</div>

<!-- ... (the rest of your HTML code) ... -->

    </div>

   
    <script>
        function openDropdown() {
          var dropdown = document.getElementById("myDropdown");
          if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
          } else {
            dropdown.style.display = "block";
          }
        }
      
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.fa-user-circle-o')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.style.display === "block") {
                openDropdown.style.display = "none";
              }
            }
          }
        }
      </script>
      <script>
        function toggleCommentInput() {
    var commentInput = document.getElementById("commentInput");
    if (commentInput.style.display === "none") {
        commentInput.style.display = "block";
    } else {
        commentInput.style.display = "none";
    }
}

function postComment() {
    var commentText = document.getElementById("commentText").value;
    if (commentText.trim() !== "") {
        var commentsContainer = document.querySelector(".comments-container");
        var commentDiv = document.createElement("div");
        commentDiv.classList.add("comment");
        var commentHTML = `
            <div class="comment-header">
                <img src="user-avatar.jpg" alt="User Avatar">
                <div class="comment-info">
                    <h4>User Name</h4>
                    <p>Just now</p>
                </div>
            </div>
            <div class="comment-content">
                <p>${commentText}</p>
            </div>
        `;
        commentDiv.innerHTML = commentHTML;
        commentsContainer.appendChild(commentDiv);
        document.getElementById("commentText").value = ""; // Clear the input field
    }
}

      </script>

// material js

  <!-- Compiled and minified JavaScript -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="index.js">




</body>
</html>
