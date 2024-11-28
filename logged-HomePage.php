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
                <img src="imgs/jeek-high-resolution-logo-transparent.png" alt="Jeek Logo" class="me-2" style="height: 100px; width: 120px;">
                <span class="fs-4 text-white"></span>
            </div>

            <div class="flex-grow-1 mx-3">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search for items..." aria-label="Search">
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
                        <button
                            class="btn btn-outline-light dropdown-toggle"
                            type="button"
                            id="userDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <?= $_SESSION['username'] ?> <i class="bi bi-person-circle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="MyItems.php">My Items</a></li>
                            <li><a class="dropdown-item" href="Favorites.php">Favorites</a></li>
                            <li><a class="dropdown-item" href="NewItem.php">List New Item</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="HomePage.php">Sign Out</a></li>
                        </ul>
                    </div>
                <?php
                else:
                ?>
                    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#signInModal">Login</button>
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
                <a href="art.php" class="icon-link">
                    <!-- Icon representing art -->
                    <i class="bi bi-palette display-4 mb-2"></i>
                    <p>Art</p>
                </a>
            </div>
            <!-- Category: Interiors -->
            <div class="col">
                <a href="interiors.php" class="icon-link">
                    <!-- Icon representing interiors -->
                    <i class="bi bi-house-door display-4 mb-2"></i>
                    <p>Interiors</p>
                </a>
            </div>
            <!-- Category: Jewelry -->
            <div class="col">
                <a href="jewelry.php" class="icon-link">
                    <!-- Icon representing jewelry -->
                    <i class="bi bi-gem display-4 mb-2"></i>
                    <p>Jewelry</p>
                </a>
            </div>
            <!-- Category: Watches -->
            <div class="col">
                <a href="watches.php" class="icon-link">
                    <!-- Icon representing watches -->
                    <i class="bi bi-watch display-4 mb-2"></i>
                    <p>Watches</p>
                </a>
            </div>
            <!-- Category: Coins & Stamps -->
            <div class="col">
                <a href="coins.php" class="icon-link">
                    <!-- Icon representing coins and stamps -->
                    <i class="bi bi-coin display-4 mb-2"></i>
                    <p>Coins & Stamps</p>
                </a>
            </div>
            <!-- Category: Books & History -->
            <div class="col">
                <a href="bookss.php" class="icon-link">
                    <!-- Icon representing books and history -->
                    <i class="bi bi-book display-4 mb-2"></i>
                    <p>Books & History</p>
                </a>
            </div>
        </div>
    </section>

<!-- Categories section -->
<section class="container my-5">
        <div class="row text-center">
            <!-- Categories here, same as your code -->
        </div>
    </section>

   <!-- Popular items section -->
<section class="container mb-5">
    <h2 class="mb-4 text-center text-primary">Popular Items</h2>
    <div class="row g-4">
        <?php
        // Fetch products from the database
        $sql = "SELECT * FROM Products WHERE status = 'available' LIMIT 6"; 
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
                    <a href='product_page.php?id=$product_id' class='card shadow-lg border-0 hover-effect text-decoration-none'>
                        <div class='card-img-overlay text-end p-2'>
                            <span class='badge bg-primary fs-6'>$$price</span>
                        </div>
                        <img src='uploads/$image' class='card-img-top rounded-top' alt='$name'>
                        <div class='card-body text-center'>
                            <h5 class='card-title fw-bold text-primary'>$name</h5>
                            <p class='card-text text-muted'>$description</p>
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
  
<!-- Footer -->
<footer class="mt-auto bg-light py-4">
    <!-- Container to structure the footer content -->
    <div class="container">
        <div class="row">
            <!-- Links Section: Provides quick navigation to important pages -->
            <div class="col-md-4 footer-links">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <!-- List of links to key pages -->
                    <li><a href="logged-HomePage.php">Home</a></li>
                    <li><a href="logged-categories.php">Categories</a></li>
                    <li><a href="logged-about.php">About Us</a></li>
                    <li><a href="logged-contact.php">Contact Us</a></li>
                </ul>
            </div>

            <!-- Middle Section: Highlights specific product categories -->
            <div class="col-md-4 footer-links">
                <h5>Categories</h5>
                <ul class="list-unstyled">
                    <!-- Links to categories offered on the website -->
                    <li><a href="logged-art.php">Art</a></li>
                    <li><a href="logged-interiors.php">Interiors</a></li>
                    <li><a href="logged-jewelry.php">Jewelry</a></li>
                    <li><a href="logged-watches.php">Watches</a></li>
                    <li><a href="logged-coins.php">Coins & Stamps</a></li>
                    <li><a href="logged-bookss.php">Books & History</a></li>
                </ul>
            </div>

            <!-- Contact Details Section -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <!-- Phone numbers -->
                    <li><i class="bi bi-telephone me-2"></i>+966 (0) 55 1234567</li>
                    <li><i class="bi bi-telephone-fill me-2"></i>+966 (0) 0 1234567</li>
                    <!-- Email address with clickable link -->
                    <li>
                        <i class="bi bi-envelope me-2"></i>
                        <a href="mailto:info@storename.com" class="text-dark text-decoration-none">info@Jeek.com</a>
                    </li>
                    <!-- Website URL with clickable link -->
                    <li>
                        <i class="bi bi-globe me-2"></i>
                        <a href="https://www.storename.com" target="_blank" class="text-dark text-decoration-none">www.Jeek.com</a>
                    </li>
                </ul>

                <!-- Social Media Icons Section -->
                <div class="social-icons mt-3">
                    <!-- Instagram icon linking to Instagram profile -->
                    <a href="https://www.instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                    <!-- WhatsApp icon linking to WhatsApp -->
                    <a href="https://www.whatsapp.com" target="_blank"><i class="bi bi-whatsapp"></i></a>
                    <!-- Twitter (X) icon linking to Twitter profile -->
                    <a href="https://www.x.com" target="_blank"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
        </div>

        <!-- Footer bottom section with copyright -->
        <div class="text-center mt-3">
            <p>© 2024 Jeek. All Rights Reserved</p>
        </div>
    </div>
</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include the JavaScript for password confirmation -->
</html>
