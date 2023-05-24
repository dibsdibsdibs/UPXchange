<?php
    include 'dbconnector.php';
    
    session_start();

    $id = '3';
    $_SESSION['question_id'] = $id;

    $question = $conn -> query("SELECT question, details, DATE_FORMAT(time_posted, '%M %d, %Y') AS post_date, DATE_FORMAT(time_posted, '%h:%i %p') AS post_time FROM questions WHERE question_id = '$id'");
    while ($row = $question -> fetch_assoc()) 
    {
        $_SESSION['question'] = $row['question'];
        $_SESSION['details'] = $row['details'];
        $_SESSION['post_date'] = $row['post_date'];
        $_SESSION['post_time'] = $row['post_time'];
    }

    $tags = $conn -> query("SELECT tags FROM tags WHERE tag_id = '$id'");
    while ($row = $tags -> fetch_assoc()) 
    {
        $_SESSION['tags'] = $row['tags'];
    }

    $replycount = $conn -> query("SELECT reply_id FROM replies WHERE question_id = '$id'");
    $_SESSION['replycount'] = mysqli_num_rows($replycount);
?>

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
        <br>
        <div class="replies">
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
                <?php include 'displayReplies.php'; ?>
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
    <script type="text/javascript"> let tags=<?= $_SESSION['tags']?></script>
    <script src="scripts/displayQuestionJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
