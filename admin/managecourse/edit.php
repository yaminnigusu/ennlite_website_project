<?php
include_once("../config.php");

// Check if ID parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch course record based on ID
    $sql = "SELECT * FROM course WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
        exit;
    }
} else {
    echo "ID not specified";
    exit;
}

// Handle form submission for updating course record
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_name = $_POST['course_name'];
    $price = $_POST['price'];
    
    // Check if a new image file was uploaded
    if ($_FILES['photo']['size'] > 0) {
        $targetDir = "photos/";
        $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
        // Check if image file is a valid image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["photo"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        // Upload file if everything is ok
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                // Update query with image file path
                $update_sql = "UPDATE course SET course_name = '$course_name', price = '$price', photo = '$targetFile' WHERE id = $id";
                
                if ($conn->query($update_sql) === TRUE) {
                    echo '<script>alert("Course updated successfully!"); window.location.href="course.php";</script>';
                } else {
                    echo '<script>alert("Error updating course: ' . $conn->error . '");</script>';
                }
            } else {
                echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
            }
        }
    } else {
        // Update query without modifying the image file path
        $update_sql = "UPDATE course SET course_name = '$course_name', price = '$price' WHERE id = $id";
        
        if ($conn->query($update_sql) === TRUE) {
            echo '<script>alert("Course updated successfully!"); window.location.href="course.php";</script>';
        } else {
            echo '<script>alert("Error updating course: ' . $conn->error . '");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ennlite</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>add course</title>
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
    <div class="container">
        <div class="content">
            <h1 class="page-header">Edit Course</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="course_name">Course Name:</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo $row['course_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="photo">Course Photo:</label>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="course.php" class="btn btn-secondary">Cancel</a>
            </form>
            
        </div>
    </div>
</body>
</html>
