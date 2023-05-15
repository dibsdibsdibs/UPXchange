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

    $question = validate($_POST['question']);
    $details = validate($_POST['details']);

    $sql = "INSERT INTO questions (question, question_deets) VALUES ('$question', '$details')";

    if($conn -> query($sql) == TRUE){
        $error = "Successfully uploaded question!";
        $_SESSION["error"] = $error;
        header("Location: addQuestion.php");
        exit();
    }

    $_SESSION["error"] = $error;
    header("Location: addQuestion.php");
?>