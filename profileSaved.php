<?php
// Start the session
session_start();

// Check if the user is logged in or redirect to the login page if not
if (!isset($_SESSION['user_id'])) {
    header("Location: editProfileFR.php");
    exit;
}

// Retrieve the submitted form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$course = $_POST['course'];
$membership = $_POST['membership'];
$year = $_POST['year'];
$about = $_POST['about'];

// Perform validation and sanitization on the form data
// ...

// Store the user profile data in the database
// Assuming you have a database connection established

// Prepare the SQL statement
$sql = "INSERT INTO user_profiles (first_name, last_name, course, membership, year, about) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

// Bind the values and execute the statement
$stmt->execute([$firstName, $lastName, $course, $membership, $year, $about]);

// Check if the profile was successfully saved
if ($stmt->rowCount() > 0) {
    // Profile saved successfully
    $_SESSION['success_message'] = "Your profile has been saved successfully.";
} else {
    // Profile saving failed
    $_SESSION['error_message'] = "An error occurred while saving your profile. Please try again.";
}

// Redirect the user back to the profile editing page
header("Location: editProfile.php");
exit;
?>
