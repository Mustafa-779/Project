<?php
// Start the session to manage user login after registration
session_start();

// Database credentials
$host = 'localhost';
$username = 'root';  // Your MySQL username
$password = '';      // Your MySQL password
$dbname = 'jeek_DB'; // Database name

// Create a connection to MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize it
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);  // Added phone number
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $security_question = mysqli_real_escape_string($conn, $_POST['security_question']);
    $security_answer = mysqli_real_escape_string($conn, $_POST['security_answer']);
    
    // Default role as customer
    $role = 'customer';

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into Users table
    $sql = "INSERT INTO Users (first_name, last_name, username, email, phone_number, password, security_question, security_answer, role, created_at)
            VALUES ('$first_name', '$last_name', '$username', '$email', '$phone_number', '$hashed_password', '$security_question', '$security_answer', '$role', NOW())";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
