<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your database connection details here
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "aplusdb";

    // Create a database connection
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Handle client photo upload
    $clientPhotoPath = "photos/";
    $clientPhotoPath .= basename($_FILES["PHOTO"]["name"]);

    if (move_uploaded_file($_FILES["PHOTO"]["tmp_name"], $clientPhotoPath)) {
        // Image uploaded successfully, insert client data into the database
        $name = mysqli_real_escape_string($conn, $_POST["NAME"]);
        $profession = mysqli_real_escape_string($conn, $_POST["PROFESSION"]);
        $comment = mysqli_real_escape_string($conn, $_POST["COMMENT"]);

        // Insert testimonial data into the table using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO tbltestimonial (NAME, PROFESSION, COMMENT, PHOTO) VALUES (?, ?, ?, ?)");

        $stmt->bind_param("ssss", $name, $profession, $comment, $clientPhotoPath);

        if ($stmt->execute()) {
            echo "Testimonial added successfully.";
            header("Location: testimonial.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>ennlite acadamy</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>ennlite acadamy</title>
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
       </i> ennlight
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
    <h1 class="page-header">Add New Testimonial</h1>
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label" for="PHOTO">Photo:</label>
                    <input class="form-input" id="PHOTO" name="PHOTO" type="file" accept="image/*">
                </div>
                <div class="form-group">
                    <label class="form-label" for="NAME">Name:</label>
                    <input class="form-input" id="NAME" name="NAME" placeholder="Name" type="text" value="" autocomplete="none">
                </div>
                <div class="form-group">
                    <label class="form-label" for="PROFESSION">Profession:</label>
                    <input class="form-input" id="PROFESSION" name="PROFESSION" placeholder="Profession" type="text" value="" autocomplete="none">
                </div>
                <div class="form-group">
                    <label class="form-label" for="COMMENT">Testimony:</label>
                    <textarea class="form-input" id="COMMENT" name="COMMENT" placeholder="Testimony" rows="4" autocomplete="none"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-save btn-block" type="submit">
                        <span class="fa fa-save fw-fa"></span> Save
                    </button>
                </div>
                <?php 
                include("../config.php");
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["NAME"];
    $profession = $_POST["PROFESSION"];
    $comment = $_POST["COMMENT"];

    // Handle photo upload
    $photo = $_FILES["PHOTO"];
    $photo_name = $photo["name"];
    $photo_tmp = $photo["tmp_name"];

    // Move uploaded photo to desired location
    $photo_path = "uploads/" . $photo_name;
    move_uploaded_file($photo_tmp, $photo_path);

    // SQL to insert data into tbltestimonial
    $sql = "INSERT INTO tbltestimonial (name, profession, comment, photo_path) VALUES ('$name', '$profession', '$comment', '$photo_path')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
            </form>
  </div>
</div>

    </body>
</html>