<?php
    include 'dbconnector.php';

    if(isset($_POST['listtags'])){
        function validate($data){
            $data = stripslashes($data);
            return $data;
        }
    }

    $tags = $_POST['listtags'];
    $tag_id = $_SESSION['question_id'];
    $_SESSION['tags'] = $tags;

    $sql = "UPDATE tags SET tags = '$tags' WHERE tag_id = '$tag_id'";

    if($conn -> query($sql) == TRUE){
        exit();
    }
?>