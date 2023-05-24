<?php
    include 'dbconnector.php';
    session_start();
    $error = "";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the submitted email
        $upmail = $_POST["upmail"];

        // Validate the email address
        if (!filter_var($upmail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "Invalid upmail format";
            header("Location: forgotPassword.php");
            exit;
        }

        // Generate a unique token or reset key (you can modify this part as needed)
        $token = bin2hex(random_bytes(32));

        // Store the token and email in the database
        $sql = "INSERT INTO password_reset (upmail, token) VALUES (:upmail, :token)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':upmail', $upmail);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Send the reset email
            // Replace the following lines with your code for sending the email
            $to = $upmail;
            $subject = "Password Reset";
            $message = "Dear user, please click the following link to reset your password: example.com/reset-password.php?token=$token";
            $headers = "From: your_email@example.com";

            // Uncomment the following line to send the email
            mail($to, $subject, $message, $headers);

            // Redirect to a success page or display a success message
            header("Location: forgotPassword.php");
            exit;
        } else {
            $_SESSION["error"] = "Failed to send the reset email. Please try again later.";
            header("Location: forgotPassword.php");
            exit;
        }
    }
?>
