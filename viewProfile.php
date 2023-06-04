
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
    <link href="styles/editProfileStyle.css" type="text/css" rel="stylesheet">
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

    <div class="tab">
        <button class="tablinks" onclick="openProfile(event, 'About')"><img src = "pics\info 1.png" height="25">  About</button>
        <button class="tablinks" onclick="openProfile(event, 'Asked')"><img src = "pics\question 1.png" height="25">  Asked</button>
        <button class="tablinks" onclick="openProfile(event, 'Answered')"><img src = "pics\answers 1.png" height="25">  Answered</button>
        <button class="tablinks" onclick="openProfile(event, 'Bookmarked')"><img src = "pics\bookmark-white 1.png" height="25">  Bookmarked</button>
    </div>

    <div id="About" class="tabcontent">
      <h3><?php echo $firstName . " " . $lastName;?></h3>   
      <p><?php echo $membership;?><br><br><?php echo $course . " - " . $yearLevel;?></p>
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
                <li style="width: 170%";>
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
        }
        ?>
        </ul>
    </div>
    </div>
</div>

    <div id="Answered" class="tabcontent">   
    <div>
        <div class="scrollable-list">
        <ul style="list-style: none;"> 
        <?php

            $user_id = $_SESSION['user_id'];

            // Prepare the query using prepared statements to prevent SQL injection
            $query = "SELECT question_id, reply, DATE_FORMAT(time_posted, '%M %d, %Y') AS reply_date, DATE_FORMAT(time_posted, '%h:%i %p') AS reply_time, user_id FROM replies ORDER BY time_posted DESC"; 
            $result = mysqli_query($conn, $query);

            if ($result) {

                while ($row = mysqli_fetch_array($result)){

                    $question_id = $row['question_id'];
                    $reply = $row['reply'];
                    $reply_date = $row['reply_date'];
                    $reply_time = $row['reply_time'];
                    $poster_id = $row['user_id'];

                    $questionResult = $conn->query("SELECT question, DATE_FORMAT(time_posted, '%M %d, %Y') AS post_date, DATE_FORMAT(time_posted, '%h:%i %p') AS post_time, user_id FROM questions WHERE question_id = '$question_id'");

                    if ($questionResult) {
                        $row = $questionResult->fetch_assoc();
                        $question = $row['question'];
                        $postDate = $row['post_date'];
                        $postTime = $row['post_time'];
                        $rep_id = $row['user_id'];

                        $getposer = "SELECT firstName, lastName FROM users WHERE user_id = '$rep_id'";  
                        $userp = mysqli_query($conn, $getposer);

                        while ($row = mysqli_fetch_array($userp)){
                            if($row['firstName'] != NULL){
                                $pfirstName = $row['firstName'];
                            }else{
                                $pfirstName = '';
                            }

                            if($row['lastName'] != NULL){
                                $plastName = $row['lastName'];
                            }else if($pfirstName == ''){
                                $plastName = 'ANONYMOUS';
                            }else if($pfirstName != NULL){
                                $plastName = '';
                            }
                        }
                    }
                    
                    $getuser = "SELECT firstName, lastName FROM users WHERE user_id = '$poster_id'";  
                    $userr = mysqli_query($conn, $getuser);

                    while ($row = mysqli_fetch_array($userr)){
                        if($row['firstName'] != NULL){
                            $rfirstName = $row['firstName'];
                        }else{
                            $rfirstName = '';
                        }

                        if($row['lastName'] != NULL){
                            $rlastName = $row['lastName'];
                        }else if($rfirstName == ''){
                            $rlastName = 'ANONYMOUS';
                        }else if($rfirstName != NULL){
                            $rlastName = '';
                        }
                    }
        ?>
                <li style="width: 200%";>
                    <div class='question-content' id='<?php echo $question_id; ?>'>
                        <p class='question-poster'>Posted by <?php echo $pfirstName . ' ' . $plastName . ' on ' . $postDate . ' ' . $postTime; ?></p>
                        <div class='question'>
                            <p class='question-title'><?php echo $question; ?></p>
                            <p class='question-details'><?php echo $reply; ?></p>
                        </div>
                            <p class='question-time'>Replied by <?php echo $rfirstName . ' ' . $rlastName . ' on ' . $reply_date . $reply_time; ?></p>
                        
                </div>
                </li>
                <br>
        <?php
            }
        }
        ?>
        </ul>
    </div>
    </div>
</div>
    <div id="Bookmarked" class="tabcontent">
    <div>
        <div class="scrollable-list">
        <ul style="list-style: none;"> 
        <?php

            $user_id = $_SESSION['user_id'];

            // Prepare the query using prepared statements to prevent SQL injection
            $query = "SELECT question_id, DATE_FORMAT(time_bookmarked, '%M %d, %Y') AS book_date, DATE_FORMAT(time_bookmarked, '%h:%i %p') AS book_time, user_id FROM bookmarks ORDER BY time_bookmarked DESC"; 
            $result = mysqli_query($conn, $query);

            if ($result) {

                while ($row = mysqli_fetch_array($result)){

                    $question_id = $row['question_id'];
                    $book_date = $row['book_date'];
                    $book_time = $row['book_time'];
                    $poster_id = $row['user_id'];

                    $questionResult = $conn->query("SELECT question, DATE_FORMAT(time_posted, '%M %d, %Y') AS post_date, DATE_FORMAT(time_posted, '%h:%i %p') AS post_time, user_id FROM questions WHERE question_id = '$question_id'");

                    if ($questionResult) {
                        $row = $questionResult->fetch_assoc();
                        $question = $row['question'];
                        $postDate = $row['post_date'];
                        $postTime = $row['post_time'];
                        $book_id = $row['user_id'];

                        $getposer = "SELECT firstName, lastName FROM users WHERE user_id = '$rep_id'";  
                        $userp = mysqli_query($conn, $getposer);

                        while ($row = mysqli_fetch_array($userp)){
                            if($row['firstName'] != NULL){
                                $pfirstName = $row['firstName'];
                            }else{
                                $pfirstName = '';
                            }

                            if($row['lastName'] != NULL){
                                $plastName = $row['lastName'];
                            }else if($pfirstName == ''){
                                $plastName = 'ANONYMOUS';
                            }else if($pfirstName != NULL){
                                $plastName = '';
                            }
                        }
                    }
                    
                    $getuser = "SELECT firstName, lastName FROM users WHERE user_id = '$poster_id'";  
                    $userr = mysqli_query($conn, $getuser);

                    while ($row = mysqli_fetch_array($userr)){
                        if($row['firstName'] != NULL){
                            $rfirstName = $row['firstName'];
                        }else{
                            $rfirstName = '';
                        }

                        if($row['lastName'] != NULL){
                            $rlastName = $row['lastName'];
                        }else if($rfirstName == ''){
                            $rlastName = 'ANONYMOUS';
                        }else if($rfirstName != NULL){
                            $rlastName = '';
                        }
                    }
        ?>
                <li style="width: 234%";>
                    <div class='question-content' id='<?php echo $question_id; ?>'>
                        <p class='question-poster'>Posted by <?php echo $pfirstName . ' ' . $plastName . ' on ' . $postDate . ' ' . $postTime; ?></p>
                        <div class='question'>
                            <p class='question-title'><?php echo $question; ?></p>
                        </div>
                            <p class='question-time'>Bookmark by <?php echo $rfirstName . ' ' . $rlastName . ' on ' . $book_date . $book_time; ?></p>
                        
                </div>
                </li>
                <br>
        <?php
            }
        }
        ?>
        </ul>
    </div>
    </div>
</div>


    <script src="scripts/indexJS.js" type="text/javascript"></script>

</body>
</html>

<?php
    unset($_SESSION["error"]);
?>