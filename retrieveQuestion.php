<?php 
    include 'dbconnector.php';
    session_start();

    $question_id = $_GET['question_id'];
    $_SESSION['question_id'] = $question_id;
    $user_id = $_SESSION['user_id'];
    $postBy = 0;

    $question = $conn -> query("SELECT question, details, DATE_FORMAT(time_posted, '%M %d, %Y') AS post_date, DATE_FORMAT(time_posted, '%h:%i %p') AS post_time, user_id FROM questions WHERE question_id = '$question_id'");
    while ($row = $question -> fetch_assoc()) 
    {
        $_SESSION['question'] = $row['question'];
        $_SESSION['details'] = $row['details'];
        $_SESSION['post_date'] = $row['post_date'];
        $_SESSION['post_time'] = $row['post_time'];
        $postBy = $row['user_id'];

        if($row['user_id'] == $user_id){
            $_SESSION['posted_by_user'] = '0';
        }else{
            $_SESSION['posted_by_user'] = '1';
        }
    }

    $postedBy = $conn -> query("SELECT firstName, lastName FROM users WHERE user_id='$postBy'");
    while ($row = $postedBy -> fetch_assoc()) 
    {
        $_SESSION['post_by_firstname'] = $row['firstName'];
        $_SESSION['post_by_lastname'] = $row['lastName'];
    }

    $tags = $conn -> query("SELECT tags FROM tags WHERE tag_id = '$question_id'");
    while ($row = $tags -> fetch_assoc()) 
    {
        $_SESSION['tags'] = $row['tags'];
    }

    $replycount = $conn -> query("SELECT reply_id FROM replies WHERE question_id = '$question_id'");
    $_SESSION['replycount'] = mysqli_num_rows($replycount);

    $replies = $conn -> query("SELECT reply, DATE_FORMAT(time_posted, '%M %d, %Y') AS reply_date, DATE_FORMAT(time_posted, '%h:%i %p') AS reply_time FROM replies WHERE question_id = '$question_id'");

    $bookmark = $conn -> query("SELECT bookmark_id FROM bookmarks WHERE user_id = '$user_id' AND question_id = '$question_id'");

    if(mysqli_num_rows($bookmark) > 0){
        $_SESSION['bookmarked'] = '0';
    }else{
        $_SESSION['bookmarked'] = '1';
    }

    header("Location: displayQuestion.php");
?>