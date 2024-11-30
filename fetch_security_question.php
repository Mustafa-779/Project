<?php
header('Content-Type: application/json');

// Database connection
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'jeek_DB';

$conn = new mysqli($host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed.']));
}

// Retrieve the username from POST data
$data = json_decode(file_get_contents("php://input"), true);
$username = $conn->real_escape_string($data['username']);

// Fetch the security question
$query = "SELECT security_question FROM Users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['success' => true, 'security_question' => $row['security_question']]);
} else {
    echo json_encode(['success' => false, 'message' => 'Username not found.']);
}

$stmt->close();
$conn->close();
?>
