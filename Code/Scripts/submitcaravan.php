<?php 
// PHP code to handle the form data

session_start(); // Start the session
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginPage.php");
}


// Check if the form has been submitted and the method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract the form fields into variables
    
    $make = isset($_POST["caravan_Make"]) ? htmlspecialchars($_POST["caravan_Make"]) : ""; // Sanitize input

    $model = isset($_POST["caravan_Model"]) ? htmlspecialchars($_POST["caravan_Model"]) : ""; // Sanitize input

    $type = isset($_POST["caravan_type"]) ? htmlspecialchars($_POST["caravan_type"]) : ""; // Sanitize input

    $regplate = isset($_POST["caravan_Regplate"]) ? htmlspecialchars($_POST["caravan_Regplate"]) : ""; // Sanitize input

    $fuel = isset($_POST["fuel_type"]) ? htmlspecialchars($_POST["fuel_type"]) : ""; // Sanitize input

    $mileage = isset($_POST["caravan_Mileage"]) ? htmlspecialchars($_POST["caravan_Mileage"]) : ""; // Sanitize input

    $location = isset($_POST["caravan_location"]) ? htmlspecialchars($_POST["caravan_location"]) : ""; // Sanitize input

    $year = isset($_POST["caravan_Year"]) ? htmlspecialchars($_POST["caravan_Year"]) : ""; // Sanitize input

    $doors = isset($_POST["caravan_doors"]) ? htmlspecialchars($_POST["caravan_doors"]) : ""; // Sanitize input

    $video = isset($_POST["caravan_video"]) ? htmlspecialchars($_POST["caravan_video"]) : ""; // Sanitize input

    $picture = isset($_FILES["caravan_picture"]) ? htmlspecialchars($_FILES["caravan_picture"]["name"]) : ""; // Sanitize input

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

    //deal with the file upload

    $target_dir = "/uploads/";
    $target_file = $target_dir.basename($_FILES["caravan_picture"]["name"]);
    
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    }
    
    // If everything is ok, try to upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["caravan_picture"]["tmp_name"], __DIR__.$target_file)) {
            $picturename = basename($_FILES["caravan_picture"]["name"]);
            echo "The file " . $picturename . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    //INSERT query
    $uid = $_SESSION['user_id'];

    $sql = "INSERT INTO `vehicle_details` (user_id, caravan_make, caravan_model, caravan_bodytype, caravan_registration, fuel_type, mileage, location, year, num_doors, video_url, image_url) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

    mysqli_stmt_bind_param($stmt, "isssssssssss", $uid, $make, $model, $type, $regplate, $fuel, $mileage, $location, $year, $doors, $video, $target_file);

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