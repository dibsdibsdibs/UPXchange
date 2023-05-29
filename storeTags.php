<?php
    include 'dbconnector.php';

    if(isset($_POST['listtags'])){
        function validate($data){
            $data = stripslashes($data);
            return $data;
        }
    }

    $tags = $_POST['listtags'];

    $sql = "INSERT INTO tags (tags) VALUES ('$tags')";

    if($conn -> query($sql) == TRUE){
        exit();
    }
?>