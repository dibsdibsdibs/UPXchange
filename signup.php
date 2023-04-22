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
        <div class = "header-left">
            <img src = "pics/logo_white.png" height="50">
            <h1>UP Xchange</h1>
        </div>
        <div class = "header-right">
            <a><img src = "pics/magnifying glass.png" height="25"></a>
            <a><img src = "pics/plus.png" height="25"></a>
            <a><img src = "pics/categories.png" height="25"></a>
            <a><img src = "pics/bell.png" height="25"></a>
            <a><img src = "pics/user.png" height="25"></a>
        </div>
    </div>
    <div id="signup">   
        <h1>SIGN UP</h1>
        <div id="signup-content">
            <div>
                <h2>Email</h2>
                <input type=text placeholder = "Type your email">
            </div>
            <div>
                <h2>Password</h2>
                <input type=text placeholder = "Type your password">
            </div>
            <div>
                <h2>Confirm Password</h2>
                <input type=text placeholder = "Confirm your password">
            </div>
        </div>
    </div>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
