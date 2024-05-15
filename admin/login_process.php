<?php
include("config.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["pass"];

    // Prepare SQL statement to fetch user details
    $stmt = $conn->prepare("SELECT userid, username, pass FROM tblusers WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found, fetch password from database
        $stmt->bind_result($userid, $db_username, $db_password);
        $stmt->fetch();

        // Compare plain-text password with the password from the database
        if ($password === $db_password) {
            // Password correct, redirect to home.php
            session_start();
            $_SESSION["userid"] = $userid; // Store user ID in session for authentication

            header("Location: home.php");
            exit();
        } else {
            // Password incorrect
            echo "Password incorrect. Please try again.";
        }
    } else {
        // User not found
        echo "User not found. Please check your username.";
    }

    $stmt->close();
}

$conn->close();
?>
