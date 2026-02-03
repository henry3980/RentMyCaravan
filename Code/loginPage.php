<?php
session_start(); // Starting Session

?>
<!-- Iestyn's Code -->
<!DOCTYPE html>
<html>
    <link rel="icon" href="Images/WebsiteLogo.png" type="image/png">
    <link rel="stylesheet" href="styles/logAndRegStyle.css">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="mainbody">
            <div class="container_12">
                <div class="header" class="col_12">
                <div id="headerImg" class="col_4">
                    <img src="Images/WebsiteLogo.png">
                </div>
                <div id="headerTitle" class="col_4">
                    <h1>-Welcome To Rent My Caravan-</h1>
                </div>
                <div id="nav" class="col_4">
                    <ul>
                        <a href="home.php">Home</a> |
                        <a href="registerPage.php">Register</a>
                    </ul>
                </div>
            </div>
                <div id="logForm">
                    <form id="loginForm" onsubmit="return formValidation();" method="post" action="Scripts/login.php">
                        <div id="formContainer" class="col_6">
                            <h1><u>Login</u></h1>
                            <label for="username">Username:</label><br>
                            <input type="text" id="username" name="username"><br>
                            <span id="usernameError" style="color:red;"></span><br>
                            <label for="password">Password:</label><br>
                            <input type="password" id="password" name="password"><br>
                            <span id="passwordError" style="color:red;"></span><br>
                            <input type="submit" class="loginbtn" value="Login">
                        </div>
                    </form>
                </div>
                <div id="caravanImg" class="col_6">
                    <img src="Images/CaravanImage.png" class="responsive">
                </div>
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
                        <li><a href="about.html">About Us</a></li>
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
        </div>
        <script src="Scripts/logFormValidation.js"></script>
    </body>
</html>