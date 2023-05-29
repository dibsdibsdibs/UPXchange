<?php
    include 'dbconnector.php';

    $id = $_SESSION['question_id'];

    $replies = $conn -> query("SELECT reply, DATE_FORMAT(time_posted, '%M %d, %Y') AS reply_date, DATE_FORMAT(time_posted, '%h:%i %p') AS reply_time, user_id FROM replies WHERE question_id = '$id'");

    if($replies -> num_rows > 0){
        while ($row = $replies -> fetch_assoc()){
            $reply = $row['reply'];
            $reply_date = $row['reply_date'];
            $reply_time = $row['reply_time'];
            $user_id = $row['user_id'];

            $postedBy = $conn -> query("SELECT firstName, lastName FROM users WHERE user_id='$postBy'");
            while ($name = $postedBy -> fetch_assoc()) 
            {
                $firstName = $name['firstName'];
                $lastName = $name['lastName'];
            }
            
            echo
            "<div class='reply-content'>
                <div class='display-reply'>
                    <p class='reply-poster'>$firstName $lastName on $reply_date $reply_time</p>
                    <p class='list-reply'>$reply</p>
                </div>
            </div>";
        }
    }
?>