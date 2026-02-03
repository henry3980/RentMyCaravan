<!DOCTYPE html>
<!-- Henry's Code -->
<?php
session_start(); // Starting Session

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $link = "View-Caravans.php";
    $linkText = "View Caravans";
} else {
    $link = "loginPage.php";
    $linkText = "Login";
}

?>

<html>
    <!--import logo as favicon and css files-->
    
    <head>
        <link rel="icon" href="Images/WebsiteLogo.png" type="image/png">
        <link rel="stylesheet" href="/styles/960_12_col.css">
        <link rel="stylesheet" href="/styles/stylehenry.css">

        <title>Rent My Caravan - Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
<!-- Start site header -->
 
        <div class="mainbody">
            <div class="header-wrapper">
                <div class="header container_12"> 
                    <div id="headerImg" class="grid_4">
                        <a href="home.php">
                            <img src="Images/WebsiteLogo.png">
                        </a>
                    </div>
                    <div id="headerTitle" class="grid_4">
                        <h1>Welcome To Rent My Caravan</h1>
                    </div>
                    <div id="nav" class="grid_4">
                        <ul>
                            <a class="headerLinks" href="registerPage.php">Register</a> |
                            <a class="headerLinks" style="font-family: Quicksand;" href="<?php echo $link; ?>"><?php echo $linkText; ?></a>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>


<!-- End header -->
<!-- Home Body here-->
    
        <div class="hero">
            
            <div class="heroblock grid_4 push_1 ">
                <h1 class="hero_h1">Stay-cations have never been so:</h1>
                <!-- use modified example and script from https://mattboldt.github.io/typed.js/ to animate hero text -->
                <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

                <h1 class="hero_h1anim" id="typed"> </h1>
                <script>
                    var typed = new Typed('#typed', {
                        strings: [' Fun', ' Relaxing', ' Affordable', ' Easy' , ' Memorable'],
                        typeSpeed: 50,
                        backSpeed: 25,
                        backDelay: 1000,
                        startDelay: 500,
                        loop: true,
                    });
                </script>

            </div>

        </div>

<hr>
        <div class ="helpBlock">
            <h1 class="hero_h1">How can we help you?</h1>
            <div class="helpButtonsContainer">
                <button class="helpButtons" onclick="helpPopup()">Find My Stay</button>
                <button class="helpButtons" onclick="location.href='Registerpage.php'">Rent My Caravan</button>
            </div>
        </div>

        <!--Popup for find a caravan button, telling the user we only offer renting services-->
        <div class="popup" id="popup" style="display:none;">
            <div class="popup-content">
                <span class="closesymbol" onclick="closePopup()">&times;</span>
                <h2>RentMyCaravan is for Caravan Owners!</h2>
                <p>To help find a caravan renter near you Please contact us at <a href="mailto:Hello@RMC.cymru">Hello@RMC.cymru</a></p>
                <p>Or call us at 029 2018 0845</p>
            </div>
        </div>
        <script>
            function helpPopup() {
                document.getElementById("popup").style.display = "block";
            }
            function closePopup() {
                document.getElementById("popup").style.display = "none";
            }
        </script>

<hr>
<!-- fetch database count -->
             <?php
                // Database connection details
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "rentmycaravan";

                // Using MySQLi connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql_statement = "SELECT COUNT(*) AS total_count FROM users";
                $result = $conn->query($sql_statement);

                $total_count = 0; // Default value in case the query fails
                if ($result && $row = $result->fetch_assoc()) {
                    $total_count = $row['total_count'];
                }

                // Close the connection
                $conn->close();
                

            ?>

        <div class ="registeredBlock">
            <h1 class="hero_h1">Join over <?php echo $total_count; ?> happy Renters!</h1>
            </div>
        </div>


<hr>
        <div class ="caravanBlock">
            <h1 class="hero_h1">The best Cardiff Caravans are rented here:</h1>
                <div class="CaravanCardContainer">

                    <div class="CaravanCard">
                        <img class="CardImg" src="Images/Caravan1.jpg" alt="Caravan 1">
                        <h1>Caravana RoadPlus</h1>
                        <h2>Rented 12 times!</ph2>
                    </div>
            
                    <div class="CaravanCard">
                        <img class="CardImg" src="Images/Caravan2.webp" alt="Caravan 2">
                        <h1>Pegasus ProTour</h1>
                        <h2>Rented 8 times!</h2>
                    </div>

                    <div class="CaravanCard">
                        <img class="CardImg" src="Images/Caravan3.jpg" alt="Caravan 3">
                        <h1>Caravanus Maximilius</h1>
                        <h2>Rented 5 times!</h2>
                    </div>

                    <div class="CaravanCard">
                        <img class="CardImg" src="Images/Caravan4.jpg" alt="Caravan 4">
                        <h1>Caravini Luxe</h1>
                        <h2>Rented 8 times!</h2>
                    </div>
                    <div class="CaravanCard">
                        <img class="CardImg" src="Images/Caravan5.jpg" alt="Caravan 5">
                        <h1>Caravini basic</h1>
                        <h2>Rented 3 times!</h2>
                    </div>
            </div>
        </div>



<!-- End Home Body here-->
<!-- Start footer -->
            <div class="footer">
                <div id="footerImg" class="col_4">
                    <img src="Images/WebsiteLogo.png">
                    <p>Made with ❤️ in Caerdydd</p>
                </div>
                <hr>
                <div id="footerPages" class="col_4">
                    <p>Useful Pages:</p>
                    <ul>
                        <li><a href="loginPage.php">Login</a></li>
                        <li><a href="registerPage.php">Register</a></li>
                        <li><a href="about.html">About</a></li>
                    </ul>
                </div>
                <hr>
                <div id="footerContact" class="col_4">
                    <p>📞 029 2018 0845</p>
                    <p>✉️ Hello@RMC.cymru</p>
                    <p>📌 Ty carafan Cardiff, CF00 0FA</p>
                </div>
            </div>
        </div>
        <script src="Scripts/regFormValidation.js"></script>
    </body>
</html>
