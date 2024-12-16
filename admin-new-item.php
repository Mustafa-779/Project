<?php
// Include the database connection
require_once 'jeek_DB.php';

session_start();

// Ensure the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: logged-HomePage.php");
    exit();
}

// Initialize variables for error/success messages
$message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    $image = isset($_FILES['image']['name']) && !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : "default.jpg";
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    if (!empty($_FILES['image']['name']) && !move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $message = "Error uploading the image.";
        $image = "default.jpg";
    }

    $categoryQuery = $conn->prepare("SELECT categorie_id FROM Categories WHERE LOWER(name) = LOWER(?)");
    $categoryQuery->bind_param("s", $category);
    $categoryQuery->execute();
    $categoryResult = $categoryQuery->get_result();

    if ($categoryResult->num_rows > 0) {
        $category_id = $categoryResult->fetch_assoc()['categorie_id'];

        $sql = $conn->prepare("INSERT INTO Products (categorie_id, name, price, description, image, quantity, status) 
                                VALUES (?, ?, ?, ?, ?, ?, 'available')");
        $sql->bind_param("isdssi", $category_id, $name, $price, $description, $image, $quantity);

        if ($sql->execute()) {
            $message = "Item added successfully!";
        } else {
            $message = "Error adding item: " . $conn->error;
        }
    } else {
        $message = "Error: Selected category does not exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin add new item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css-main/navbar-footer.css">
    <link rel="stylesheet" href="css-main/cards.css">
    <style>

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom border-secondary">
    <div class="container">
        <!-- Logo Section -->
        <div class="d-flex align-items-center">
            <img src="imgs/jeek-high-resolution-logo-transparent.png" alt="Jeek Logo" class="me-2"
                style="height: 100px; width: 80px;">
            <span class="fs-4 text-white"></span>
        </div>

        <!-- Search Bar -->
        <div class="flex-grow-1 mx-3">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search for items..."
                    aria-label="Search">
                <button class="btn btn-outline-light" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="admin-dashboard.php">Dashboard</a>
                </li>
                <!-- Manage Users -->
                <li class="nav-item">
                    <a class="nav-link" href="manage-users.php">Manage Users</a>
                </li>
                <!-- View Reports -->
                <li class="nav-item">
                    <a class="nav-link" href="view-reports.php">Comments & Reviews</a>
                </li>
                <!-- Add Item -->
                <li class="nav-item">
                    <a class="nav-link" href="admin-new-item.php">Add Item</a>
                </li>
                <!-- Profile -->
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
                        <?= $_SESSION['username'] ?>
                    </a>
                </li>
                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <main class="container my-5">
        <?php if ($message): ?>
            <div class="alert alert-info text-center">
                <?= $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="bg-light p-5 rounded shadow-sm">
            <h2 class="text-primary mb-4">Item Details</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Item Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                <select name="category" id="category" class="form-select" required>
                    <option value="" selected disabled>Select a category</option>
                    <option value="Art">Art</option>
                    <option value="Jewelry">Jewelry</option>
                    <option value="Books & History">Books & History</option>
                    <option value="Coins & Stamps">Coins & Stamps</option>
                    <option value="Interiors">Interiors</option>
                    <option value="Watches">Watches</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit Item</button>
        </form>
    </main>

<!-- Footer -->
<footer class="mt-auto bg-light py-4">
    <!-- Container to structure the footer content -->
    <div class="container">
        <div class="row">
            <!-- Links Section: Provides navigation to admin-specific pages -->
            <div class="col-md-4 footer-links">
                <h5>Admin Panel</h5>
                <ul class="list-unstyled">
                    <!-- List of links to key admin pages -->
                    <li><a href="admin-dashboard.php">Dashboard</a></li>
                    <li><a href="manage-users.php">Manage Users</a></li>
                    <li><a href="view-reports.php">View Reports</a></li>
                    <li><a href="settings.php">Settings</a></li>
                </ul>
            </div>

            <!-- Middle Section: Quick access for staff -->
            <div class="col-md-4 footer-links">
                <h5>Staff Resources</h5>
                <ul class="list-unstyled">
                    <!-- Links to staff-specific resources -->
                    <li><a href="staff-documents.php">Documents</a></li>
                    <li><a href="support-tickets.php">Support Tickets</a></li>
                    <li><a href="internal-contacts.php">Internal Contacts</a></li>
                    <li><a href="training-materials.php">Training Materials</a></li>
                </ul>
            </div>

            <!-- Contact Details Section -->
            <div class="col-md-4">
                <h5>Support</h5>
                <ul class="list-unstyled">
                    <!-- Phone numbers for internal support -->
                    <li><i class="bi bi-telephone me-2"></i>+966 (0) 11 9876543</li>
                    <li><i class="bi bi-telephone-fill me-2"></i>+966 (0) 55 7654321</li>
                    <!-- Email address with clickable link -->
                    <li>
                        <i class="bi bi-envelope me-2"></i>
                        <a href="mailto:support@jeek.com" class="text-dark text-decoration-none">support@jeek.com</a>
                    </li>
                    <!-- Internal support portal -->
                    <li>
                        <i class="bi bi-globe me-2"></i>
                        <a href="https://admin.jeek.com" target="_blank" class="text-dark text-decoration-none">Admin Portal</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer bottom section with restricted access message -->
        <div class="text-center mt-3">
            <p>© 2024 Jeek. For Admin and Staff Use Only. Unauthorized access is prohibited.</p>
        </div>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
