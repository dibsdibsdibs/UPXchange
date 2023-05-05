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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
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
        <textarea id="title" placeholder= "Title"></textarea>
        <textarea id="question" placeholder= "Add your question here."></textarea>
        <hr>
        <div id="tags">
            <div class="tag-container">
                <ul><input type="text" spell check="false"></ul>
            </div>
            <div class="tag-count">
                <p><span> </span> tags remaining</p>
            </div>
        </div>
    </div>
    <button type="submit" id="post">POST</button>
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
    <script src="scripts/addQuestionJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
