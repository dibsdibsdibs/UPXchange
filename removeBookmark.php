<?php 
    include 'dbconnector.php';
    
    $question_id = $_SESSION['question_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM bookmarks WHERE question_id = '$question_id' AND user_id = '$user_id'";

    if($conn -> query($sql) == TRUE){
        $error = "Successfully removed bookmark!";
        $_SESSION["error"] = $error;
        $_SESSION["bookmarked"] = '1';
        header("Location: displayQuestion.php");
        exit();
    }
?>