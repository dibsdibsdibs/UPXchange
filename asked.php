<?php
include 'dbconnector.php';


$user_id = $_SESSION['user_id'];

// Prepare the query using prepared statements to prevent SQL injection
$query = "SELECT question_id, question, details, DATE_FORMAT(time_posted, '%M %d, %Y') AS post_date, DATE_FORMAT(time_posted, '%h:%i %p') AS post_time, user_id FROM questions ORDER BY time_posted DESC"; 
$result = mysqli_query($conn, $query);

if ($result) {

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
            }else{
                $firstName = '';
            }

            if($row['lastName'] != NULL){
                $lastName = $row['lastName'];
            }else if($firstName == ''){
                $lastName = 'ANONYMOUS';
            }else if($firstName != NULL){
                $lastName = '';
            }
        }

        echo

        "<li>
            <div class='question-content' id='$question_id'>
                <p class='question-poster'>Posted by $firstName $lastName</p>
                <div class='question'>
                    <p class='question-title'>$question</p>
                    <p class='question-details'>$details</p>
                </div>
                <p class='question-time'>Posted on $date_posted $time_posted</p>
            </div>
        </li>
        <br>";
    }
                

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the query error
    echo "Error preparing statement: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>