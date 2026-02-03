<!-- Iestyn's Code -->
<!DOCTYPE html>
<html>
    <link rel="icon" href="Images/WebsiteLogo.png" type="image/png">
    <link rel="stylesheet" href="styles/logAndRegStyle.css">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="mainbody">
            <div class="container_12">
                 <div class="header">
                <div id="headerImg" class="col_4">
                    <a href="homePage">
                        <img src="Images/WebsiteLogo.png">
                    </a>
                </div>
                <div id="headerTitle" class="col_4">
                    <h1>-Welcome To Rent My Caravan-</h1>
                </div>
                <div id="nav" class="col_4">
                    <ul>
                        <a style="font-family: Quicksand;" href="home.php">Home</a> |
                        <a style="font-family: Quicksand;" href="loginPage.php">Login</a>
                    </ul>
                </div>
            </div>
                <div id="registerHeader" class="col_12">
                    <h1><u>Register</u></h1>
                </div>
                <div id="regForm" class="col_12">
                    <form id="registerForm" onsubmit="return formValidation();" action="Scripts/register.php" method="post">
                        <div id="formContainerL" class="col_6">
                            <label for="username">Username:</label><br>
                            <input type="text" id="username" name="username"><br>
                            <span id="usernameError" style="color:red;"></span><br>
                            <label for="password">Password:</label><br>
                            <input type="password" id="password" name="password"><br>
                            <span id="passwordError" style="color:red;"></span><br>
                            <label for="email">E-mail Address:</label><br>
                            <input type="text" id="email" name="email"><br>
                            <span id="emailError" style="color:red;"></span><br>
                            <label for="phoneNumber">Phone Number:</label><br>
                            <input type="text" id="phoneNumber" name="phoneNumber"><br>
                            <span id="phoneNumberError" style="color:red;"></span><br>
                            <label for="title">Title:</label><br>
                            <select id="title" name="title">
                                <option value="mr">Mr</option>
                                <option value="mrs">Mrs</option>
                                <option value="miss">Miss</option>
                                <option value="ms">Ms</option>
                            </select><br>
                            <span id="titleError" style="color:red;"></span><br>
                            <label for="gender">Gender:</label><br>
                            <input type="text" id="gender" name="gender"><br>
                            <span id="genderError" style="color:red;"></span><br>
                        </div>
                        <div id="formContainerR" class="col_6">
                            <label for="firstName">First Name:</label><br>
                            <input type="text" id="firstName" name="firstName"><br>
                            <span id="firstNameError" style="color:red;"></span><br>
                            <label for="lastName">Last Name:</label><br>
                            <input type="text" id="lastName" name="lastName"><br>
                            <span id="lastNameError" style="color:red;"></span><br>
                            <label for="addressL1">Address Line 1:</label><br>
                            <input type="text" id="addressL1" name="addressL1"><br>
                            <span id="addressL1Error" style="color:red;"></span><br>
                            <label for="addressL2">Address Line 2:</label><br>
                            <input type="text" id="addressL2" name="addressL2"><br>
                            <span id="addressL2Error" style="color:red;"></span><br>
                            <label for="addressL3">Address Line 3:</label><br>
                            <input type="text" id="addressL3" name="addressL3"><br>
                            <span id="addressL3Error" style="color:red;"></span><br>
                            <label for="postcode">Postcode:</label><br>
                            <input type="text" id="postcode" name="postcode"><br>
                            <span id="postcodeError" style="color:red;"></span><br>
                        </div>
                        <input type="submit" class="registerbtn" value="Register">
                    </form>
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
        <script src="Scripts/regFormValidation.js"></script>
    </body>
</html>
