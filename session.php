<?php
    session_start();
    if(!$_SESSION['user_id']){  
        $error = "Please log in!";
        $_SESSION['error'] = $error; 
        header("Location: login.php");
    }

    if (isset($_SESSION['lastactivity']) && (time() - $_SESSION['lastactivity'] > 900)) {
        header("Location: logout.php");
        exit();
    }
    $_SESSION['lastactivity'] = time();  
?>