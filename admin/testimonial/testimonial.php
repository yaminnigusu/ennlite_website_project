

<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>A+ Marketing</title>
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
            /* Add these CSS rules to fix the navbar at the top */
            .navbar {
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              background-color: #ffffff; /* Change this to your desired background color */
              z-index: 1000; /* Ensure it's above other content */
              box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Add shadow if desired */
            }
            
            /* Ensure the footer stays at the bottom */
            footer {
              position: fixed;
              bottom: 0;
              width: 100%;
            }
            
            /* Container to hold the sidebar and content */
            .container {
              display: flex;
              justify-content: flex-start; /* Sidebar on the left, content on the right */
              align-items: stretch; /* Stretch both to the same height */
            }
            
            /* Style the sidebar */
            .sidebar {
              width: 250px; /* Adjust the width as needed */
              background-color: #f0f0f0; /* Add your desired background color */
              padding: 20px;
              box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1); /* Add shadow if desired */
            }
            
            /* Style the content */
            .content {
              flex-grow: 1; /* Allow content to grow and fill remaining space */
              padding: 20px;
              padding-top: 100px;
              margin-left: 250px; /* Ensure content is to the right of the sidebar */
            }
            
            /* Add media query for responsive design if needed */
            @media (max-width: 768px) {
              .container {
                flex-direction: column; /* Stack sidebar on top of content for smaller screens */
              }
              .sidebar {
                width: 100%; /* Full width sidebar on smaller screens */
              }
              .content {
                margin-left: 0; /* Remove margin on smaller screens to stack content below navbar */
              }
            }

           

            /* Style for the "Add Client" button */
            .btn-add-testimonial {
              float: right; /* Float the button to the right */
              margin-top: -10px; /* Adjust the margin to align it with the heading */
              margin-right: 10px; /* Add some space between the button and the heading */
              background-color: #4070f4;
            }

            /* Additional styling for the button if needed */
            .btn-add-testimonial:hover {
              background-color: #577ee9; /* Change the background color on hover */
              color: white; /* Change the text color on hover */
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

    <div class="container">
    <!-- sidebar -->
  <nav class="sidebar">
      <div class="menu_content">

        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>
          <!-- duplicate these li tag if you want to add or remove navlink only -->
          <!-- Start -->
          <li class="item">
            <a href="../home.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bxs-magic-wand"></i>
              </span>
              <span class="navlink">Home</span>
            </a>
          </li>
          <!-- End -->

          <li class="item">
            <a href="../student/student.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-loader-circle"></i>
              </span>
              <span class="navlink">Students</span>
            </a>
          </li>
          
          <li class="item">
            <a href="../contact/contact.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-loader-circle"></i>
              </span>
              <span class="navlink">Contact</span>
            </a>
          </li>

          <li class="item">
            <a href="../managecourse/course.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-loader-circle"></i>
              </span>
              <span class="navlink">manage course</span>
            </a>
          </li>

          <li class="item">
            <a href="../client/client.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-loader-circle"></i>
              </span>
              <span class="navlink">Clients</span>
            </a>
          </li>

          <li class="item">
            <a href="testimonial.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-filter"></i>
              </span>
              <span class="navlink">Testimonial</span>
            </a>
          </li>
          <li class="item">
            <a href="../user/user.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-cloud-upload"></i>
              </span>
              <span class="navlink">Manage users</span>
            </a>
          </li>
        </ul>
       

        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
      </div>
    </nav>



    <div class="content">
    <div class="row">
        <div class="col-lg-12">
           <!-- Modify the heading to include the "Add Client" button -->
           <h1 class="page-header" id="testimonialHeader">
                List of Testimonials
                <a href="add.php" class="btn btn-success btn-add-testimonial" id="addTestimonialButton">
                  <i class="bx bx-plus"></i> Add Testimonial
                </a>
              </h1>



        </div>
        <!-- /.col-lg-12 -->
    </div>
   
        <div class="table-responsive">
            <table id="dash-table" class="table table-striped table-bordered table-hover" style="font-size:12px" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Profession</th>
                        <th>Testimony</th>
                        <th width="10%" align="center">Action</th>
                    </tr>
                </thead>
               <tbody>
               <?php
                // Include database connection file
                include_once '../config.php';

                // SQL query to retrieve testimonial data
                $sql = "SELECT * FROM tbltestimonial";
                $result = mysqli_query($conn, $sql);

                // Check if records exist
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row of data
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['ID'] . '</td>';
                        echo '<td><img src="' . $row['PHOTO'] . '" width="100"></td>';
                        echo '<td>' . $row['NAME'] . '</td>';
                        echo '<td>' . $row['PROFESSION'] . '</td>';
                        echo '<td>' . $row['COMMENT'] . '</td>';
                        echo  '<td>
                        <a href="edit.php?id=' . $row["ID"] . '" class="btn btn-primary btn-sm">Edit</a>
                        <a href="?delete=' . $row["ID"] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete thisrecord?\');">
                                            <i class="bx bxs-trash"></i> Delete
                                        </a>
                      </td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No testimonials found</td></tr>';
                }
                if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                  $delete_id = $_GET['delete'];
                  $delete_sql = "DELETE FROM tbltestimonial WHERE id = $delete_id";
                  if ($conn->query($delete_sql) === TRUE) {
                    echo '<script>window.location.href = "testimonial.php";</script>';
                      
                  } else {
                      echo '<script>alert("Error deleting course: ' . $conn->error . '");</script>';
                  }
                }
                

                // Close database connection
                mysqli_close($conn);
                ?>
        
    </tbody> 
    
    
            </table>
        </div>
  

<footer class="fixed-bottom">
  <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
      <div class="row gx-5">
        <div class="container-fluid text-white" style="background: #061429;">
          <div class="container text-center">
            <div class="row justify-content-end">
              <div class="col-lg-8 col-md-6">
                <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                  <p class="mb-0">
                    &copy; <a class="text-white border-bottom" href="#">ennlite</a>. All Rights Reserved.
                    Developed by <a class="text-white border-bottom" href="https://ennlite.com">applight digital Technologies, PLC</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>


  </body>
</html>
