<?php
    session_start();
    $error = isset($_SESSION["error"]) ? $_SESSION["error"] : "";

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="icon" href="C:\xampp\htdocs\UPXchange\pics\logo_white.png">
    <link href="C:\xampp\htdocs\UPXchange\styles\editProfileStyle.css" type="text/css" rel="stylesheet">
</head>

<body class="bg">
    <div class="top-header">
        <div class = "header-left">
            <img src = "C:\xampp\htdocs\UPXchange\pics\logo_white.png" height="75">
            <h1>UP Xchange</h1>
        </div>
        <div class = "header-right">
            <a><img src = "C:\xampp\htdocs\UPXchange\pics\magnifying glass.png" height="25"></a>
            <a><img src = "C:\xampp\htdocs\UPXchange\pics\plus.png" height="25"></a>
            <a><img src = "C:\xampp\htdocs\UPXchange\pics\categories.png" height="25"></a>
            <a><img src = "C:\xampp\htdocs\UPXchange\pics\bell.png" height="25"></a>
            <a><img src = "C:\xampp\htdocs\UPXchange\pics\user 1.png" height="25"></a>
        </div>
    </div>
    <div class="center">
        <h2 class="span">EDIT PROFILE</h2>
        <div class="row mt-5">
            <div class="wrapper"><input type="text" maxlength = "30" class="form-control" placeholder="First Name"></div>
        </div>
        <div class="row mt-3">
            <div class="wrapper"><input type="text" maxlength = "30" class="form-control" placeholder="Last Name"></div>
        </div>
        <div class="row mt-3">
            <div class="wrapper"><input type="text" maxlength = "30" class="form-control" placeholder="Course"></div>
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
                <option value="Nth">Nth Year</option>
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