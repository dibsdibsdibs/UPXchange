<?php
    include 'dbconnector.php';
    
    session_start();

    $id = '1';

    $result = $conn -> query("SELECT question, details FROM questions WHERE question_id = '$id'");

    while ($row = $result -> fetch_assoc()) 
    {
        $_SESSION['question'] = $row['question'];
        $_SESSION['details'] = $row['details'];
    }

    header("Location: displayQuestion.php");
?>