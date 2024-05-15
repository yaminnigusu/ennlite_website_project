

<!DOCTYPE html>
<html>
  <head>
    <title>ennlight</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Eyonadab</title>
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



    <div id="addUserForm" class="container" >
  <div class="form-card">
    <h1 class="page-header">Add New User</h1>
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                 <div class="form-group">
                    <label class="form-label" for="email">email:</label>
                    <input class="form-input" id="email" name="email" placeholder="email" type="email" autocomplete="none">
                </div> 
                
                <div class="form-group">
                    <label class="form-label" for="USERNAME">Username:</label>
                    <input class="form-input" id="USERNAME" name="USERNAME" placeholder="Username" type="text" value="" autocomplete="none">
                </div>
                <div class="form-group">
                    <label class="form-label" for="PASSWORD">Password:</label>
                    <input class="form-input" id="PASSWORD" name="PASS" placeholder="Password" type="password" autocomplete="none">
                </div>
                <div class="form-group">
                    <button class="btn btn-save btn-block" type="submit">
                        <span class="fa fa-save fw-fa"></span> Save
                    </button>
                </div>
                <?php
include("../config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your database connection details here
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $username = mysqli_real_escape_string($conn, $_POST["USERNAME"]);
    $password = password_hash($_POST["PASS"], PASSWORD_DEFAULT); // Hash the password for security

    // Insert user data into the table using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO tblusers (email,USERNAME, PASS) VALUES ( ?, ?, ?)");

    $stmt->bind_param("sss", $email,  $username, $password);

    if ($stmt->execute()) {
        
        echo "sucssessful";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    mysqli_close($conn);
}
?>
            </form>
  </div>
</div>

    </body>
</html>