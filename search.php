<?php

    include 'dbconnector.php';

    if (isset($_POST['submit'])) {
        $searchQuery = $_POST['search'];

        // Perform any necessary validation or sanitization on the search query

        // Redirect to getResult.php with the search query as a parameter
        header("Location: result.php?search=" . urlencode($searchQuery));
        exit();
    }
?>
