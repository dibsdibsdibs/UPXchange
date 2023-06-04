<?php
    include 'dbconnector.php';
    include 'profileSaved.php';
    include 'asked.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="icon" href="pics\logo_white.png">
    <link href="styles/general.css" type="text/css" rel="stylesheet">
    <link href="styles\editProfileStyle.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg">
    <?php include "header.php"  ; ?>

    <div class="profile">
        <a><img id="myImg" src="pics/<?php echo $pp; ?>" height="300" width="300" class="img"></a>
        <h2><?php echo $firstName . " " . $lastName;?></h2>
        <a href="editProfile.php"><button class="edit">Edit Profile</button></a>
    </div>
    <div class="tab">
        <button class="tablinks" onclick="openProfile(event, 'About')"><img src = "pics\info 1.png" height="25">  About</button>
        <button class="tablinks" onclick="openProfile(event, 'Asked')"><img src = "pics\question 1.png" height="25">  Asked</button>
        <button class="tablinks" onclick="openProfile(event, 'Answered')"><img src = "pics\answers 1.png" height="25">  Answered</button>
        <button class="tablinks" onclick="openProfile(event, 'Bookmarked')"><img src = "pics\bookmark-white 1.png" height="25">  Bookmarked</button>
    </div>

    <div id="About" class="tabcontent">
      <h3><?php echo $firstName . " " . $lastName;?></h3>   
      <p><?php echo $membership;?><span class = "spacing"></span><?php echo $course . " - " . $yearLevel;?></p>
      <br>
        <a>    
            <?php echo $about;?>
        </a> 
    </div>

    <div id="Asked" class="tabcontent">    
        <div>
            <ul style="list-style: none;">
                <?php foreach ($askedQuestions as $question): ?>
                    <li><a href="displayQuestion.php?question=<?php echo urlencode($question['question']); ?>"><?php echo $question['question']; ?></a></li>
                    <br>
                <?php endforeach; ?>
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