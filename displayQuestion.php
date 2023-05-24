<?php
    include 'dbconnector.php';
    
    session_start();

    $id = '3';

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
        <div class="question-tags">
            <?php
                $tags = $_SESSION['tags'];
                echo json_encode($tags);
            ?>
        </div>
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
    <script src="scripts/displayQuestionJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
