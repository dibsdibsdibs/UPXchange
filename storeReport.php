<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    if(isset($_POST['title']) && isset($_POST['details'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }
    }

    $title = $_POST['title'];
    $details = $_POST['details'];

    $sql = "INSERT INTO reports (title, details) VALUES ('$title', '$details')";


    if($conn -> query($sql) == TRUE){
        $error = "Successfully submitted the report!";
        $_SESSION["error"] = $error;
        header("Location: addReport.php");
        exit();
    }

    $_SESSION["error"] = $error;
    header("Location: addReport.php");
?>