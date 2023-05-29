<?php
    // Start the session
    session_start();

    // Include the database connection file
    include 'dbconnector.php';

    // Retrieve the submitted form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $course = $_POST['course'];
    $membership = $_POST['membership'];
    $year = $_POST['year'];
    $about = $_POST['about'];

    // Prepare the SQL statement
    $sql = "INSERT INTO user_profiles (first_name, last_name, course, membership, year, about) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $lastName, $course, $membership, $year, $about);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Profile saved successfully
        $_SESSION['success_message'] = "Your profile has been saved successfully.";
    } else {
        // Profile saving failed
        $_SESSION['error_message'] = "An error occurred while saving your profile. Please try again.";
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Redirect the user back to the profile editing page
    header("Location: editProfileFR.php");
    exit;
?>
