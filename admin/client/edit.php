<?php 
include("../config.php");

// Ensure connection to the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch client details for editing
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $clientId = $_GET['id'];

    $sql = "SELECT * FROM clients WHERE id = $clientId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Extract client details
        $clientName = $row['client_name'];
        $contactNumber = $row['contact_number'];
        $clientEmail = $row['client_email'];
        $clientAddress = $row['client_address'];
        $companyLogo = $row['company_logo'];
    } else {
        // Redirect if client not found
        header("Location: client.php");
        exit();
    }
}

// Process form submission for updating client
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientId = $_POST['id'];
    $clientName = mysqli_real_escape_string($conn, $_POST["NAME"]);
    $contactNumber = mysqli_real_escape_string($conn, $_POST["CONTACT_NUMBER"]);
    $clientEmail = mysqli_real_escape_string($conn, $_POST["EMAIL"]);
    $clientAddress = mysqli_real_escape_string($conn, $_POST["ADDRESS"]);

    $sql = "UPDATE clients SET client_name='$clientName', contact_number='$contactNumber', client_email='$clientEmail', client_address='$clientAddress' WHERE id=$clientId";

    if ($conn->query($sql) === TRUE) {
        header("Location: client.php");
        exit();
    } else {
        echo "Error updating client: " . $conn->error;
    }
}

$conn->close(); // Close database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ennlite</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>add client</title>
    <link rel="stylesheet" href="style.css" />


        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
    
        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <style>
             .form-card {
                background-color: #fff;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
              }

              /* Style for form labels */
              .form-label {
                font-weight: bold;
                margin-bottom: 5px;
              }

              /* Style for form input fields */
              .form-input {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
              }
              .btn-save {
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    padding: 10px 20px;
                    cursor: pointer;
                }

                .btn-save:hover {
                    background-color: #0056b3;
                }
        </style>
        </head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        applight
    </div>

    <div class="search_bar">
        <input type="text" placeholder="Search" />
    </div>

    <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-sun' id="darkLight"></i>
        <i class='bx bx-bell' ></i>
    </div>
</nav>

<div class="container">
    <div class="form-card">
        <h1 class="page-header">Edit Client</h1>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $clientId ?>">
            
            <div class="form-group">
                <label class="form-label" for="NAME">Client Name:</label>
                <input class="form-input" id="NAME" name="NAME" type="text" value="<?= $clientName ?>" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="CONTACT_NUMBER">Contact Number:</label>
                <input class="form-input" id="CONTACT_NUMBER" name="CONTACT_NUMBER" type="text" value="<?= $contactNumber ?>" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="EMAIL">Email:</label>
                <input class="form-input" id="EMAIL" name="EMAIL" type="email" value="<?= $clientEmail ?>" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="ADDRESS">Address:</label>
                <textarea class="form-input" id="ADDRESS" name="ADDRESS" required><?= $clientAddress ?></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-save">Save Changes</button>
                <a href="client.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
