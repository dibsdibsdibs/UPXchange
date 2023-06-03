<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    if (isset($_POST['firstName']) || isset($_POST['lastName']) || isset($_POST['course']) || isset($_POST['membership']) || isset($_POST['yearLevel']) || isset($_POST['about']) || isset($_POST['pp'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            return $data;
        }

        $firstName = validate($_POST['firstName']);
        $lastName = validate($_POST['lastName']);
        $course = validate($_POST['course']);
        $membership = validate($_POST['membership']);
        $yearLevel = validate($_POST['yearLevel']);
        $about = validate($_POST['about']);
        $pp = validate($_POST['pp']);
        $user_id = $_SESSION['user_id'];

        // Check if any field is changed
        if (!empty($firstName) || !empty($lastName) || $course !== "select" || $membership !== "select" || $yearLevel !== "select" || !empty($about) || !empty($pp)) {
            $sql = "UPDATE users SET";

            $fields = array();
            if (!empty($firstName)) {
                $fields[] = "firstName = '$firstName'";
            }
            if (!empty($lastName)) {
                $fields[] = "lastName = '$lastName'";
            }
            if ($course !== "select") {
                $fields[] = "course = '$course'";
            }
            if ($membership !== "select") {
                $fields[] = "membership = '$membership'";
            }
            if ($yearLevel !== "select") {
                $fields[] = "yearLevel = '$yearLevel'";
            }
            if (!empty($about)) {
                $fields[] = "about = '$about'";
            }
            if (!empty($pp)) {
                $fields[] = "pp = '$pp'";
            }

            $sql .= " " . implode(", ", $fields);
            $sql .= " WHERE user_id = $user_id";

            if ($conn->query($sql)) {
                $error = "Profile updated successfully!";
                $_SESSION["error"] = $error;
                header("Location: viewProfile.php");
                exit();
            } else {
                $error = "Profile update failed. Please try again.";
            }
        } else {
            $error = 'You did not change anything';
        }
    }

    $_SESSION["error"] = $error;
    header("Location: editProfile.php");
    exit();
?>
