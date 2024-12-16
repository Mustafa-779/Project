<?php
// Start session to keep track of the user once logged in
session_start();

// Database credentials
$host = 'localhost';
$username = 'root';  // Use your MySQL username here
$password = '';      // Use your MySQL password here (default is empty for XAMPP/WAMP)
$dbname = 'jeek_DB'; // Database name

// Create connection to MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data (sanitize to prevent SQL injection)
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if the user exists in the database
    $sql = "SELECT * FROM Users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, fetch the data
        $row = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];  // Assuming 'role' column is 'admin', 'staff', or 'customer'

            // Check the user's role and redirect accordingly
            if ($row['role'] === 'admin') {
                // Redirect admin to the admin dashboard
                header("Location: admin-dashboard.php");
                exit();
            } elseif ($row['role'] === 'staff') {
                // Redirect staff to the staff dashboard
                header("Location: staff-dashboard.php");
                exit();
            } else {
                // Redirect customer to the home page
                header("Location: logged-HomePage.php");
                exit();
            }
        } else {
            // Invalid password
            echo "Invalid password.";
        }
    } else {
        // User not found
        echo "No user found with this username.";
    }

    // Close connection
    $conn->close();
}
?>
