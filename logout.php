<!--Log Out Page-->
<?php
    session_start();
    session_unset();
    session_destroy();
    echo "Logged out.";
    echo "<script>setTimeout(\"location.href = 'login.php';\",5000);</script>";
?>