<?php
    include 'dbconnector.php';

    $user_id = $_SESSION['user_id'];

    $question = $conn -> query("SELECT firstName, lastName, course, membership, yearLevel, about, pp FROM users WHERE user_id = '$user_id'");

    while ($row = $question -> fetch_assoc()) 
    {
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];
        $_SESSION['course'] = $row['course'];
        $_SESSION['membership'] = $row['membership'];
        $_SESSION['yearLevel'] = $row['yearLevel'];
        $_SESSION['about'] = $row['about'];
        $_SESSION['pp'] = $row['pp'];

        $firstName = $_SESSION['firstName'];
        $lastName = $_SESSION['lastName'];
        $course = $_SESSION['course'];
        $membership = $_SESSION['membership'];
        $yearLevel = $_SESSION['yearLevel'];
        $about = $_SESSION['about'];
        $pp = $_SESSION['pp'];
        }
?>