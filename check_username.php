<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reset_password = $_POST['reset_password'];

    // Query to get the user based on username or email
    $sql = "SELECT * FROM Users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $reset_password, $reset_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User exists, retrieve security question
        $user = $result->fetch_assoc();
        $security_question = $user['security_question'];
        $user_id = $user['user_id']; // Store the user ID to use later
        
        // Show the security question form
        echo "
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Password Reset</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body class='bg-light'>
            <div class='container d-flex justify-content-center align-items-center vh-100'>
                <div class='card shadow-lg' style='max-width: 500px; width: 100%;'>
                    <div class='card-header text-center bg-primary text-white'>
                        <h3>Password Reset</h3>
                    </div>
                    <div class='card-body'>
                        <form action='verify_answer.php' method='POST'>
                            <div class='mb-3'>
                                <label for='answer' class='form-label'>$security_question</label>
                                <input type='text' class='form-control' name='answer' required placeholder='Enter your answer' />
                            </div>
                            <input type='hidden' name='user_id' value='$user_id'>
                            <button type='submit' class='btn btn-primary w-100'>Submit Answer</button>
                        </form>
                    </div>
                </div>
            </div>
            <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js'></script>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js'></script>
        </body>
        </html>
        ";
    } else {
        echo "
        <div class='container d-flex justify-content-center'>
            <div class='alert alert-danger w-50' role='alert'>
                No user found with that username or email!
            </div>
        </div>
        ";
    }
}
?>