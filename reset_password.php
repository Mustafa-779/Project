<?php
// Include the database connection file
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $user_id = $_POST['user_id'];

    // Hash the new password before storing it
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Update the password in the database
    $sql = "UPDATE Users SET password = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashed_password, $user_id);
    $stmt->execute();

    echo "
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Password Reset Confirmation</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    </head>
    <body class='bg-light'>
        <div class='container d-flex justify-content-center align-items-center vh-100'>
            <div class='card shadow-lg' style='max-width: 500px; width: 100%;'>
                <div class='card-header text-center bg-success text-white'>
                    <h3>Password Reset Success</h3>
                </div>
                <div class='card-body'>
                    <div class='alert alert-success text-center' role='alert'>
                        Your password has been successfully reset!
                    </div>
                    <a href='HomePage.php' class='btn btn-primary w-100'>Go to Login</a>
                </div>
            </div>
        </div>
        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js'></script>
    </body>
    </html>
    ";
}
?>
