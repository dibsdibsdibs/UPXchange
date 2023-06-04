<?php
include 'dbconnector.php';

// Check if the user is logged in and get the user ID from the session variable
if (!isset($_SESSION['user_id'])) {
    // Handle the case when the user is not logged in
    echo "User is not logged in.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Prepare the query using prepared statements to prevent SQL injection
$query = "SELECT question FROM questions WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    // Bind the user ID parameter to the prepared statement
    mysqli_stmt_bind_param($stmt, "i", $user_id);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the rows from the result set
    $askedQuestions = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the query error
    echo "Error preparing statement: " . mysqli_error($conn);
}

// Close the prepared statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
?>
