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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body class="bg-addQuestion">
    <!--Header bar section-->
    <?php include "header.php" ; ?>
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
    <form id="storeQuestion" action="storeQuestion.php" method="post">
    <div id="bg-question">
        <h2>Post a Question</h2>
        <textarea id="question" name="question" maxlength="150" placeholder= "Add your question here." required></textarea>
        <textarea id="details" name="details" maxlength="500" placeholder= "Add your question details here."></textarea>
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
    <button type="submit" id="post">POST</button>
    </form>
    <!-- Footer bar section -->
    <?php include "footer.php" ; ?>
    <script src="scripts/addQuestionJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
