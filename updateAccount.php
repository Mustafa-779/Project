<?php
include "db_connection.php";
session_start(); // Start the session to access user data

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Use user_id from session or another unique identifier for the update
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

    $sql = "UPDATE Users SET first_name = '$first_name', last_name = '$last_name', username = '$username', password = '$hashed_password' WHERE user_id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        // Update session variables if necessary
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['username'] = $username;

        header("Location: profile.php");
        exit();
    } else {
        // Redirect with error message
        header("Location: profile.php?error=update_failed");
        exit();
    }
}
