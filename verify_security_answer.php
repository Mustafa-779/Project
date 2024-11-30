<?php
header('Content-Type: application/json');

// Database connection
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'jeek_DB';

$conn = new mysqli($host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit;
}

// Set UTF-8 encoding
$conn->set_charset("utf8");

// Retrieve the username and answer from POST data
$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['username']) || !isset($data['security_answer'])) {
    echo json_encode(['success' => false, 'error' => 'Invalid input data']);
    exit;
}

$username = $conn->real_escape_string(trim($data['username']));
$security_answer = $conn->real_escape_string(trim($data['security_answer']));

// Verify the security answer
$query = "SELECT user_id FROM Users WHERE username = ? AND LOWER(security_answer) = LOWER(?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $username, $security_answer);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Incorrect security answer']);
}

$stmt->close();
$conn->close();
