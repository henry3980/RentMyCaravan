<?php
session_start(); // Starting Session
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: /loginPage.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View/Edit a Caravan - Secure Area</title>
    <link rel="stylesheet" href="styles/FormStyles.css">
    <link rel="stylesheet" href="styles/960_12_col.css">
    <link rel="stylesheet" href="styles/add-caravan.css">
</head>
<body>
    <div class="header">
        
        <a href="home.php" class="col_4 center">
            <img src="/Images/WebsiteLogo.png" alt="Website Logo">
        </a>
        <h1 class="col_4 center">
            <img src="/Images/padlock-icon.svg" alt="Padlock Icon" width="40" height="40" style="vertical-align:middle; margin-right:10px;">
            View/Edit a Caravan - Secure Area
            <img src="/Images/padlock-icon.svg" alt="Padlock Icon" width="40" height="40" style="vertical-align:middle; margin-right:10px;">
        </h1>
        
        
        
        <div class="navbar col_4">

            <div class="dropdown">
                <button class="dropbtn">My Account
                <img src="/Images/menu-icon.svg" class="menu_icon" alt="Menu Icon" width="20" height="20">
                </button>
            <div class="dropdown-content">
           
            <a href="#">Signed in as: <?php echo $_SESSION['username']; ?></a>
            <a href="/scripts/logout.php">Sign Out</a>
            </div>
          </div>
        </div>

    </div>

    <div class="container">
        <div class="sidebar">
            <button onclick="window.location.href='/view-caravans.php'">View Caravans</button>
            <button onclick="window.location.href='/add-caravans.php'">Add Caravans</button>
            <button class="active" onclick="window.location.href='/CaravanEdit.php'">Edit/View Caravan</button>
        </div>
        <div class="content">
            <!-- Form content will go here -->
<div class="form">
                <h2>View/Edit a Caravan's details</h2>
                <p>Please change details below to edit a caravan, submitting when done.</p>

                <?php

                    if ($_SERVER["REQUEST_METHOD"] === "GET") {
                    // Extract the form fields into variables
                    
                    $CaravanToEdit = $_GET["id"];

                    if (!isset($CaravanToEdit) || empty($CaravanToEdit)) {
                        echo "No Caravan ID provided.";
                        header("Location: /idPopup.html");
                        exit();
                    }

                    // Database connection details
                    $name = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "rentmycaravan";

                    // Using MySQLi connection
                    $conn = new mysqli($name, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Prepare the SQL query
                    $sql = "SELECT * FROM `vehicle_details` WHERE `caravan_id` = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $CaravanToEdit); // Use prepared statements to prevent SQL injection
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Check if any rows were returned
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
    <form id="AddCaravan" class="form" action="/scripts/updateCaravan.php" method="post" enctype="multipart/form-data">
        <div class="form-left">
            <label for="caravan_id">Caravan ID</label>
            <input type="text" id="caravan_id" name="caravan_id" readonly = true value="<?php echo htmlspecialchars($row['caravan_id']); ?>" readonly>

            <label for="caravan_Make">Caravan Make</label>
            <input type="text" id="caravan_Make" name="caravan_Make" value="<?php echo htmlspecialchars($row['caravan_make']); ?>" required>

            <label for="caravan_Model">Caravan Model</label>
            <input type="text" id="caravan_Model" name="caravan_Model" value="<?php echo htmlspecialchars($row['caravan_model']); ?>" required>

            <label for="Caravan Type">Caravan Type</label>
            <select id="caravan_type" name="caravan_type" required>
                <option value="">Select Caravan Type:</option>
                <option value="static" <?php if ($row['caravan_bodytype'] == 'static') echo 'selected'; ?>>Static</option>
                <option value="touring" <?php if ($row['caravan_bodytype'] == 'touring') echo 'selected'; ?>>Touring</option>
            </select>

            <label for="caravan_Regplate">Caravan Regplate</label>
            <input type="text" id="caravan_Regplate" name="caravan_Regplate" value="<?php echo htmlspecialchars($row['caravan_registration']); ?>" required>

            <label for="Fuel Type">Fuel Type</label>
            <select id="fuel_type" name="fuel_type" required>
                <option value="">Select Fuel Type:</option>
                <option value="diesel" <?php if ($row['fuel_type'] == 'diesel') echo 'selected'; ?>>Diesel</option>
                <option value="petrol" <?php if ($row['fuel_type'] == 'petrol') echo 'selected'; ?>>Petrol</option>
            </select>

            <label for="caravan_Mileage">Caravan Mileage</label>
            <input type="number" id="caravan_Mileage" name="caravan_Mileage" value="<?php echo htmlspecialchars($row['mileage']); ?>" required>
        </div>

        <div class="form-right">
            <label for="caravan_location">Location</label>
            <input type="text" id="caravan_location" name="caravan_location" value="<?php echo htmlspecialchars($row['location']); ?>" required>

            <label for="Caravan_Year">Caravan Year</label>
            <input type="number" id="caravan_Year" name="caravan_Year" min="1970" max="2100" value="<?php echo htmlspecialchars($row['year']); ?>" required>

            <label for="Caravan_doors">How many doors does this caravan have?</label>
            <input type="number" id="caravan_doors" name="caravan_doors" min="1" max="5" value="<?php echo htmlspecialchars($row['num_doors']); ?>" required>

            <label for="Caravan_Video">Link to Caravan video:</label>
            <input type="url" id="caravan_video" name="caravan_video" value="<?php echo htmlspecialchars($row['video_url']); ?>" required>

            <label for="Caravan_picture">Current Picture: <?php echo $row['image_url']; ?></label>
            <img src="/scripts<?php echo htmlspecialchars($row['image_url']); ?>" alt="Caravan Image" width="300" height="200">
            <p>To change the picture please remove and add as new caravan or contact RMC support <a href="mailto:support@rmc.cymru">support@rmc.cymru</a></p>

            <button type="submit" class="submit-button">Save Caravan</button>
        </div>
    </form>
<?php
                         }
                    } else {
                        echo "<p>No caravan found with the provided ID.</p>";
                    }

                    // Close the connection
                    $stmt->close();
                    $conn->close();
                }
                    
                ?>
            </div>
                   
        </div>
    </div>
</div>

    <div class="footer">

                <div id="footerImg">
                    <img src="Images/WebsiteLogo.png">
                    <p>Made with ❤️ in Caerdydd</p>
                </div>
                <div id="footerPages">
                    <h1>Useful Pages:</h1>
                    <ul>
                        <li><a href="loginPage.php">Login</a></li>
                        <li><a href="registerPage.php">Register</a></li>
                        <li><a href="about.html">About Us</a></li>
                    </ul>
                </div>
                <div id="footerContact">
                    <p>📞 029 2018 0845</p>
                    <p>✉️ Hello@RMC.cymru</p>
                    <p>📌 Ty carafan Cardiff, CF00 0FA</p>
                </div>
</div>
<script>
    document.getElementById("dropdownBtn").addEventListener("click", function () {
        const dropdown = document.getElementById("dropdownMenu");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    });

    // Close the dropdown if the user clicks outside of it
    window.addEventListener("click", function (event) {
        const dropdown = document.getElementById("dropdownMenu");
        const button = document.getElementById("dropdownBtn");
        if (event.target !== dropdown && event.target !== button) {
            dropdown.style.display = "none";
        }
    });
</script>
</body>
</html>