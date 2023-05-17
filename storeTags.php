<?php
    include 'dbconnector.php';
    session_start();

    if(isset($_POST['listtags'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }
    }

    $tags = $_POST['listtags'];

    $sql = "INSERT INTO taglist (tags) VALUES ('$tags')";

    if($conn -> query($sql) == TRUE){
        exit();
    }
?>