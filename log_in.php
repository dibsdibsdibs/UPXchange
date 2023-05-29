<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    if(isset($_POST['upmail']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }

        $upmail = validate($_POST['upmail']);
        $password = validate($_POST['password']);

        $error = '';

        if(empty($upmail) || empty($password)){
            $error = 'Please fill up the necessary fields';
        } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE upmail = ?");
            $stmt->bind_param("s", $upmail);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows === 1){
                $row = $result->fetch_assoc();
                $hashedPassword = $row['password'];

                if(password_verify($password, $hashedPassword)){
                    $_SESSION['user_id'] = $row['user_id'];
                    header("Location:home.php");
                    exit();
                }else {
                    $error = 'Login failed. Incorrect password.';
                }
            } else {
                $error = 'Oops! The email you provided does not match any existing accounts. Sign up today and join the UPxchange community!';
            }
        }
    }


    if(!empty($_GET['logout'])){
        echo "<p align='center'>You have logged out!</p>";
       }

    if(!empty($_GET['signup'])){
        echo "<p align='center'>You have successfully signed up!</p>";
       }
       
    if(!empty($_GET['session'])){
        echo "<p align='center'>Your session has expired due to inactivity.</p>";
       }


    $_SESSION["error"] = $error;
    header("Location: login.php");
    exit();
?>