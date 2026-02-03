<?php
# Iestyn's Code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // User form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $title = $_POST['title'];
    $gender = $_POST['gender'];
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $addressLine1 = $_POST['addressL1'];
    $addressLine2 = $_POST['addressL2'];
    $addressLine3 = $_POST['addressL3'];
    $postcode = $_POST['postcode'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    

    // Database credentials
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "rentmycaravan";

    // Connect to database
    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepared SQL query
    $sql = "INSERT INTO `users` (`username`, `password`, `title`, `first_name`, `last_name`, `gender`, `adress1`, `adress2`, `adress3`, `postcode`, `email`, `telephone`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssss", $username, $hashedPassword, $title, $first_name, $last_name, $gender, $addressLine1, $addressLine2, $addressLine3, $postcode, $email, $phoneNumber);

    if (mysqli_stmt_execute($stmt)) {
        echo "Entries added!";
        header("Location: ../loginPage.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>