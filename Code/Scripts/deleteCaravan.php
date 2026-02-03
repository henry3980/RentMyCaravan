<?php 

session_start(); // Start the session
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginPage.php");
}


if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Extract the form fields into variables
    
    $CaravanToDelete = $_GET["id"];

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

    $sql = "DELETE FROM `vehicle_details` WHERE `caravan_id` = $CaravanToDelete";
    echo $sql;

    if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    $conn->commit();
    } else {
    echo "Error deleting record: " . $conn->error;
    }
}
// Close the connection
$conn->close();

header("Location: /view-caravans.php");
exit();

?>