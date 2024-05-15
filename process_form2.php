<?php
include("admin/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind parameters
$full_name = $_POST["full_name"];
$email = $_POST["email"];
$phone_number = $_POST["phone_number"];
$address = $_POST["address"];
$course = $_POST["course"];

// SQL statement to insert data into database
$sql = "INSERT INTO students (student_name, email, phone_number, address, course) VALUES (?, ?, ?, ?,?)";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("sssss", $full_name, $email, $phone_number, $address, $course);

// Attempt to execute the prepared statement
if ($stmt->execute()) {
    echo "Student record created successfully";
    header("location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
}