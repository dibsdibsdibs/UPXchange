<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['course']) && isset($_POST['membership']) && isset($_POST['yearLevel']) && isset($_POST['about'])) {
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
        $user_id = $_SESSION['user_id'];

        if (empty($firstName) || empty($lastName) || empty($course) || empty($membership) || empty($yearLevel) || empty($about)) {
            $error = 'Please fill up the necessary fields';
        } else {

            $sql = "UPDATE users SET firstName = ?, lastName = ?, course = ?, membership = ?, yearLevel = ?, about = ? WHERE user_id = $user_id";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $firstName, $lastName, $course, $membership, $yearLevel, $about);


            if ($stmt->execute()) {
                $error = "Profile updated successfully!";
                $_SESSION["error"] = $error;
                header("Location: editProfile.php");
                exit();
            } else {
                $error = "Profile update failed. Please try again.";
            }
        }
    } else {
        $error = "Please fill up the necessary fields";
    }

    $_SESSION["error"] = $error;
    header("Location: editProfile.php");
    exit();
?>
