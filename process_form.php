<?php
// Include database configuration
include_once("admin/config.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_form_2'])) {
    // Retrieve form data and sanitize inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Prepare and execute SQL query to insert data into tblcontact
    $sql = "INSERT INTO tblcontact (name, email, subject, message, date_of_registration) 
            VALUES ('$name', '$email', '$subject', '$message', NOW())";

    if ($conn->query($sql) === TRUE) {
        // Record inserted successfully
        echo "Form submitted successfully!";
        header("locatiob:index.php");
    } else {
        // Error in inserting record
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Redirect back to the form page if form is not submitted
    header("Location: contact_form.php");
    exit();
}

// Close database connection
$conn->close();
?>
