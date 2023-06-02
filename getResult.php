<?php 
    include 'dbconnector.php';

    $results_per_page = 5;

    $searchQuery = $_GET['search']; // Retrieve the search query from the form submission

    // Perform any necessary validation or sanitization on the search query

    $query = "SELECT * FROM questions WHERE question LIKE '%$searchQuery%'";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);

    $number_of_page = ceil($number_of_result / $results_per_page);

    if (!isset($_GET['page'])) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }

    $page_first_result = ($page - 1) * $results_per_page;

    $query = "SELECT question_id, question, details, DATE_FORMAT(time_posted, '%M %d, %Y') AS post_date, DATE_FORMAT(time_posted, '%h:%i %p') AS post_time, user_id FROM questions WHERE question LIKE '%$searchQuery%' ORDER BY time_posted DESC LIMIT $page_first_result, $results_per_page";  
    $result = mysqli_query($conn, $query);

     echo 
    "<div class='question'>
                <p class='question-result'>Search Results for: $searchQuery</p>
    </div>";

    while ($row = mysqli_fetch_array($result)){
        $question_id = $row['question_id'];
        $question = $row['question'];
        $details = $row['details'];
        $date_posted = $row['post_date'];
        $time_posted = $row['post_time'];
        $poster_id = $row['user_id'];

        $getuser = "SELECT firstName, lastName FROM users WHERE user_id = '$poster_id'";  
        $user = mysqli_query($conn, $getuser);

        while ($row = mysqli_fetch_array($user)){
            if($row['firstName'] != NULL){
                $firstName = $row['firstName'];
            } else {
                $firstName = '';
            }

            if($row['lastName'] != NULL){
                $lastName = $row['lastName'];
            } else {
                $lastName = 'ANONYMOUS';
            }
        }

        echo
        "<div class='question-content' id='$question_id'>
            <p class='question-poster'>Posted by $firstName $lastName</p>
            <div class='question'>
                <p class='question-title'>$question</p>
                <p class='question-details'>$details</p>
            </div>
            <p class='question-time'>Posted on $date_posted $time_posted</p>
        </div>";
    }

    for($page = 1; $page <= $number_of_page; $page++) {  
        echo '<a class="index-page" href="getResult.php?search=' . $searchQuery . '&page=' . $page . '">' . $page . ' </a>';  
    }
?>
