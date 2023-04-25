<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post a Question</title>
    <link rel="icon" href="pics/logo_white.png">
    <link href="styles/addQuestionDesign.css" type="text/css" rel="stylesheet"/>
    <link href="styles/general.css" type="text/css" rel="stylesheet">
</head>

<body class="bg-addQuestion">
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
    <div id="bg-question">
        <h2>Post a Question</h2>
        <div>
            <input type=text id="title" placeholder = "Title">
        </div>
        <br>
        <div>
            <input type=text id="add" placeholder = "Add your question here.">
        </div>
        <br>
        <hr>
        <button type="submit" id="post">POST</button>
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
    <script src="scripts/genJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
