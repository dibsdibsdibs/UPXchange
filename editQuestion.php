<?php
    include 'session.php';
    include 'accessQuestion.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Question</title>
    <link rel="icon" href="pics/logo_white.png">
    <link href="styles/editQuestionDesign.css" type="text/css" rel="stylesheet"/>
    <link href="styles/general.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body class="body-plain">
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
    <div id="error-display">
        <div id="error">
            <?php
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];
                    echo "<span>$error</span>";
                }
            ?>
        </div>
    </div>
    <form id="editQuestion" action="updateQuestion.php" method="post">
    <div id="bg-question">
        <h2>Edit Question</h2>
        <textarea id="question" name="question" maxlength="150" placeholder= "Add your question here." required><?php echo $_SESSION['question']; ?></textarea>
        <textarea id="details" name="details" maxlength="500" placeholder= "Add your question details here."><?php echo $_SESSION['details']; ?></textarea>
        <hr>
        <div id="tags">
            <div class="tag-container">
                <ul><input id="listtags" type="text" spell check="false"></ul>
            </div>
            <div class="tag-count">
                <p><span> </span> tags remaining</p>
            </div>
        </div>
    </div>
    <button type="submit" id="post">UPDATE</button>
    </form>
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
    <script type="text/javascript">
        let tags=<?= $_SESSION['tags']; ?>
    </script>
    <script src="scripts/editQuestionJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
