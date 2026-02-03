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
    <title>Add a Caravan - Secure Area</title>
    <link rel="stylesheet" href="styles/FormStyles.css">
    <link rel="stylesheet" href="styles/960_12_col.css">
</head>
<body>
    <div class="header">
        
        <a href="/homePage" class="col_4 center">
            <img src="/Images/WebsiteLogo.png" alt="Website Logo">
        </a>
        <h1 class="col_4 center">
            <img src="/Images/padlock-icon.svg" alt="Padlock Icon" width="40" height="40" style="vertical-align:middle; margin-right:10px;">
            Add a Caravan - Secure Area
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
            <button class="active" onclick="window.location.href='/add-caravans.php'">Add Caravans</button>
            <button onclick="window.location.href='/CaravanRemove.php'">Remove Caravans</button>
        </div>
        <div class="content">
            <!-- Form content will go here -->
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
                        <li><a href="loginPage.html">Login</a></li>
                        <li><a href="registerPage.html">Register</a></li>
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