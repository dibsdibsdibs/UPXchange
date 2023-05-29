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
        <h2>EDIT PROFILE</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="wrapper">Profile Picture:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <br>    
                <br>
                <input type="submit" value="Upload Image" name="submit">
            </div>
            <div class="row mt-5">
                <div class="wrapper">
                    <input type="text" maxlength="30" class="form-control" placeholder="First Name" name="firstName" action = "
                    <?php     if(!empty($firstName) && !ctype_alpha($firstName)) {
            return "You typed $firstName: please use only alphanumeric characters";
    } 
                ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="wrapper"><input type="text" maxlength = "30" class="form-control" placeholder="Last Name" action = "
                    <?php     if(!empty($firstName) && !ctype_alpha($firstName)) {
            return "You typed $firstName: please use only alphanumeric characters";
    } 
                ?>"></div>
            </div>
            <div class="row mt-3">
                <div class="wrapper"><input type="text" maxlength = "30" class="form-control" placeholder="Course" action = "
                    <?php     if(!empty($firstName) && !ctype_alpha($firstName)) {
            return "You typed $firstName: please use only alphanumeric characters";
    } 
                ?>"></div>
            </div>
            <div class="row mt-3">
                <div class="wrapper">
                    <select class = "form-control" name="membership" id="membership">
                    <option value="Faculty">Faculty</option>
                    <option value="Student">Student</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="wrapper">
                    <select class = "form-control" name="membership" id="membership" value="Year">
                        <option value="1st">First Year</option>
                        <option value="2nd">Second Year</option>
                        <option value="3rd">Third Year</option>
                        <option value="4th">Fourth Year</option>
                        <option value="Nth">nth Year</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="wrapper">
                    <input type="text" maxlength = "150" class="form-control-about" placeholder="About">
                </div>
            </div>     
    </div>  
    <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
</html>

<?php
    unset($_SESSION["error"]);
?>