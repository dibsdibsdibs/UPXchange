<?php
    session_start();
    $error = isset($_SESSION["error"]) ? $_SESSION["error"] : "";
    $fields = ['firstName', 'lastName', 'course', 'membership', 'year'];
    $optionalFields = ['about'];
    $values = [];
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

    header("Location: profile_saved.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="icon" href="pics\logo_white.png">
    <link href="styles\editProfileStyle.css" type="text/css" rel="stylesheet">
</head>

<body class="bg">
    <div class="top-header">
        <div class = "header-left">
            <img src = "pics\logo_white.png" height="75">
            <h1>UP Xchange</h1>
        </div>
        <div class = "header-right">
            <a><img src = "pics\magnifying glass.png" height="25"></a>
            <a><img src = "pics\plus.png" height="25"></a>
            <a><img src = "pics\categories.png" height="25"></a>
            <a><img src = "pics\bell.png" height="25"></a>
            <a><img src = "pics\user 1.png" height="25"></a>
        </div>
    </div>
    <div class="center">
        <h2 style="font-size:40px;">EDIT PROFILE</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <form action="upload.php" method="post" enctype="multipart/form-data">
            <h4 style="margin-right: 190px;margin-bottom: 10px;">First Name:</h4>
            <div class="row mt-5">
                <div class="wrapper">
                    <input type="text" maxlength="30" class="form-control" placeholder="First Name" name="firstName" action = "
                    <?php     if(!empty($firstName) && !ctype_alpha($firstName)) {
            return "You typed $firstName: please use only alphanumeric characters";
    } 
                ?>">
                </div>
            </div>
            <h4 style="margin-right: 190px;margin-bottom: 10px;">Last Name:</h4>
            <div class="row mt-3">
                <div class="wrapper"><input type="text" maxlength = "30" class="form-control" placeholder="Last Name" action = "
                    <?php     if(!empty($firstName) && !ctype_alpha($firstName)) {
            return "You typed $firstName: please use only alphanumeric characters";
    } 
                ?>"></div>
            </div>
            <h4 style="margin-right: 220px;margin-bottom: 10px;">Course:</h4>
            <div class="row mt-3">
                <div class="wrapper">                    
                    <select class = "form-control" name="membership" id="membership">
                    <option value="select">--select--</option>
                    <option value="BA in Communication and Media Studies">BA in Communication and Media Studies</option>
                    <option value="BA Community Development">BA Community Development</option>
                    <option value="BA History">BA History</option>
                    <option value="BA Sociology">BA Sociology</option>
                    <option value="BA in Literature">BA in Literature</option>
                    <option value="BA in Psychology">BA in Psychology</option>
                    <option value="BS Biology">BS Biology</option>
                    <option value="BS Accountancy">BS Accountancy</option>
                    <option value="BS Applied Mathematics">BS Applied Mathematics</option>
                    <option value="BS Business Administration (Marketing)">BS Business Administration (Marketing)</option>
                    <option value="BS Chemical Engineering">BS Chemical Engineering</option>
                    <option value="BS Chemistry">BS Chemistry</option>
                    <option value="BS Computer Science">BS Computer Science</option>
                    <option value="BS Economics
">BS Economics</option>
                    <option value="BS Fisheries">BS Fisheries</option>
                    <option value="BS Food Technology">BS Food Technology</option>
                    <option value="BS Management">BS Management</option>
                    <option value="BS Public Health">BS Public Health</option>
                    <option value="BS Statistics">BS Statistics</option>
                    </select>
                </div>
            </div>
            <h4 style="margin-right: 120px;margin-bottom: 10px;">Student or Faculty?</h4>
            <div class="row mt-3">
                <div class="wrapper">
                    <select class = "form-control" name="membership" id="membership">
                    <option value="select">--select--</option>
                    <option value="Faculty">Faculty</option>
                    <option value="Student">Student</option>
                    </select>
                </div>
            </div>
            <h4 style="margin-right: 195px;margin-bottom: 10px;">Year Level:</h4>
            <div class="row mt-3">
                <div class="wrapper">
                    <select class = "form-control" name="membership" id="membership" value="Year">
                        <option value="select">--select--</option>
                        <option value="1st">First Year</option>
                        <option value="2nd">Second Year</option>
                        <option value="3rd">Third Year</option>
                        <option value="4th">Fourth Year</option>
                        <option value="Nth">nth Year</option>
                    </select>
                </div>
            </div>
            <h4 style="margin-right: 230px;margin-bottom: 10px;">About:</h4>
            <div class="row mt-3">
                <div class="wrapper">
                    <input type="text" maxlength = "150" class="form-control-about" placeholder="Tell us about yourself...">
                </div>
            </div>  
            <div class="row mt-3">
                <div class="wrapper">
                    <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                </div>
            </div>      
    </div>  

</html>

<?php
    unset($_SESSION["error"]);
?>