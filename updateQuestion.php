<?php
    include 'dbconnector.php';

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
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO questions (question, details, user_id) VALUES ('$question', '$details', '$user_id')";

    if($conn -> query($sql) == TRUE){
        $error = "Successfully uploaded question!";
        $_SESSION["error"] = $error;
        header("Location: addQuestion.php");
        exit();
    }

    $_SESSION["error"] = $error;
    header("Location: addQuestion.php");
?>