<?php
    include 'dbconnector.php';
    session_start();

    $question_id = $_GET['question_id'];
    $_SESSION['question_id'] = $question_id;
?>