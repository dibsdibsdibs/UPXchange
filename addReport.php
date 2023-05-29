<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit a Report</title>
    <link rel="icon" href="pics/logo_white.png">
    <link href="styles/addReportDesign.css" type="text/css" rel="stylesheet"/>
    <link href="styles/general.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body class="bg-addReport">
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
    <form id="storeReport" action="storeReport.php" method="post">
    <div id="bg-report">
        <h2>Add a Report</h2>
        <textarea id="title" name="title" maxlength="150" placeholder= "Add the main concern here." required></textarea>
        <textarea id="username" name="username" maxlength="150" placeholder= "Add the username/s you want to report."></textarea>
        <textarea id="details" name="details" maxlength="500" placeholder= "Add the details of your concern here."></textarea>
    </div>
    <button type="submit" id="post">REPORT</button>
    </form>
    <!-- Footer bar section -->
    <!-- <div class="bottom-footer">
        <div id="footer-left">
            <img src = "pics/logo_white.png" height="50">
            <h1>UP Xchange</h1>
        </div>
        <div id="footer-right">
            <p>© 2023 UP Xchange. Up Xchange is a trademark brand owned by UP Xchange. A Philippine-registered company. All other trademarks are owned by their respective owners.</p>
        </div>
    </div> -->
    <script src="scripts/addQuestionJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
