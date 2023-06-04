<?php
    include 'dbconnector.php';
    include 'profileSaved.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="icon" href="pics\logo_white.png">
    <link href="styles/general.css" type="text/css" rel="stylesheet">
    <link href="styles\editProfileStyle.css" type="text/css" rel="stylesheet">
    <link href="styles/indexDesign.css" type="text/css" rel="stylesheet">
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
        <div class="scrollable-list">
        <ul style="list-style: none;"> 
        <?php

        $user_id = $_SESSION['user_id'];

        // Prepare the query using prepared statements to prevent SQL injection
        $query = "SELECT question_id, question, details, DATE_FORMAT(time_posted, '%M %d, %Y') AS post_date, DATE_FORMAT(time_posted, '%h:%i %p') AS post_time, user_id FROM questions ORDER BY time_posted DESC"; 
        $result = mysqli_query($conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_array($result)){
                $question_id = $row['question_id'];
                $question = $row['question'];
                $details = $row['details'];
                $date_posted = $row['post_date'];
                $time_posted = $row['post_time'];
                $poster_id = $row['user_id'];

                $getuser = "SELECT firstName, lastName FROM users WHERE user_id = '$poster_id'";  
                $user = mysqli_query($conn, $getuser);

                while ($row = mysqli_fetch_array($user)){
                    if($row['firstName'] != NULL){
                        $firstName = $row['firstName'];
                    }else{
                        $firstName = '';
                    }

                    if($row['lastName'] != NULL){
                        $lastName = $row['lastName'];
                    }else if($firstName == ''){
                        $lastName = 'ANONYMOUS';
                    }else if($firstName != NULL){
                        $lastName = '';
                    }
                }
        ?>
                <li>
                    <div class='question-content' id='<?php echo $question_id; ?>'>
                        <p class='question-poster'>Posted by <?php echo $firstName . ' ' . $lastName; ?></p>
                        <div class='question'>
                            <p class='question-title'><?php echo $question; ?></p>
                            <p class='question-details'><?php echo $details; ?></p>
                        </div>
                        <p class='question-time'>Posted on <?php echo $date_posted . ' ' . $time_posted; ?></p>
                    </div>
                </li>
                <br>
        <?php
            }

            // Free the result set
            mysqli_free_result($result);
        } else {
            // Handle the query error
            echo "Error executing query: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
        </ul>
    </div>
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

    <script src="scripts/indexJS.js" type="text/javascript"></script>

</body>
</html>

<?php
    unset($_SESSION["error"]);
?>