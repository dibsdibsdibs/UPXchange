<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['course']) && isset($_POST['membership']) && isset($_POST['yearLevel']) && isset($_POST['about'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }
    }

    $firstName = validate($_POST['firstName']);
    $lastName = validate($_POST['lastName']);
    $course = validate($_POST['course']);
    $membership = validate($_POST['membership']);
    $yearLevel = validate($_POST['yearLevel']);
    $about = validate($_POST['about']);

    $error = '';

    switch(true){
        case empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["repassword"]) || empty($_POST["repassword"]) || empty($_POST["repassword"]):
            $error = 'Please fill up the necessary fields';
            break;

        case $password != $repassword:
            $error = "Passwords don't match!";
            break;

        case $password == $repassword:
             $uppercase = preg_match('@[A-Z]@', $password);
             $lowercase = preg_match('@[a-z]@', $password);
             $number    = preg_match('@[0-9]@', $password);
             $specialChars = preg_match('@[^\w]@', $password);
        
            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $error = 'Password should be at least 8 characters in length and should include at least: 1 uppercase letter, 1 number, and 1 special character.';
                break;
            }
        
            // Hash the password using password_hash()
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("SELECT * FROM users WHERE upmail = ?");
            $stmt->bind_param("s", $upmail);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows >= 1){
                $error = "Email is already used!";
            } else {
                $stmt = $conn->prepare("INSERT INTO users (upmail, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $upmail, $hashedPassword);
                if ($stmt->execute()) {
                    $error = "Log in to your new account.";
                    $_SESSION["error"] = $error;
                    header("Location: login.php");
                    exit();
                } 
                +else {
                    $error = "Registration failed. Please try again.";
                }
            }
    }
    $_SESSION["error"] = $error;
    header("Location: signup.php");
    exit();
?>
