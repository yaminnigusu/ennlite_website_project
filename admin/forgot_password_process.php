<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Include your database configuration file
include("config.php");

// Retrieve the email address from the POST request
$email = $conn->real_escape_string($_POST['email']);

// Validate the email address
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Handle invalid email address error
    echo "Invalid email address";
    exit;
}

// Check if the email exists in the database
$sql = "SELECT userid, username FROM tblusers WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, generate a secure token for password reset
    $token = bin2hex(random_bytes(16)); // Generate a random token

    // Store the token in the database
    $userData = $result->fetch_assoc();
    $userId = $userData['userid'];
    $sqlUpdate = "UPDATE tblusers SET reset_token = '$token' WHERE userid = '$userId'";
    
    if ($conn->query($sqlUpdate) === TRUE) {
        // Send password reset instructions to the user's email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Use PHPMailer default settings from php.ini for SMTP
            $mail->isSMTP();

            // Sender and recipient
            $mail->setFrom('nigusuyamin@gmail.com', 'Nigusu'); // Your name and Gmail address
            $mail->addAddress($email, $userData['username']); // Recipient's email and name

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = 'Please click on the following link to reset your password: <a href="http://yourdomain.com/reset_password.php?token=' . $token . '">Reset Password</a>';

            // Send email
            $mail->send();

            echo "Password reset instructions sent to your email address.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // User not found with the provided email address
    echo "Email address not registered.";
}

// Close database connection
$conn->close();
?>
