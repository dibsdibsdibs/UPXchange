<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Home Page </title>
    <link href="styles/home.css" type="text/css" rel="stylesheet"/>
    <link href="styles/general.css" type="text/css" rel="stylesheet">
    <link href="pics/logo_white.png" rel="icon">
</head>

<body class="bg">
    <!--Header bar section-->
    <div class="top-header">
        <div id = "header-left">
            <img src = "pics/logo_white.png" height="65" style="margin: 0px 20px 0px 0px;">
            <h1 style="font-size:35px;">UP Xchange</h1>
        </div>
        <div id = "header-right">
            <a><img src = "pics/magnifying glass.png" height="35" style="margin: 0px 20px 0px 0px;"></a>
            <a><img src = "pics/plus.png" height="35" style="margin: 0px 20px 0px 0px;"></a>
            <a><img src = "pics/categories.png" height="35"style="margin: 0px 20px 0px 0px;"></a>
            <a><img src = "pics/bell.png" height="35"style="margin: 0px 20px 0px 0px;"></a>
            <a><img src = "pics/user.png" height="35"style="margin: 0px 20px 0px 0px;"></a>
        </div>
    </div>

   <div class = "container">
      <div class="top">
         <img src = "pics/upxchange.png" alt = "UP Xchange" class="title">
         <p id="find">Find the best answer to your question</p>
         <form action="#" method="GET"> 
         <input type="search" name="text" class="search" placeholder="have a question?">
         <button type="submit">Search</button>
         </form>
      </div>
   </div>

   <div class="container">
      <div class="middle">
         <article>
            <h4>
               Recent update:
            </h4>
            <p>Find the best answer to your question</p>
         </article>
         <article>
            <h4>
               Question of the day
            </h4>
            <p>Find the best answer to your question</p>
         </article>
      </div>
   </div>

   <div class="container">
      <div class="bottom">
      <h2>
         What is UP Xchange?
      </h2>
      <p>Find the best answer to your question</p>
      <p>Find the best answer to your question</p>
      </div>

   </div>

   <!-- Footer bar section -->
    <div class="bottom-footer">
        <div id="footer-left">
            <img src = "pics/logo_white.png" height="55">
            <h1 style="font-size:30px;">UP Xchange</h1>
        </div>        <div id="footer-right">
            <p>© 2023 UP Xchange. Up Xchange is a trademark brand owned by UP Xchange. A Philippine-registered company. All other trademarks are owned by their respective owners.</p>
        </div>
    </div>
    
    <script src="scripts/genJS.js" type="text/javascript"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>