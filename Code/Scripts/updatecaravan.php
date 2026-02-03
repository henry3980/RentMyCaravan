<?php 
// PHP code to handle the form data

session_start(); // Start the session
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginPage.php");
}


// Check if the form has been submitted and the method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract the form fields into variables
    $caravan_id = isset($_POST["caravan_id"]) ? htmlspecialchars($_POST["caravan_id"]) : ""; 

    $make = isset($_POST["caravan_Make"]) ? htmlspecialchars($_POST["caravan_Make"]) : "";

    $model = isset($_POST["caravan_Model"]) ? htmlspecialchars($_POST["caravan_Model"]) : ""; 

    $type = isset($_POST["caravan_type"]) ? htmlspecialchars($_POST["caravan_type"]) : ""; 

    $regplate = isset($_POST["caravan_Regplate"]) ? htmlspecialchars($_POST["caravan_Regplate"]) : ""; 

    $fuel = isset($_POST["fuel_type"]) ? htmlspecialchars($_POST["fuel_type"]) : "";

    $mileage = isset($_POST["caravan_Mileage"]) ? htmlspecialchars($_POST["caravan_Mileage"]) : "";

    $location = isset($_POST["caravan_location"]) ? htmlspecialchars($_POST["caravan_location"]) : ""; 

    $year = isset($_POST["caravan_Year"]) ? htmlspecialchars($_POST["caravan_Year"]) : ""; 

    $doors = isset($_POST["caravan_doors"]) ? htmlspecialchars($_POST["caravan_doors"]) : ""; 

    $video = isset($_POST["caravan_video"]) ? htmlspecialchars($_POST["caravan_video"]) : ""; 

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

    // Corrected INSERT statement
    $uid = $_SESSION['user_id'];

    $sql = "UPDATE `vehicle_details` SET `user_id`=?,`caravan_make`=?,`caravan_model`=?,`caravan_bodytype`=?,`caravan_registration`=?,`fuel_type`=?,`mileage`=?,`location`=?,`year`=?,`num_doors`=?,`video_url`=? WHERE `caravan_id` = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

    mysqli_stmt_bind_param($stmt, "isssssssssss", $uid, $make, $model, $type, $regplate, $fuel, $mileage, $location, $year, $doors, $video, $caravan_id);

   mysqli_stmt_execute($stmt);
    
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "New record created successfully.<br>";
    } else {
        echo "Error: " . $sql_statement . "<br>" . $conn->error;
    }



    // Close the connection
    $conn->close();
}



header("Location: /view-caravans.php");
exit();

?>