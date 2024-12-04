<?php
// Handle the forgot password request
$data = json_decode(file_get_contents('php://input'), true);

$email = $data['email'];
$security_question = $data['security_question'];
$security_answer = $data['security_answer'];

// Establish the database connection
$connection = mysqli_connect('localhost', 'username', 'password', 'database_name'); // Update with actual details

if (!$connection) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

// Use a prepared statement to prevent SQL injection
$query = "SELECT * FROM users WHERE email = ? AND security_question = ? AND security_answer = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'sss', $email, $security_question, $security_answer);

// Execute the query
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the result is found
if ($result && mysqli_num_rows($result) > 0) {
    echo json_encode(['success' => true, 'message' => 'Answer is correct']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid answer or email']);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
