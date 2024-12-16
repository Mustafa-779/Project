<?php include "db_connection.php";

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE Users SET first_name = '$first_name',  last_name = '$last_name', username = '$username', password = '$hashed_password'
                WHERE username='$username'";

        if ($conn->query($sql) === TRUE) {
            header("Location: Profile.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>
