<?php
// Include the database connection file
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answer = $_POST['answer'];
    $user_id = $_POST['user_id'];

    // Query to get the stored answer for the user
    $sql = "SELECT security_answer FROM Users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stored_answer = $user['security_answer'];

        // Check if the provided answer matches the stored answer
        if ($answer == $stored_answer) {
            // Allow user to reset the password
            echo "
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Reset Password</title>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
            </head>
            <body class='bg-light'>
                <div class='container d-flex justify-content-center align-items-center vh-100'>
                    <div class='card shadow-lg' style='max-width: 500px; width: 100%;'>
                        <div class='card-header text-center bg-success text-white'>
                            <h3>Reset Password</h3>
                        </div>
                        <div class='card-body'>
                            <form action='reset_password.php' method='POST'>
                                <div class='mb-3'>
                                    <label for='new_password' class='form-label'>Enter New Password</label>
                                    <input type='password' class='form-control' name='new_password' required placeholder='New Password' />
                                </div>
                                <input type='hidden' name='user_id' value='$user_id'>
                                <button type='submit' class='btn btn-success w-100'>Reset Password</button>
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
            // Show the modal popup with the error message and a "Return to Homepage" button
            echo "
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Incorrect Answer</title>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
            </head>
            <body class='bg-light'>
                <div class='container d-flex justify-content-center align-items-center vh-100'>
                    <div class='card shadow-lg' style='max-width: 500px; width: 100%;'>
                        <div class='card-header text-center bg-danger text-white'>
                            <h3>Incorrect Answer</h3>
                        </div>
                        <div class='card-body'>
                            <div class='alert alert-danger'>
                                Incorrect answer to the security question!
                            </div>
                            <!-- Return to Homepage Button -->
                            <a href='HomePage.php' class='btn btn-danger w-100'>Return to Homepage</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class='modal fade' id='incorrectAnswerModal' tabindex='-1' aria-labelledby='incorrectAnswerModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='incorrectAnswerModalLabel'>Error</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                Incorrect answer to the security question! Please try again.
                            </div>
                            <div class='modal-footer'>
                                <a href='HomePage.php' class='btn btn-secondary'>Return to Homepage</a>
                            </div>
                        </div>
                    </div>
                </div>

                <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js'></script>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js'></script>
            </body>
            </html>
            ";
        }
    } else {
        echo "
        <div class='container d-flex justify-content-center'>
            <div class='alert alert-danger w-50' role='alert'>
                User not found!
            </div>
        </div>
        ";
    }
}
?>
