<?php include 'retrieveQuestion.php' ?>

<!DOCTYPE html>
<html>
<head>
    <title>View a Question</title>
    <link rel="icon" href="pics/logo_white.png">
    <link href="styles/displayQuestion.css" type="text/css" rel="stylesheet"/>
    <link href="styles/general.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body class="bgDisplay">
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
    <div id="bg-report">
        <form id="storeReport" action="storeReport.php" method="post">
        <div>
            <div id="report-header">
                <h2>Add a Report</h2>
                <img src="pics/close.png" height="20" onclick="exitReport()">
            </div>
            <textarea id="title" name="title" maxlength="150" placeholder= "Add the main concern here."></textarea>
            <textarea id="username" name="username" maxlength="150" placeholder= "Add the username/s you want to report."></textarea>
            <textarea id="details" name="details" maxlength="500" placeholder= "Add the details of your concern here."></textarea>
        </div>
        <button type="submit" id="report">REPORT</button>
        </form>
    </div>
    <div id="bg-question">
        <div id="question-title">
            <?php
                $question = $_SESSION['question'];
                echo "<span>$question</span>";
            ?>
        </div>
        <div id="question-time">
            <?php
                $post_date = $_SESSION['post_date'];
                $post_time = $_SESSION['post_time'];
                echo "<span>$post_date $post_time</p>";
            ?>
        </div>
        <br>
        <div id="question-details">
            <?php
                $details = $_SESSION['details'];
                echo "<span>$details</span>";
            ?>
        </div>
        <br>
        <div class="question-tags"><ul id="question-tags"></ul></div>
        <div id="options">
            <div class="question-options"  onclick="showComments()">
                <img src = "pics/comment.png" height="15">
                <p>Comments</p>
            </div>
            <div class="question-options" onclick="bookmarkQuestion()">
                <img src = "pics/bookmark.png" id='bookmark-icon' height="15">
                <p id='bookmark-label'>Bookmark</p>
                <script type="text/javascript"> 
                    let bookmarked= <?php echo $_SESSION['bookmarked']; ?>
                </script>
            </div>
            <div class="question-options" onclick="submitReport()">
                <img src = "pics/report.png" height="15">
                <p>Report</p>
            </div>
        </div>
        <div class="replies" id="showreplies">
            <form id="storeReply" action="storeReply.php" method="post">
            <div id="add-reply">
                <textarea id="compose-reply" name="reply" maxlength="500" placeholder= "Add your reply here."></textarea>
            </div>
            <button type="submit" id="post">POST</button>
            </form>
            <p id="separate"></p>
            <div id="answer-count">
                <?php
                    $replycount = $_SESSION['replycount'];
                    echo "<span>$replycount ANSWERS</p>";
                ?>
            </div>
            <div>
                <?php include 'displayReplies.php' ?>
            </div>
        </div>
    </div>
    <!-- <div class="bottom-footer">
        <div id="footer-left">
            <img src = "pics/logo_white.png" height="50">
            <h1>UP Xchange</h1>
        </div>
        <div id="footer-right">
            <p>© 2023 UP Xchange. Up Xchange is a trademark brand owned by UP Xchange. A Philippine-registered company. All other trademarks are owned by their respective owners.</p>
        </div>
    </div> -->
    <script type="text/javascript">
        let tags=<?= $_SESSION['tags']?>
    </script>
    <script src="scripts/displayQuestionJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
