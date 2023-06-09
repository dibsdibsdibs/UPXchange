<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="icon" href="pics/logo_white.png">
    <link href="styles/signupDesign.css" type="text/css" rel="stylesheet"/>
    <link href="styles/general.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="body-gradient">
    <!--Header bar section-->
    <div class="top-header">
        <div id = "header-left">
            <img src = "pics/logo_white.png" height="65" style="margin: 0px 20px 0px 0px;">
            <h1 style="font-size:35px;">UP Xchange</h1>
        </div>
        <div id = "header-right">
            <a><img src = "pics/magnifying glass.png" height="35" style="margin: 0px 20px 0px 0px;"></a>
            <a><img src = "pics/plus.png" height="35" style="margin: 0px 20px 0px 0px;"></a>
            <a><img src = "pics/categories.png" height="35"style="margin: 0px 20px 0px 0px;"></a>
            <a><img src = "pics/bell.png" height="35"style="margin: 0px 20px 0px 0px;"></a>
            <a><img src = "pics/user.png" height="35"style="margin: 0px 20px 0px 0px;"></a>
        </div>
    </div>
    <!-- Sign Up section-->
    <div class="container">
        <div id="signup">   
            <br>
            <h1 style="font-size:40px;">SIGN UP</h1>
            <form action="register.php" method="post">
                <div id="error">
                <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                ?>
                </div>
            <div id="signup-content">
                <div>
                    <h3>UPmail</h3>
                    <input type=text id="upmail" name="upmail" placeholder = "Type your UPmail" pattern=".+@up\.edu\.ph" title="example@up.edu.ph" maxlength="20">
                    <h3>Password</h3>
                    <div class = "password-container">
                        <input type=password id = "password" name="password" placeholder = "Type your password" maxlength="20" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[~`!@#$%\^&*()\-_=+[\]{};:\x27.,\x22\\|/?><]).{8,}" title="Must contain at least one number, one symbol, one uppercase and lowercase letter, and at least 8 or more characters" >
                        <i class="fa-solid fa-eye" id="eye"></i>
                    </div>
                    <h3 style="font-size:22px;">Confirm Password</h3>
                    <div class = "password-container">
                        <input type=password id = "repassword" name="repassword" placeholder = "Confirm your password" maxlength="20">
                        <i class="fa-solid fa-eye" id="reeye"></i>
                    </div>
                </div>
                <br><br>
                <button type="submit" id="create" style="font-size:18px;">CREATE ACCOUNT</button>
                <br>
                <div id="login-option">
                    <p style="font-size:18px;">Already have an account?</p>
                </div>
                <button type="submit" id="login" formaction="login.php" style="font-size:20px;">LOG IN</button>
            </div>
        </div>
    </div>
    <!-- Footer bar section -->
    <div class="bottom-footer">
        <div id="footer-left">
            <img src = "pics/logo_white.png" height="55">
            <h1 style="font-size:30px;">UP Xchange</h1>
        </div>        <div id="footer-right">
            <p>© 2023 UP Xchange. Up Xchange is a trademark brand owned by UP Xchange. A Philippine-registered company. All other trademarks are owned by their respective owners.</p>
        </div>
    </div>
    <script src="scripts/genJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
