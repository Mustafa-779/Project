<?php
// Include the database connection
require_once 'jeek_DB.php';

// Fetch products from the database
$sql = "SELECT * FROM Products WHERE status = 'available' LIMIT 6"; // Adjust the query as needed (LIMIT 6 for the first 6 items)
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head Section: Contains metadata and external resource links -->

<head>
    <!-- Sets the character encoding for the document to UTF-8 (standard for web content) -->
    <meta charset="UTF-8">
    <!-- Ensures responsive design for all devices (mobile-first design) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the webpage, displayed on the browser tab -->
    <title>Home Page</title>
    <!-- Link to Bootstrap CSS for styling and responsive utilities -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to Bootstrap Icons for using pre-designed vector icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles for Navbar and Footer -->
    <link rel="stylesheet" href="css-main/navbar-footer.css">
    <!-- Styles for Cards -->
    <link rel="stylesheet" href="css-main/cards.css">
    <style>
        /* Placeholder for additional custom styles (inline CSS) */
    </style>
</head>

<!-- Body Section -->

<?php include "Header.php"; ?>

<!-- Main content section -->
<main class="flex-grow-1">
    <!-- Introductory message -->
    <div class="bg-info text-white text-center py-4">
        <!-- Highlighted message for users -->
        <h1 class="fs-5">
            Step into a World of Rarity: Discover Unique Artifacts and Connect with Fellow Collectors!
        </h1>
    </div>

    <!-- Categories section -->

    <section class="container my-5">
        <div class="row text-center">
            <div class="col">
                <a href="art.php" class="icon-link" id="art-link">
                    <i class="bi bi-palette display-4 mb-2"></i>
                    <p class="fw-normal">Art</p>
                </a>
            </div>
            <div class="col">
                <a href="interiors.php" class="icon-link" id="interiors-link">
                    <i class="bi bi-house-door display-4 mb-2"></i>
                    <p class="fw-normal">Interiors</p>
                </a>
            </div>
            <div class="col">
                <a href="jewelry.php" class="icon-link" id="jewelry-link">
                    <i class="bi bi-gem display-4 mb-2"></i>
                    <p class="fw-normal">Jewelry</p>
                </a>
            </div>
            <div class="col">
                <a href="watches.php" class="icon-link" id="watches-link">
                    <i class="bi bi-watch display-4 mb-2"></i>
                    <p class="fw-normal">Watches</p>
                </a>
            </div>
            <div class="col">
                <a href="coins.php" class="icon-link" id="coins-link">
                    <i class="bi bi-coin display-4 mb-2"></i>
                    <p class="fw-normal">Coins & Stamps</p>
                </a>
            </div>
            <div class="col">
                <a href="bookss.php" class="icon-link" id="books-link">
                    <i class="bi bi-book display-4 mb-2"></i>
                    <p class="fw-normal">Books & History</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Popular items section -->
    <section class="container mb-5">
        <h2 class="mb-4 text-center text-primary">Popular Items</h2>
        <div class="row g-4">
            <?php
            // Fetch products with the least quantity from the database
            $sql = "SELECT * FROM Products WHERE status = 'available' ORDER BY quantity ASC LIMIT 6";
            $result = $conn->query($sql);

            // Loop through products and display them in cards
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product_id = $row['product_id']; // Assuming the primary key is product_id
                    $name = $row['name'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image = $row['image'];

                    // Link to the product details page with the product ID
                    echo "
                <div class='col-md-4'>
                    <a href='logged-product_page.php?id=$product_id' class='card shadow-lg border-0 hover-effect text-decoration-none'>
                        <div class='card-img-overlay text-end p-2'>
                            <span class='badge bg-primary fs-6'>$$price</span>
                        </div>
                        <img src='uploads/$image' class='card-img-top' alt='$name' style='height: 25rem; object-fit: cover; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;'>
                        <div class='card-body text-center'>
                            <h5 class='card-title fw-bold text-primary'>$name</h5>
                        </div>
                    </a>
                </div>
                ";
                }
            } else {
                echo "<p>No products available at the moment.</p>";
            }
            ?>
        </div>
    </section>

</main>

<?php include "Footer.php"; ?>