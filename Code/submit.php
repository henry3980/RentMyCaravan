<?php 
// PHP code to handle the form data

// Check if the form has been submitted and the method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract the form fields into variables
    $usr = isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : ""; // Sanitize input
}

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

// Corrected INSERT statement
$sql_statement = "INSERT INTO `test` (`name`) VALUES ('$usr')";

// Execute the query and check for errors
if ($conn->query($sql_statement) === TRUE) {
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . $sql_statement . "<br>" . $conn->error;
}

// SQL query to fetch data
$sql_statement = "SELECT `name` FROM `test`";
$result = $conn->query($sql_statement);

if ($result && $result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo htmlspecialchars($row['name']) . "<br>"; // Sanitize output
    }
} else {
    echo "No results found.";
}

// Close the connection
$conn->close();
?>