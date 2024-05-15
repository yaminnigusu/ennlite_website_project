<?php 
include("../config.php");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $clientName = mysqli_real_escape_string($conn, $_POST["NAME"]);
    $contactNumber = mysqli_real_escape_string($conn, $_POST["CONTACT_NUMBER"]);
    $clientEmail = mysqli_real_escape_string($conn, $_POST["EMAIL"]);
    $clientAddress = mysqli_real_escape_string($conn, $_POST["ADDRESS"]);
    
    // Handle file upload (company logo)
    $targetDirectory = "photos/";
    $targetFilePath = $targetDirectory . basename($_FILES["PHOTO"]["name"]);

    if (move_uploaded_file($_FILES["PHOTO"]["tmp_name"], $targetFilePath)) {
        // File uploaded successfully, insert client data into the database
        $photo = basename($_FILES["PHOTO"]["name"]);

        // Prepare and execute SQL statement to insert client data
        $stmt = $conn->prepare("INSERT INTO clients (client_name, contact_number, client_email, client_address, company_logo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $clientName, $contactNumber, $clientEmail, $clientAddress, $photo);

        if ($stmt->execute()) {
            // Redirect to success page or display success message
            echo header("location: client.php");
           
            exit();
        } else {
            echo "Error inserting client: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close(); // Close database connection
?>
<!DOCTYPE html>
<html>
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
       <!-- navbar -->
       <nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        </i>applight
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

    <div id="addTestimonialForm" class="container"  enctype="multipart/form-data">
  <div class="form-card">
    <h1 class="page-header">Add New Client</h1>
    <!-- Update form action to submit to the same page (for processing in PHP) -->
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label class="form-label" for="PHOTO">Company Logo:</label>
    <input class="form-input" id="PHOTO" name="PHOTO" type="file" accept="image/*" required>
  </div>

  <div class="form-group">
    <label class="form-label" for="NAME">Client Name:</label>
    <input class="form-input" id="NAME" name="NAME" type="text" placeholder="Client Name" required>
  </div>

  <div class="form-group">
    <label class="form-label" for="CONTACT_NUMBER">Client Contact Number:</label>
    <input class="form-input" id="CONTACT_NUMBER" name="CONTACT_NUMBER" type="text" placeholder="Client Contact Number" required>
  </div>

  <div class="form-group">
    <label class="form-label" for="EMAIL">Client Email:</label>
    <input class="form-input" id="EMAIL" name="EMAIL" type="email" placeholder="Client Email" required>
  </div>

  <div class="form-group">
    <label class="form-label" for="ADDRESS">Client Address:</label>
    <textarea class="form-input" id="ADDRESS" name="ADDRESS" placeholder="Client Address" required></textarea>
  </div>

  <div class="form-group">
    <button class="btn btn-save btn-block" type="submit">
      <span class="fa fa-save fw-fa"></span> Save Client
    </button>
  </div>
  
</form>

  </div>
</div>

    </body>
</html>