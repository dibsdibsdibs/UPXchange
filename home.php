<?php
    include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Home Page</title>
      <link href="pics/logo_white.png" rel="icon">
      <link href="styles/general.css" type="text/css" rel="stylesheet">
      <link href="styles/home2.css" type="text/css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" >
      <meta charset="utf-8">
   </head>
   <body class="body-home">
      <?php include "headerHome.php"  ; ?>
        <div id="top">
            <div class="wrapper">
                <h2>UP XChange</h2>
                <h3>Find the best answer to your question.</h3>
                <div class="search-box">
                    <form action="search.php" method = "post" class="search-bar">
                        <input type="text" name = "search" placeholder="Searching something?">
                        <button type="submit" name="submit"><img src = "pics\magnifying glass.png"></button>
                    </form>
                </div>
            </div>
        </div>

        <div id="middle">
            <div class="wrapper">
                <article style="background-image: url('pics/image 5.png');">
                    <div class="overlay">
                        <h4>Latest update<h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </article>
                <article style="background-image: url('pics/Questions1.jpg');">
                    <div class="overlay">
                        <h4>Featured Question</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </article>
                <div class="clear"></div>
            </div>
        </div>

        <div id="bottom">
            <div class="wrapper">
                <h2>What is <span class="grad">UP XChange?</span></h2>
                <div class="row">
                    <div class="column">
                        <img class="img1" src="pics/questions (1) 1.png" height="200">
                        <img class="img2" src="pics/Vector 5.png" height="200">
                    </div>
                    <div class="column">
                        <br>
                        <p>Platform building the definitive collection of questions and answers.</p>
                        <br>
                        <p>Private collaboration & knowledge sharing SAAS platform for students.</p>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>

<?php
    unset($_SESSION["error"]);
?>