<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    if(isset($_POST['title']) && isset($_POST['details']) && isset($_POST['username'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }
    }

    $title = $_POST['title'];
    $details = $_POST['details'];
    $users_involved = $_POST['username'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO reports (title, users_involved, details, user_id) VALUES ('$title','$users_involved','$details', '$user_id')";

    if($conn -> query($sql) == TRUE){
        $error = "Successfully submitted the report!";
        $_SESSION["error"] = $error;
        header("Location: displayQuestion.php");
        exit();
    }
?>