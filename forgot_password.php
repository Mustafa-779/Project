<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'jeek_DB';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $security_question = $conn->real_escape_string($_POST['security_question']);
    $security_answer = $conn->real_escape_string($_POST['security_answer']);
    $new_password = $_POST['new_password']; // Plain password

    // Step 1: Verify username, security question, and answer
    $query = "SELECT * FROM Users WHERE username = ? AND security_question = ? AND security_answer = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $username, $security_question, $security_answer);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Step 2: Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Step 3: Update the password in the database
        $update_query = "UPDATE Users SET password = ? WHERE username = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param('ss', $hashed_password, $username);
        if ($update_stmt->execute()) {
            echo "<script>alert('Password reset successful!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error updating password. Please try again.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Invalid username or security question/answer. Please try again.'); window.history.back();</script>";
    }
    $stmt->close();
}
$conn->close();
?>
