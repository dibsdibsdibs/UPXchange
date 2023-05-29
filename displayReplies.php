<?php
    include 'dbconnector.php';

    $replies = $conn -> query("SELECT reply, DATE_FORMAT(time_posted, '%M %d, %Y') AS reply_date, DATE_FORMAT(time_posted, '%h:%i %p') AS reply_time, vote FROM replies WHERE question_id = '$id'");
    $num_reply = 0;

    if($replies -> num_rows > 0){
        while ($row = $replies -> fetch_assoc()){
            $reply = $row['reply'];
            $reply_date = $row['reply_date'];
            $reply_time = $row['reply_time'];
            $vote = $row['vote'];
            $num_reply = $num_reply + 1;
            echo
            "<div class='reply-content'>
                <div class='vote-count'>
                    <img src='pics/upvote.png' class='upvote' id='up-$num_reply' onclick='upVote()' height='20'>
                    <p id='$num_reply'>$vote</p>
                    <img src='pics/downvote.png' class='downvote' id='down-$num_reply' onclick='downVote()' height='20'>
                </div>
                <div class='display-reply'>
                    <p class='reply-time'>$reply_date $reply_time</p>
                    <p class='list-reply'>$reply</p>
                </div>
            </div>";
        }
    }
?>