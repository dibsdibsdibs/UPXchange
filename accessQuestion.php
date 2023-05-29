<?php 
    include 'dbconnector.php';

    $_SESSION['question_id'] = '7';
    $id = $_SESSION['question_id'];
    $user_id = $_SESSION['user_id'];

    $question = $conn -> query("SELECT question, details FROM questions WHERE question_id = '$id'");
    while ($row = $question -> fetch_assoc()) 
    {
        $_SESSION['question'] = $row['question'];
        $_SESSION['details'] = $row['details'];
    }

    $tags = $conn -> query("SELECT tags FROM tags WHERE tag_id = '$id'");
    while ($row = $tags -> fetch_assoc()) 
    {
        $_SESSION['tags'] = $row['tags'];
    }
?>