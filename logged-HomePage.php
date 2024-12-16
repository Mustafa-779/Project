<?php
// Include the database connection
require_once 'jeek_DB.php';

// Fetch products from the database
$sql = "SELECT * FROM Products WHERE status = 'available' LIMIT 6"; // Adjust the query as needed (LIMIT 6 for the first 6 items)
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css-main/navbar-footer.css">
    <link rel="stylesheet" href="css-main/cards.css">
    <style>
        /* Placeholder for additional custom styles (inline CSS) */
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar Section -->
    <header class="bg-primary py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="imgs/jeek-high-resolution-logo-transparent.png" alt="Jeek Logo" class="me-2"
                    style="height: 100px; width: 120px;">
                <span class="fs-4 text-white"></span>
            </div>

            <div class="flex-grow-1 mx-3">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search for items..."
                        aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            <!-- Updated Navbar with Dropdown -->
            <nav class="d-flex align-items-center">
                <ul class="nav me-3">
                    <li class="nav-item"><a href="logged-HomePage.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="logged-categories.php" class="nav-link text-white">Categories</a></li>
                    <li class="nav-item"><a href="logged-about.php" class="nav-link text-white">About</a></li>
                    <li class="nav-item"><a href="logged-contact.php" class="nav-link text-white">Contact Us</a></li>
                </ul>

                <?php
                session_start();
                if (isset($_SESSION['username'])):
                ?>
                    <!-- Dropdown menu for logged-in user -->
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['username'] ?> <i class="bi bi-person-circle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="MyItems.php">My Items</a></li>
                            <li><a class="dropdown-item" href="Favorites.php">Favorites</a></li>
                            <li><a class="dropdown-item" href="NewItem.php">List New Item</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="HomePage.php">Sign Out</a></li>
                        </ul>
                    </div>
                <?php
                else:
                ?>
                    <button class="btn btn-outline-light" data-bs-toggle="modal"
                        data-bs-target="#signInModal">Login</button>
                <?php
                endif;
                ?>
            </nav>
        </div>
    </header>
</body>


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
        <!-- Row to organize categories horizontally -->
        <div class="row text-center">
            <!-- Category: Art -->
            <div class="col">
                <!-- Link with an icon and label -->
                <a href="logged-art.php" class="icon-link">
                    <!-- Icon representing art -->
                    <i class="bi bi-palette display-4 mb-2"></i>
                    <p>Art</p>
                </a>
            </div>
            <!-- Category: Interiors -->
            <div class="col">
                <a href="logged-interiors.php" class="icon-link">
                    <!-- Icon representing interiors -->
                    <i class="bi bi-house-door display-4 mb-2"></i>
                    <p>Interiors</p>
                </a>
            </div>
            <!-- Category: Jewelry -->
            <div class="col">
                <a href="logged-jewelry.php" class="icon-link">
                    <!-- Icon representing jewelry -->
                    <i class="bi bi-gem display-4 mb-2"></i>
                    <p>Jewelry</p>
                </a>
            </div>
            <!-- Category: Watches -->
            <div class="col">
                <a href="logged-watches.php" class="icon-link">
                    <!-- Icon representing watches -->
                    <i class="bi bi-watch display-4 mb-2"></i>
                    <p>Watches</p>
                </a>
            </div>
            <!-- Category: Coins & Stamps -->
            <div class="col">
                <a href="logged-coins.php" class="icon-link">
                    <!-- Icon representing coins and stamps -->
                    <i class="bi bi-coin display-4 mb-2"></i>
                    <p>Coins & Stamps</p>
                </a>
            </div>
            <!-- Category: Books & History -->
            <div class="col">
                <a href="logged-bookss.php" class="icon-link">
                    <!-- Icon representing books and history -->
                    <i class="bi bi-book display-4 mb-2"></i>
                    <p>Books & History</p>
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