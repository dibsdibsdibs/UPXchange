<?php
    include 'dbconnector.php';
    include 'session.php';
    include 'edit.php';

    $firstName = isset($_SESSION['firstName']) ? $_SESSION['firstName'] : '';
    $lastName = isset($_SESSION['lastName']) ? $_SESSION['lastName'] : '';
    $course = isset($_SESSION['course']) ? $_SESSION['course'] : '';
    $membership = isset($_SESSION['membership']) ? $_SESSION['membership'] : '';
    $yearLevel = isset($_SESSION['yearLevel']) ? $_SESSION['yearLevel'] : '';
    $about = isset($_SESSION['about']) ? $_SESSION['about'] : '';
    $pp = isset($_SESSION['pp']) ? $_SESSION['pp'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="icon" href="pics\logo_white.png">
    <link href="styles\editProfileStyle.css" type="text/css" rel="stylesheet">
</head>

<body class="bg">
    <div class="top-header">
        <div class = "header-left">
            <img src = "pics\logo_white.png" height="75">
            <h1>UP Xchange</h1>
        </div>
        <div class = "header-right">
            <a><img src = "pics\magnifying glass.png" height="25"></a>
            <a><img src = "pics\plus.png" height="25"></a>
            <a><img src = "pics\categories.png" height="25"></a>
            <a><img src = "pics\bell.png" height="25"></a>
            <a><img src = "pics\user 1.png" height="25"></a>
        </div>
    </div>
    <div class="profile">
        <a><img id="myImg" src="pics\profile.png" height="300" width="300" class="img"></a>
        <h2><?php echo $firstName . " " . $lastName;?></h2>
        <a href="editProfileFR.php"><button class="edit">Edit Profile</button></a>
    </div>
    <div class="tab">
        <button class="tablinks" onclick="openProfile(event, 'About')"><img src = "pics\info 1.png" height="25">  About</button>
        <button class="tablinks" onclick="openProfile(event, 'Asked')"><img src = "pics\question 1.png" height="25">  Asked</button>
        <button class="tablinks" onclick="openProfile(event, 'Answered')"><img src = "pics\answers 1.png" height="25">  Answered</button>
        <button class="tablinks" onclick="openProfile(event, 'Bookmarked')"><img src = "pics\bookmark-white 1.png" height="25">  Bookmarked</button>
    </div>

    <div id="About" class="tabcontent">
      <h3>User Name</h3>    
      <p>Student/Faculty<span class = "spacing"></span>Course and Year</p>
      <br>
        <a>    
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non tortor vitae nulla tempus luctus. Pellentesque imperdiet hendrerit luctus. Etiam dictum cursus lectus, sit amet elementum dolor ultrices non.
        </a> 
    </div>

    <div id="Asked" class="tabcontent">    
        <div>
            <ul style="list-style: none;"> 
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non tortor vitae nulla tempus luctus. Pellentesque imperdiet hendrerit luctus. Etiam dictum cursus lectus, sit amet elementum dolor ultrices non.</li>
            <br>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non tortor vitae nulla tempus luctus. Pellentesque imperdiet hendrerit luctus. Etiam dictum cursus lectus, sit amet elementum dolor ultrices non.</li>
            </ul>
        </div>
    </div>

    <div id="Answered" class="tabcontent">   
        <div class="wrapper">
            <ul style="list-style: none;"> 
                <li><h3>Question 1</h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non tortor vitae nulla tempus luctus. Pellentesque imperdiet hendrerit luctus. Etiam dictum cursus lectus, sit amet elementum dolor ultrices non.</li>
                <br>
                <li><h3>Question 2</h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non tortor vitae nulla tempus luctus. Pellentesque imperdiet hendrerit luctus. Etiam dictum cursus lectus, sit amet elementum dolor ultrices non.</li>
            </ul>
        </div>
    </div>
    <div id="Bookmarked" class="tabcontent">
        <div class="wrapper">       
            <ul style="list-style: none;"> 
                <li><h3>Question 1</h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non tortor vitae nulla tempus luctus. Pellentesque imperdiet hendrerit luctus. Etiam dictum cursus lectus, sit amet elementum dolor ultrices non.</li>
                <br>
                <li><h3>Question 2</h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non tortor vitae nulla tempus luctus. Pellentesque imperdiet hendrerit luctus. Etiam dictum cursus lectus, sit amet elementum dolor ultrices non.</li>
            </ul>
        </div>
    </div>

    <script>
    function openProfile(evt, profilePart) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(profilePart).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>