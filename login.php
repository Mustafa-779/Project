<?php include "db_connection.php"; 

// Check if form data is received
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data (sanitize)
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if the user exists
    $sql = "SELECT * FROM Users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, fetch the data
        $row = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables and redirect
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone_number'] = $row['phone_number'];
            $_SESSION['role'] = $row['role'];
            header("Location: logged-HomePage.php");
            exit();
        } else {
            // Invalid password
            header("Location: homepage.php?error=invalid_password");
            exit();
        }
    } else {
        // User not found
        header("Location: homepage.php?error=user_not_found");
        exit();
    }
}
?>