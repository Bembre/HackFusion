
<?php
// Resume the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: index.html");
    exit();
}
// Access session variables
if($name = $_SESSION['name']){ 

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "project";
  $sql="SELECT * FROM reg";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $all = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <div id="fb-root"></div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v19.0" nonce="WamMEeBU"></script>

    <style>
      /* .dropdown {
            position: relative;
            display: inline-block;
        } */
        body {
    font-family: Arial, sans-serif;
    margin: 10;
    padding: 10;
  }
  
  .search-container {
    background-color: #4b4ead;
    padding: 20px;
    text-align: center;
  }

  .search-container input[type=text] {
    padding: 10px;
    width: 40%;
    border: none;
    border-radius: 5px;
    margin-right: 10px;
    margin-bottom: 10px;
  }

  .search-container button {
    padding: 10px 20px;
    background-color: #4b4ead;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  
  .navigation {
    background-color:#4b4ead;
    padding: 10px;
    text-align: center;
    position: absolute;
    /* bottom: 80%; */
    width: 100%;
  }

  .navigation a {
    color: white;
    text-decoration: none;
    padding: 10px;
    margin: 0 5px;
  }

  .navigation a i {
    margin-right: 5px;
  }

  .navigation a:hover {
    background-color: #fff;
    color:#4b4ead;
    border-radius:10px
  }
  #search:hover {
    background-color: #fff;
    color:#4b4ead;
    border-radius:10px
  }
        .dropdown {
            position: fixed;
            bottom: 200px;
            right: 60px;
            margin: 10px;
        }

.dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0 -8px 16px rgba(0, 0, 0, 0.2); /* Negative value to drop up */
            min-width: 160px;
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }


.bottom-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #4b4ead;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 10px;
  }
  
  .icon {
    color: #fff;
    font-size: 24px;
    cursor: pointer;
  }
  
  /* Dark Theme */
  body.dark-theme {
    background-color: #1a1a1a;
    color: #fff;
  }
  
  .bottom-bar.dark-theme {
    background-color: #fff;
  }
.profile-icon {
            cursor: pointer;
            margin: 10px;
        }

        .profile-menu {
            display: none;
            position: absolute;
            top: 50px;
            right: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .text-container {
    max-height: 95px; /* Set the maximum height for initial display */
    overflow: hidden;
    transition: max-height 0.3s ease; /* Add a smooth transition effect */
}

#showMoreBtn {
    margin-top: 10px;
    cursor: pointer;
    border: none;
    background-color: transparent;
    color: #fff;
    text-decoration: underline;
}
#container {
            height: 100vh;
            overflow-y: auto;
            display: block;
            flex-direction: column;
        }
        .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.card {
    width: 45%; /* Adjust the width as needed */
    height: 450px;
    border-radius: 20px;
    margin: 10px;
    box-sizing: border-box;
    margin-bottom: 10px; /* Adjust the vertical distance as needed */
    background-color: #fff; /* Set your desired background color */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow for a card-like appearance */
}

.card img {
    height: 80px;
    width: 80px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.card h4 {
    margin: 0;
}

/* #card {
            height: 150vh;
            width: 100vh
            overflow-y: auto; Add vertical scroll for the container */
            /* display: flex; */
            /* flex-direction: column; */
            /* flex-grow: 1; Allow the container to grow to fill the available space */
            /* overflow-y: auto; Add vertical scroll for the card container */
        /* } */

        #commentBox {
          width: 90%;  
        /* margin: 79px; */
            border: 2px solid #4b4ead;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #commentList {
            list-style-type: none;
            padding: 0;
            margin-bottom: 15px;
        }

        .comment {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #blue;
            border-radius: 5px;
        }

        #newComment {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
     
      </style>
</head>
<body>

<!-- comment facebook plugin -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v19.0" nonce="baJjQH77"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <div class="search-container">
  <input type="text" placeholder="Search...">
  <button type="submit" style="border:1px solid #fff;" id="search">Search</button>
</div>

<div class="navigation">
  <a href="card.php"><i class="fas fa-home"></i></a>  
  <a href="message.html"><i class="fas fa-handshake"></i>Connection's</a>
  <a href="photo.html"><i class="far fa-image"></i>Photo</a>
  <a href="gallery.html" style="text-decoration:none;"><i class="far fa-calendar-alt"></i>Events</a>
</div><br>
    
    
<!-- font aswesom link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="index.css">

<nav id="side-nav">




  <ul>
  <img src="image/p6.jpg" style="height:80px; width:80px; border-radius:100px; padding-left:20%">
  <!-- <img src="image/p1.png" style="height:80px; width:80px; border-radius:100px; margin:20%"> -->

<a href="view.html" style="text-decoration:none; color:#fff"><li>View Profile</li></a>
<li class="sub-menu-link"><a href="#">Switch Account</a></li>
    <ul class="side-nav-sub-menu">
      <!-- <li><a href="#"  onclick="changeText('Anonymous')">Anynomus</a></li> -->
      <li><button onclick="toggleUser()" ondblclick="toggleAnonymous()">Toggle User/Anonymous</button></li>
</ul>

</span>

  



<script>
    function toggleUser() {
        document.getElementById('dynamicText').innerHTML = 'User';
    }

    function toggleAnonymous() {
        document.getElementById('dynamicText').innerHTML = 'Anonymous';
    }
</script>



<script>
    function toggleProfileMenu() {
        var profileMenu = document.getElementById('profileMenu');
        profileMenu.style.display = (profileMenu.style.display === 'block') ? 'none' : 'block';
    }

    function viewProfile() {
        // Implement code to show the profile view
        console.log('View Profile clicked');
    }

    function switchAccount() {
        // Implement code to switch account
        console.log('Switch Account clicked');
    }
</script>


    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li class="sub-menu-link"><a href="#">Departments</a></li>
    <ul class="side-nav-sub-menu">
      <li><a href="it.html">IT</a></li>
      <li><a href="cse.htlm">CSE</a></li>
      <li><a href="etc.html">ETC</a></li>
      <li><a href="#">MECH</a></li>
      <li><a href="civil.html">CIVIL</a></li>
    </ul>
    <li><a href="#">Contact</a></li>
  </ul>
  <span id="show-nav"><i class="material-icons" style="color:#fff;">arrow_forward</i></span>
</nav>




<div id="container" class="card-container">

    <?php 
    while($row = mysqli_fetch_assoc($all)) {
    ?>
    <section>
    <div id="card" class="card" style="height:600px; width:400px;">
                        <span class="fas fa-user-circle fa-3x"></span>
                            <h4 style=""><?php echo $row['name']; ?></h4>
                            <div class="text-container" id="textContainer" style="margin:10px">
                            <!-- description -->
                    <h5><?php echo $row['des']; ?></h5>
                </div>
                            <!-- media -->
                            <img src="image/try.jpg" style="border-radius:0px; width:90%; height:350px;">
                            <!-- messageing -->

  
                          <div id="commentBox" style="background-color:#fff; color:#4b4ead;">
    <h2>Comments</h2>
    <ul id="commentList"></ul>
    <textarea id="newComment" style="background-color:#4b4ead; color:#fff">Type your comment here</textarea>
    <button onclick="addComment()">Add Comment</button>
</div>


                        
                          <br>
                          </div>
                      </section>
                    

                      

                      <?php } ?>


<div>


</div>

<script>

switchAccountBtn.addEventListener('click', () => {
    // Set username and user pic to anonymous
    usernameSpan.textContent = 'Anonymous';
    // userPicImg.src = 'anonymous.png'; // Replace 'anonymous.png' with your anonymous user pic path
});
function toggleText(id) {
        var textContainer = document.getElementById("textContainer" + id);
        var btn = document.getElementById("showMoreBtn" + id);

        if (textContainer.style.maxHeight) {
            textContainer.style.maxHeight = null;
            btn.innerHTML = "Show More";
        } else {
            textContainer.style.maxHeight = "200px"; // Set the maximum height for initial display
            btn.innerHTML = "Show Less";
        }
    }

    function addComment() {
        // Your add comment logic here
    }


</script>




<!-- <div class="dropdown">
    <button onclick="toggleDropdown()">+</button>
    <div class="dropdown-content" id="myDropdown">
        <a href="post.html" onclick="selectOption('media')">Media</a>
        <a href="post.html" onclick="selectOption('text')">Text</a>
    </div>
</div>


<div class="bottom-bar">
    <div class="icon"><i class="fas fa-bell"></i></div>
    <div class="icon"><i class="fas fa-plus"></i></div>
    <div class="icon"><i class="fas fa-envelope"></i></div>
  </div> -->



<div class="bottom-bar">
    <div class="icon"><i class="fas fa-bell"></i></div>
    <div class="icon" onclick="toggleDropdown()"><i class="fas fa-plus"></i></div>
    <div class="icon"><i class="fas fa-envelope"></i></div>
</div>

<div class="dropdown">
    <button onclick="toggleDropdown()">+</button>
    <div class="dropdown-content" id="myDropdown">
        <a href="post.html" onclick="selectOption('media')">Media</a>
        <a href="post.html" onclick="selectOption('text')">Text</a>
    </div>
</div>





<script src="index.js"></script>
<script>
    function changeText(name) {
        document.getElementById('dynamicText').innerHTML = "Hello, " + name + "!";
    }
</script>


<script>
    function addComment() {
        var commentText = document.getElementById('newComment').value;

        if (commentText.trim() === '') {
            alert('Please enter a comment.');
            return;
        }

        var commentList = document.getElementById('commentList');
        var li = document.createElement('li');
        li.className = 'comment';
        li.appendChild(document.createTextNode(commentText));
        commentList.appendChild(li);

        // Clear the input field after adding the comment
        document.getElementById('newComment').value = '';
    }
</script>





<script>

const switchAccountBtn = document.getElementById('switchAccount');
const usernameSpan = document.getElementById('username');
const userPicImg = document.getElementById('userPic');


<?php } ?>
    


</script>

</body>
</html>
