<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Dashboard</h1>
    <div id="dashboard">
        <div id="sidebar">
            <div class="container">
                <a class="navbar-brand navbar-logo" href="#">
                    <img src="../images/download.jpeg" alt="logo" class="logo-1" width="50px" height="50px">
                </a>
                <a href="home.php">Home</a>
                <a href="contact.php">contact us</a>
                <a href="manage.php">register</a>
                <a href="manage.html">Manage Business</a>
                <a href="index.html">Logout</a>
            </div>
        </div>

        <div id="content">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Establish a connection to the database
                    $mysqli = new mysqli('localhost', 'root', '', 'ennlightdb');

                    // Check connection
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }

                    // Query to select all data from the 'tblcontact' table
                    $sql = "SELECT * FROM tblregister";
                   
                    $result = $mysqli->query($sql);

                    // Loop through each row of the result set
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['ID']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['phone_number']."</td>"; // Changed 'Phone_number' to 'phone_number'
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="home"></div>

    <?php
    // Close connection
    $mysqli->close();
    ?>
</body>
</html>
