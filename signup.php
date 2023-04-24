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
</head>

<body class="bg">
    <!--Header bar section-->
    <div class="top-header">
        <div id = "header-left">
            <img src = "pics/logo_white.png" height="50">
            <h1>UP Xchange</h1>
        </div>
        <div id = "header-right">
            <a><img src = "pics/magnifying glass.png" height="25"></a>
            <a><img src = "pics/plus.png" height="25"></a>
            <a><img src = "pics/categories.png" height="25"></a>
            <a><img src = "pics/bell.png" height="25"></a>
            <a><img src = "pics/user.png" height="25"></a>
        </div>
    </div>
    <!-- Sign Up section-->
    <div id="signup">   
        <br>
        <h1>SIGN UP</h1>
        <div id="signup-content">
            <div>
                <h3>Email</h3>
                <input type=text placeholder = "Type your email">
                <h3>Password</h3>
                <input type=text placeholder = "Type your password">
                <h3>Confirm Password</h3>
                <input type=text placeholder = "Confirm your password">
            </div>
            <br><br>
            <button type="submit" id="create">CREATE ACCOUNT</button>
            <br>
            <div>
                <p>Already have an account?</p>
            </div>
            <button type="submit" id="login">LOGIN</button>
        </div>
    </div>
    <!-- Footer bar section -->
    <div class="bottom-footer">
        <div id="footer-left">
            <img src = "pics/logo_white.png" height="50">
            <h1>UP Xchange</h1>
        </div>
        <div id="footer-right">
            <p>© 2023 UP Xchange. Up Xchange is a trademark brand owned by UP Xchange. A Philippine-registered company. All other trademarks are owned by their respective owners.</p>
        </div>
    </div>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
