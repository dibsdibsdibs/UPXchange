<?php

    include 'dbconnector.php';

    // Check if the form is submitted
    if(isset($_POST['submit'])){
        // Get the search query from the form
        $searchQuery = $_POST['search'];


        // Prepare the SQL query to search for questions
        $sql = "SELECT * FROM questions WHERE question LIKE '%$searchQuery%' OR details LIKE '%$searchQuery%'";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if any results were found
        if(mysqli_num_rows($result) > 0){
            // Display the search results
            echo "<h2>Search Results</h2>";

            while($row = mysqli_fetch_assoc($result)){
                echo "<h4>".$row['question']."</h4>";
                echo "<p>".$row['details']."</p>";
            }
        } else {
            echo "No results found.";
        }

        // Close the database connection
        mysqli_close($conn);
    }
?>
