<?php 
    include 'dbconnector.php';
    
    session_start();

    $question_id = $_SESSION['question_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO bookmarks (question_id, user_id) VALUES ('$question_id', '$user_id')";

    if($conn -> query($sql) == TRUE){
        $error = "Successfully bookmarked question!";
        $_SESSION["error"] = $error;
        $_SESSION["bookmarked"] = '0';
        header("Location: displayQuestion.php");
        exit();
    }
?>