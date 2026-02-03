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
    <title>View Caravans - Secure Area</title>
    <link rel="stylesheet" href="styles/FormStyles.css">
    <link rel="stylesheet" href="styles/960_12_col.css">
    <link rel="stylesheet" href="styles/view_style.css">
</head>
<body>

    <?php
    
    $uid = $_SESSION["user_id"];
    //SELECT * FROM `vehicle_details` WHERE `user_id` = ?
     $conn = mysqli_connect("localhost", "root", "", "rentmycaravan");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->query("SELECT * FROM `vehicle_details` WHERE `user_id` = $uid");
    
    $data=[];
    while($Row = $stmt->fetch_assoc())
    {
        $data[]= $Row;   
    }

    ?>

    <div class="header">
        
        <a href="home.php" class="col_4 center">
            <img src="/Images/WebsiteLogo.png" alt="Website Logo">
        </a>
        <h1 class="col_4 center">
            <img src="/Images/padlock-icon.svg" alt="Padlock Icon" width="40" height="40" style="vertical-align:middle; margin-right:10px;">
            View caravans - Secure Area
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
            <button class="active" onclick="window.location.href='/view-caravans.php'">View Caravans</button>
            <button onclick="window.location.href='/add-caravans.php'">Add Caravans</button>
            <button onclick="window.location.href='/CaravanEdit.php'">Edit/View Caravan</button>
        </div>
        <div class="content">
            
            <div id="display" >

            <?php if (count($data) === 0):?>
                <!-- display no data error message -->
            
            <?php else: ?>

            <?php foreach ($data as $Caravan): ?>
                
                <div id="viewdiv">
                    <div>
                        <h3>Make: <?= $Caravan['caravan_make'] ?> </h3>
                        <h3>Model: <?= $Caravan['caravan_model'] ?> </h3>
                        <h3>Year: <?= $Caravan['year'] ?> </h3>
                        <h3>Mileage: <?= $Caravan['mileage'] ?> </h3>
                        <h3>Fuel Type: <?= $Caravan['fuel_type'] ?> </h3> 
                        <button class="button" onclick="window.location.href='/scripts/deleteCaravan.php?id=<?= $Caravan['caravan_id'] ?>'">Remove Caravan</button>
                        <button class="button" onclick="window.location.href='/CaravanEdit.php?id=<?= $Caravan['caravan_id'] ?>'">Edit/View Caravan</button>
                        <hr>
                    </div>
                    <div>
                        <img src="/scripts<?= $Caravan['image_url'] ?>" alt="Caravan Image" width="300" height="200">
                    </div>
                </div>
            <?php endforeach ?>
            <?php endif ?>

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