<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    if(isset($_POST['reply'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }
    }

    $reply = $_POST['reply'];
    $question_id = $_SESSION['question_id'];

    $sql = "INSERT INTO replies (reply, question_id) VALUES ('$reply', '$question_id')";

    $error = '';

    if($conn -> query($sql) == TRUE){
        $error = "Successfully uploaded reply!";
        $_SESSION["error"] = $error;
        header("Location: displayQuestion.php");
        exit();
    }

    $_SESSION["error"] = $error;
    header("Location: addQuestion.php");
?>