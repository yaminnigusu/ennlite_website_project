

<!DOCTYPE html>
<html>
  <head>
    <title>applight</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>applight</title>
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
        </i>ennlite
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

    <div id="addTestimonialForm" class="container" method="post" enctype="multipart/form-data">
  <div class="form-card">
    <h1 class="page-header">Add New students</h1>
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="form-label" for="name">Student Name:</label>
            <input class="form-input" id="name" name="name" placeholder="Name" type="text" value="" autocomplete="none">
        </div>
        <div class="form-group">
            <label class="form-label" for="email">Email:</label>
            <input class="form-input" id="email" name="email" placeholder="Email" type="email" value="" autocomplete="none">
        </div>
        <div class="form-group">
            <label class="form-label" for="phone_number">Phone Number:</label>
            <input class="form-input" id="phone_number" name="phone_number" placeholder="Phone Number" type="text" value="" autocomplete="none">
        </div>
        <div class="form-group">
            <label class="form-label" for="address">Address:</label>
            <input class="form-input" id="address" name="address" placeholder="Address" type="text" value="" autocomplete="none">
        </div>
        <select id="course" class="form-input w-100" name="course" required>
    <option value="" disabled selected>Select a Course</option>
    <option value="interior_design">Interior Design</option>
    <option value="front_end_web">Front End Web Development</option>
    <option value="backend_web">Backend Web Development</option>
    <option value="full_stack_web">Full Stack Web Development</option>
    <option value="graphic_design">Graphic Design</option>
    <option value="social_media_marketing">Social Media Marketing</option>
    <option value="video_editing">Video Editing</option>
  </select>
        <div class="form-group">
            <button class="btn btn-save btn-block" type="submit">
                <span class="fa fa-save fw-fa"></span> Save
            </button>
        </div>
    </form>
  </div>
</div>

<?php
include("../config.php"); // Include database connection

// Processing form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $address = $conn->real_escape_string($_POST['address']);
    $course = $conn->real_escape_string($_POST['course']);

    // Insert data into the database
    $sql = "INSERT INTO students (student_name, email, phone_number, address, course) VALUES ('$name', '$email', '$phone_number', '$address','$course')";

    if ($conn->query($sql) === TRUE) {
        
        header("location:student.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>



    </body>
</html>