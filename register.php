<?php include "db_connection.php";

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $security_question = mysqli_real_escape_string($conn, $_POST['security_question']);
    $security_answer = mysqli_real_escape_string($conn, $_POST['security_answer']);
    
    // Default role as customer
    $role = 'customer';

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username, email, or phone number already exists
    $check_sql = "SELECT * FROM Users WHERE username='$username' OR email='$email' OR phone_number='$phone_number'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        header("Location: homepage.php?error=regiseration_error");
        exit();
    } else {
        // SQL query to insert data into Users table
        $sql = "INSERT INTO Users (first_name, last_name, username, email, phone_number, password, security_question, security_answer, role, created_at)
                VALUES ('$first_name', '$last_name', '$username', '$email', '$phone_number', '$hashed_password', '$security_question', '$security_answer', '$role', NOW())";

        if ($conn->query($sql) === TRUE) {
            header("Location: HomePage.php");
            exit();
        } else {
            header("Location: homepage.php");
            exit();
        }
    }
}
?>
