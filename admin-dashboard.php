<?php
// Include the database connection
require_once 'jeek_DB.php';
session_start();

// Check if the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirect non-admin users to the home page
    header("Location: logged-HomePage.php");
    exit();
}

// Handle item deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_item_id'])) {
    $delete_item_id = intval($_POST['delete_item_id']);
    $delete_sql = "DELETE FROM Products WHERE product_id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_item_id);

    if ($stmt->execute()) {
        echo "<script>alert('Item deleted successfully!');</script>";
    } else {
        echo "<script>alert('Failed to delete the item. Please try again.');</script>";
    }
    $stmt->close();
}

// Fetch products from the database
$sql = "SELECT * FROM Products WHERE status = 'available' ORDER BY quantity ASC LIMIT 6";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
    <form class="d-flex" action="search.php" method="GET">
        <input class="form-control me-2" type="search" name="query" placeholder="Search for items..." aria-label="Search" required>
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
    <h2 class="text-center text-dark mb-4">Available Items</h2>
    <div class="row g-4">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                $name = $row['name'];
                $price = $row['price'];
                $image = $row['image'];
                echo "
                <div class='col-md-4'>
                    <div class='card shadow-sm'>
                        <img src='uploads/$image' class='card-img-top' alt='$name' style='height: 250px; object-fit: cover;'>
                        <div class='card-body'>
                            <h5 class='card-title text-dark'>$name</h5>
                            <p class='card-text text-dark'>Price: $$price</p>
                            <form method='POST' onsubmit='return confirmDeletion()'>
                                <input type='hidden' name='delete_item_id' value='$product_id'>
                                <button type='submit' class='btn btn-danger w-100'>Delete</button>
                            </form>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<p class='text-center text-dark'>No products available at the moment.</p>";
        }
        ?>
    </div>
</main>

<script>
function confirmDeletion() {
    return confirm("Are you sure you want to delete this item?");
}
</script>



<!-- Footer -->
<footer class="mt-auto bg-light py-4">
    <div class="container">
        <div class="row text-center text-md-start">
            <!-- Admin Panel Links -->
            <div class="col-md-4 mb-4">
                <h5 class="text-primary">Admin Panel</h5>
                <ul class="list-unstyled">
                    <li><a href="admin-dashboard.php" class="text-dark text-decoration-none">Dashboard</a></li>
                    <li><a href="manage-users.php" class="text-dark text-decoration-none">Manage Users</a></li>
                    <li><a href="view-reports.php" class="text-dark text-decoration-none">View Reports</a></li>
                    <li><a href="settings.php" class="text-dark text-decoration-none">Settings</a></li>
                </ul>
            </div>

            <!-- Staff Resources -->
            <div class="col-md-4 mb-4">
                <h5 class="text-primary">Staff Resources</h5>
                <ul class="list-unstyled">
                    <li><a href="staff-documents.php" class="text-dark text-decoration-none">Documents</a></li>
                    <li><a href="support-tickets.php" class="text-dark text-decoration-none">Support Tickets</a></li>
                    <li><a href="internal-contacts.php" class="text-dark text-decoration-none">Internal Contacts</a></li>
                    <li><a href="training-materials.php" class="text-dark text-decoration-none">Training Materials</a></li>
                </ul>
            </div>

            <!-- Support Section -->
            <div class="col-md-4 mb-4">
                <h5 class="text-primary">Support</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-telephone me-2"></i><a href="tel:+966119876543" class="text-dark text-decoration-none">+966 (0) 11 9876543</a></li>
                    <li><i class="bi bi-telephone-fill me-2"></i><a href="tel:+966557654321" class="text-dark text-decoration-none">+966 (0) 55 7654321</a></li>
                    <li><i class="bi bi-envelope me-2"></i><a href="mailto:support@jeek.com" class="text-dark text-decoration-none">support@jeek.com</a></li>
                    <li><i class="bi bi-globe me-2"></i><a href="https://admin.jeek.com" target="_blank" class="text-dark text-decoration-none">Admin Portal</a></li>
                </ul>
                <div class="d-flex justify-content-center justify-content-md-start gap-3 mt-3">
                    <a href="https://www.linkedin.com" target="_blank" class="text-dark"><i class="bi bi-linkedin fs-5"></i></a>
                    <a href="https://www.twitter.com" target="_blank" class="text-dark"><i class="bi bi-twitter fs-5"></i></a>
                    <a href="https://www.github.com" target="_blank" class="text-dark"><i class="bi bi-github fs-5"></i></a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="text-center border-top pt-3 mt-3">
            <p class="mb-0">&copy; 2024 Jeek. For Admin and Staff Use Only. Unauthorized access is prohibited.</p>
        </div>
    </div>
</footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
