<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home Page</title>
        <link href="pics/logo_white.png" rel="icon">
        <link href="styles/home2.css" type="text/css" rel="stylesheet">
    </head>
    
    <body>
        <header>
            <div class="wrapper">
                <a href="#">
                    <img src="pics/logo_white.png" height="50">
                    <h1>UP Xchange</h1>
                </a>
                <nav>
                    <ul>
                        <li><a href="#"><img src="pics/magnifying glass.png" height="30"></a></li>
                        <li><a href="#"><img src="pics/plus.png" height="30"></a></li>
                        <li><a href="#"><img src="pics/categories.png" height="30"></a></li>
                        <li><a href="#"><img src="pics/bell.png" height="30"></a></li>
                        <li><a href="#"><img src="pics/user.png" height="30"></a></li>
                    </ul>
                </nav>
            </div>
        </header>

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

    <footer>
        <div class="wrapper">
            <div id="footer-left">
                <img src="pics/logo_white.png" height="50">
                <h1>UP XChange</h1>
            </div>
            <div id="footer-right">
                <p>© 2023 UP Xchange. Up Xchange is a trademark brand owned by UP Xchange. A Philippine-registered company. All other trademarks are owned by their respective owners.</p>
            </div>
        </div>
    </body>
</html>

<?php
    unset($_SESSION["error"]);
?>