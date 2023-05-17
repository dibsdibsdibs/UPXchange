<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    if(isset($_POST['question']) && isset($_POST['details']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }
    }

    $question = $_POST['question'];
    $details = $_POST['details'];

    $sql = "INSERT INTO questions (title, details) VALUES ('$question', '$details')";

    if($conn -> query($sql) == TRUE){
        $error = "Successfully uploaded question!";
        $_SESSION["error"] = $error;
        header("Location: addQuestion.php");
        exit();
    }

    $_SESSION["error"] = $error;
    header("Location: addQuestion.php");
?>