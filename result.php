<?php
    include 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
    <link rel="icon" href="pics/logo_white.png">
    <link href="styles/general.css" type="text/css" rel="stylesheet">
    <link href="styles/indexDesign.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body class="body-plain">
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
    <div id="display-question">
        <?php include "getResult.php"?>
    </div>
    <?php include "footer.php" ; ?>
    <script src="scripts/indexJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>
