<?php
include 'dbconnector.php';


$user_id = $_SESSION['user_id'];

// Prepare the query using prepared statements to prevent SQL injection
$query = "SELECT question_id, reply, DATE_FORMAT(time_posted, '%M %d, %Y') AS post_date, DATE_FORMAT(time_posted, '%h:%i %p') AS post_time, user_id FROM replies ORDER BY time_posted DESC"; 
$result = mysqli_query($conn, $query);

if ($result) {

    while ($row = mysqli_fetch_array($result)){

        $question_id = $row['question_id'];

        $question = $conn -> query("SELECT question FROM questions WHERE $question_id = '$question_id'");
        while ($row = $tags -> fetch_assoc()) 
        {
            $_SESSION['question'] = $row['question'];
        }

        $reply = $row['reply'];
        $reply_date = $row['reply_date'];
        $reply_time = $row['reply_time'];
        $postBy = $row['user_id'];


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