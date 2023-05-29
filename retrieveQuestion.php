<?php 
    include 'dbconnector.php';
    
    session_start();

    $_SESSION['question_id'] = '1';
    $_SESSION['user_id'] = '1';
    $id = $_SESSION['question_id'];
    $user_id = $_SESSION['user_id'];

    $question = $conn -> query("SELECT question, details, DATE_FORMAT(time_posted, '%M %d, %Y') AS post_date, DATE_FORMAT(time_posted, '%h:%i %p') AS post_time FROM questions WHERE question_id = '$id'");
    while ($row = $question -> fetch_assoc()) 
    {
        $_SESSION['question'] = $row['question'];
        $_SESSION['details'] = $row['details'];
        $_SESSION['post_date'] = $row['post_date'];
        $_SESSION['post_time'] = $row['post_time'];
    }

    $tags = $conn -> query("SELECT tags FROM tags WHERE tag_id = '$id'");
    while ($row = $tags -> fetch_assoc()) 
    {
        $_SESSION['tags'] = $row['tags'];
    }

    $replycount = $conn -> query("SELECT reply_id FROM replies WHERE question_id = '$id'");
    $_SESSION['replycount'] = mysqli_num_rows($replycount);

    $replies = $conn -> query("SELECT reply, DATE_FORMAT(time_posted, '%M %d, %Y') AS reply_date, DATE_FORMAT(time_posted, '%h:%i %p') AS reply_time, vote FROM replies WHERE question_id = '$id'");

    $bookmark = $conn -> query("SELECT bookmark_id FROM bookmarks WHERE user_id = '$user_id' AND question_id = '$id'");

    if(mysqli_num_rows($bookmark) > 0){
        $_SESSION['bookmarked'] = '0';
    }else{
        $_SESSION['bookmarked'] = '1';
    }
?>