<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bscs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
    // Continue with your code here, since the connection was successful
}
?>
