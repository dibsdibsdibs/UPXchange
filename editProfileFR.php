<?php
    include 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="icon" href="pics\logo_white.png">
    <link href="styles\editProfileStyle.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <form action="edit.php" method="post">
                <div id="error">
                <?php
                    if (isset($_SESSION["error"])) {
                    $error = $_SESSION["error"];
                    echo "<span>$error</span>";
                    }
                ?>
                </div>
                <br>
            <h4 style="margin-right: 190px;margin-bottom: 10px; margin-top: 0px;">First Name:</h4>
            <div class="row mt-5">
                <div class="wrapper">
                    <input type="text" maxlength="30" class="form-control" placeholder="First Name" name="firstName">
                </div>
            </div>
            <h4 style="margin-right: 190px;margin-bottom: 10px;">Last Name:</h4>
            <div class="row mt-3">
                <div class="wrapper"><input type="text" maxlength = "30" class="form-control" placeholder="Last Name"  name="lastName">
                </div>
            </div>
            <h4 style="margin-right: 220px;margin-bottom: 10px;">Course:</h4>
            <div class="row mt-3">
                <div class="wrapper">                    
                    <select class = "form-control" name="course" id="membership">
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
                    <select class = "form-control" name="yearLevel" id="membership" value="Year">
                        <option value="select">--select--</option>
                        <option value="I">First Year</option>
                        <option value="II">Second Year</option>
                        <option value="III">Third Year</option>
                        <option value="IV">Fourth Year</option>
                        <option value="Nth">nth Year</option>
                    </select>
                </div>
            </div>
            <h4 style="margin-right: 230px;margin-bottom: 10px;">About:</h4>
            <div class="row mt-3">
                <div class="wrapper">
                    <input type="text" maxlength = "150"  name="about" class="form-control-about" placeholder="Tell us about yourself...">
                </div>
            </div>
            <h4 style="margin-right: 160px;margin-bottom: 10px;">Profile Picture:</h4>
            <div class="row mt-3">
                <div class="wrapper">
                    <input type="file" style="margin-left: 20px; " name="pp" id = "image" accept=".jpg, .jpeg, .png">
                    
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