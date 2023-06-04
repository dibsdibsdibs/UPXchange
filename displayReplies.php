<?php
    include 'dbconnector.php';

    $question_id = $_SESSION['question_id'];

    $replies = $conn -> query("SELECT reply, DATE_FORMAT(time_posted, '%M %d, %Y') AS reply_date, DATE_FORMAT(time_posted, '%h:%i %p') AS reply_time, user_id FROM replies WHERE question_id = '$question_id'");
    $_SESSION['replycount'] = mysqli_num_rows($replies);

    if($replies -> num_rows > 0){
        while ($row = $replies -> fetch_assoc()){
            $reply = $row['reply'];
            $reply_date = $row['reply_date'];
            $reply_time = $row['reply_time'];
            $postBy = $row['user_id'];

            $getuser = "SELECT firstName, lastName FROM users WHERE user_id = '$postBy'";  
            $user = mysqli_query($conn, $getuser);

            while ($row = mysqli_fetch_array($user)){
                if($row['firstName'] != NULL && $row['firstName'] != 'Your'){
                    $firstName = $row['firstName'];
                }else{
                    $firstName = '';
                }
    
                if($row['lastName'] != NULL && $row['lastName'] != 'Name'){
                    $lastName = $row['lastName'];
                }else if($firstName == '' || $row['firstName'] == 'Name'){
                    $lastName = 'ANONYMOUS';
                }else if($firstName != NULL){
                    $lastName = '';
                }
            }
            
            echo
            "<div class='reply-content'>
                <div class='display-reply'>
                    <p class='reply-info'>$firstName $lastName on $reply_date $reply_time</p>
                    <p class='list-reply'>$reply</p>
                </div>
            </div>";
        }
    }
?>