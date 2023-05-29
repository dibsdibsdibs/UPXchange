<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/general.css" type="text/css" rel="stylesheet">
    <link href="styles/login.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" >
    <link href="pics/logo_white.png" rel="icon">
    <title>Login</title>
</head>
<body class="bg">
    <?php include "header.php" ; ?>

    <div class="container">
        <div id="login">   
            <br>
            <h1 style="font-size:40px;">LOG IN</h1>
            <form action="checkUser.php" method="post">
                <div id="error">
                <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                ?>
                </div>
            <div id="login-content">
                <div>
                    <h3>UPmail</h3>
                    <input type=text id="upmail" name="upmail" placeholder = "Type your UPmail" pattern=".+@up\.edu\.ph" title="example@up.edu.ph" maxlength="20">
                    <h3>Password</h3>
                    <div class = "password-container">
                        <input type=password id = "password" name="password" placeholder = "Type your password" maxlength="20" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[~`!@#$%\^&*()\-_=+[\]{};:\x27.,\x22\\|/?><]).{8,}" title="Must contain at least one number, one symbol, one uppercase and lowercase letter, and at least 8 or more characters" >
                        <i class="fa-solid fa-eye" id="eye"></i>
                    </div>
                </div>
                <br>
                <button type="submit" id="create" style="font-size:18px;">LOG IN</button>
                <br>
                <div id="signup-option">
                    <p style="font-size:18px;">Don't have an account?</p>
                </div>
                <button type="submit" id="login" formaction="signup.php" style="font-size:20px;">SIGN UP</button>
            </div>
        </div>
    </div>

    <?php include "footer.php" ; ?>
    <script src="scripts/genJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>