<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    if(isset($_POST['question']) && isset($_POST['details'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }
    }

    $question = $_POST['question'];
    $details = $_POST['details'];
    $question_id = $_SESSION['question_id'];
    $_SESSION['question'] = $question;
    $_SESSION['details'] = $details;

    $sql = "UPDATE questions SET question = '$question', details = '$details' WHERE question_id = '$question_id'";

    if($conn -> query($sql) == TRUE){
        $error = "Successfully updated question!";
        $_SESSION["error"] = $error;
        header("Location: displayQuestion.php");
        exit();
    }
?>