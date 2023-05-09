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
    <div class="top-header">
        <div class="header-left">
            <a href="login.php">
            <img src="pics\logo_white.png" height="50">
            <h1>UP XChange</h1>
            </a>
        </div>
        <div class="header-right">
            <a><img src="pics\magnifying glass.png" height="25"></a>
            <a><img src="pics\plus.png" height="25"></a>
            <a><img src="pics\categories.png" height="25"></a>
            <a><img src="pics\bell.png" height="25"></a>
            <a><img src="pics\user.png" height="25"></a>
        </div>
    </div>
    <div class="login">
        <h1>LOGIN</h1>
        <form action="">
            <div class="mainContainer">
                <div class="email-input">
                    <label for="email">UP Email</label>
                    <br>
                    <img src="pics\user 1.png">
                    <input type="email" placeholder="Enter your UP email" name="email" required>
                </div>
                <br><br>
                <div class="password-input">
                    <label for="password">Password</label>
                    <br>
                    <img src="pics\lock 1.png">
                    <input type="password" placeholder="Enter your password" name="password" required>
                </div>
                <div class="subContainer">
                    <p class="forgotpassword"><a href="#">Forgot Password?</a></p>
                </div>
                <button type="submit">LOGIN</button>
                <p class="register">Don't have an account?<br><a href="#">SIGN UP</a></p>
            </div>
        </form>
    </div>
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