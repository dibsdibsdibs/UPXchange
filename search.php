<?php
    include 'session.php';
    include 'dbconnector.php'
    
    // Check if the search form is submitted
    if (isset($_GET['search'])) {
        $searchQuery = $_GET['search'];
        
        $searchQuery = $_GET['search'];
  
        
        // Prepare and execute the search query
        $stmt = $conn->prepare("SELECT * FROM questions WHERE question LIKE :searchQuery");
        $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%');
        $stmt->execute();
        
        // Fetch the search results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Process and display the search results
        foreach ($results as $result) {
            // Display each search result as per your requirements
            echo "<h3>" . $result['title'] . "</h3>";
            echo "<p>" . $result['description'] . "</p>";
        }
    }
?>