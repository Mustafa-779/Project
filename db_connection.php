<?php
// db_connection.php

$servername = "localhost";  // Your MySQL server, usually "localhost"
$username = "root";         // Your MySQL username, typically "root"
$password = "";             // Your MySQL password, typically empty for localhost
$dbname = "jeek_DB";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
