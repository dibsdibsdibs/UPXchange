<?php
   session_start();

   if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 900) {
      session_unset();
      session_destroy();
      header("Location: login.php");
   }

   $_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Home Page</title>
      <link href="pics/logo_white.png" rel="icon">
      <link href="styles/general2.css" type="text/css" rel="stylesheet">
      <link href="styles/home2.css" type="text/css" rel="stylesheet">
      <meta charset="utf-8">
   </head>
    
   <body>
      <?php include "header.php"  ; ?>

        <div id="top">
            <div class="wrapper">
                <h2>UP XChange</h2>
                <h3>Find the best answer to your question.</h3>
                <form>
                    <input type="search" placeholder="Searching something?">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

        <div id="middle">
            <div class="wrapper">
                <article>
                    <div class="overlay">
                        <h4>Latest update<h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </article>
                <article>
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
                        <img src="pics/questions (1) 1.png" height="200">
                    </div>
                    <div class="column">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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