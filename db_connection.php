<?php
session_start();

// Database credentials
$host = 'localhost';
$username = 'root'; 
$password = '';     
$dbname = 'jeek_DB';

$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>