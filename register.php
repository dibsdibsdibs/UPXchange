<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    if(isset($_POST['upmail']) && isset($_POST['repassword']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }
    }

    $upmail = validate($_POST['upmail']);
    $password = validate($_POST['password']);
    $repassword = validate($_POST['repassword']);
    $pp = "profile.png";
    $firstName = "";
    $lastName = "";
    $course = "Course";
    $membership = "Student/Faculty";
    $yearLevel = "Year Level";
    $about = "Who are you?";


    $error = '';

    switch(true){
        case empty($_POST["upmail"]) || empty($_POST["password"]) || empty($_POST["repassword"]):
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
                $stmt = $conn->prepare("INSERT INTO users (upmail, password, firstName, lastName, course, membership, yearLevel, about, pp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssss", $upmail, $hashedPassword, $firstName, $lastName, $course, $membership, $yearLevel, $about, $pp);
                if ($stmt->execute()) {
                    $error = "Log in to your new account.";
                    $_SESSION["error"] = $error;
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "Registration failed. Please try again.";
                }
            }
    }
    $_SESSION["error"] = $error;
    header("Location: signup.php");
    exit();
?>
