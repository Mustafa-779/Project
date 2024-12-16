<?php include "db_connection.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_id = $_SESSION['user_id'];
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);

        // Check if the directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true); // Create the directory if it doesn't exist
        }

        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // File uploaded successfully
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        // Handle the case where no file was uploaded or there was an error
        //header("Location: newItem.php?insertion_error");
        echo 'File upload error: ' . $_FILES['image']['error'];
    }

    $categoryQuery = $conn->prepare("SELECT categorie_id FROM Categories WHERE LOWER(name) = LOWER(?)");
    $categoryQuery->bind_param("s", $category);
    $categoryQuery->execute();
    $categoryResult = $categoryQuery->get_result();

    if ($categoryResult->num_rows > 0) {
        $category_id = $categoryResult->fetch_assoc()['categorie_id'];

        // Insert the new item into the Products table
        $sql = $conn->prepare("INSERT INTO Products (user_id, categorie_id, name, price, description, image, quantity, status) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, 'available')");

        $sql->bind_param("iisdsii", $user_id, $category_id, $name, $price, $description, $image, $quantity);
        try {
            if ($sql->execute()) {
                header("Location: newItem.php?successful");
                exit();
            } else {
                header("Location: newItem.php?error=insertion_error");
                exit();
            }
        } catch (mysqli_sql_exception $e) {
            echo "" . $e->getMessage() . "";
            //header("Location: newItem.php?error=sql_error");
            //exit();
        }
    } else {
        header("Location: newItem.php?error=insertion_error1");
        exit();
    }
}
