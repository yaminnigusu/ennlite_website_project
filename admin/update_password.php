<?php
// Database connection (similar to forgot_password_process.php)

// Retrieve the token and new password from the form submission
$token = $_POST['token'];
$newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT); // Hash the new password

// Validate the token (check if it exists in the database and is valid)

// Update the user's password in the database
$sql = "UPDATE users SET password = '$newPassword', reset_token = NULL WHERE reset_token = '$token'";
if ($conn->query($sql) === TRUE) {
    echo "Password updated successfully.";
} else {
    echo "Error updating password: " . $conn->error;
}

// Close connection
$conn->close();
?>
