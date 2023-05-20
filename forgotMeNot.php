<?php
    session_start();
    include 'dbconnector.php';

    if (isset($_POST['upmail'])) {
        $upmail = $_POST['upmail'];

        // Check if the email exists in the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE upmail = ?");
        $stmt->bind_param("s", $upmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Generate a random password reset token
            $resetToken = bin2hex(random_bytes(32));

            // Store the reset token and its expiry time in the database
            $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE upmail = ?");
            $stmt->bind_param("sss", $resetToken, $upmail);
            $stmt->execute();

            // Send an email to the user with the reset link
            $resetLink = "http://example.com/reset_password.php?token=" . $resetToken; // Change example.com to your domain
            $resetMessage = "Click the following link to reset your password: <a href='$resetLink'>Reset Password</a>";
            // Send the email using your preferred email sending method (e.g., PHPMailer, mail() function, etc.)

            // Display a success message
            $_SESSION["success"] = "Please check your email for further instructions.";
            header("Location: forgot_password.php");
            exit();
        } else {
            // Email doesn't exist in the database
            $_SESSION["error"] = "Email not found. Please enter a valid email.";
        }
    }
?>