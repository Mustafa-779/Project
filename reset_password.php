<?php
$data = json_decode(file_get_contents("php://input"), true);
$new_password = password_hash($data['new_password'], PASSWORD_DEFAULT);

$query = "UPDATE Users SET password = ? WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $new_password, $data['username']);
echo json_encode(['success' => $stmt->execute()]);
?>
