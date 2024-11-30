<?php
// Include the database connection
require_once 'jeek_DB.php';

// Fetch products from the database
$sql = "SELECT * FROM Products WHERE status = 'available' LIMIT 6"; // Adjust the query as needed
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
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Navbar Section -->
    <header class="bg-primary py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="imgs/jeek-high-resolution-logo-transparent.png" alt="Jeek Logo" class="me-2" style="height: 100px; width: auto;">
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

    <section class="container my-5">
    <div class="row text-center">
        <!-- Category: Art -->
        <div class="col">
            <a href="logged-art.php" class="icon-link">
                <i class="bi bi-palette display-4 mb-2"></i>
                <p>Art</p>
            </a>
        </div>
        <!-- Category: Interiors -->
        <div class="col">
            <a href="logged-interiors.php" class="icon-link">
                <i class="bi bi-house-door display-4 mb-2"></i>
                <p>Interiors</p>
            </a>
        </div>
        <!-- Category: Jewelry -->
        <div class="col">
            <a href="logged-jewelry.php" class="icon-link">
                <i class="bi bi-gem display-4 mb-2"></i>
                <p>Jewelry</p>
            </a>
        </div>
        <!-- Category: Watches -->
        <div class="col">
            <a href="logged-watches.php" class="icon-link">
                <i class="bi bi-watch display-4 mb-2"></i>
                <p>Watches</p>
            </a>
        </div>
        <!-- Category: Coins & Stamps -->
        <div class="col">
            <a href="logged-coins.php" class="icon-link">
                <i class="bi bi-coin display-4 mb-2"></i>
                <p>Coins & Stamps</p>
            </a>
        </div>
        <!-- Category: Books & History -->
        <div class="col">
            <a href="logged-bookss.php" class="icon-link">
                <i class="bi bi-book display-4 mb-2"></i>
                <p>Books & History</p>
            </a>
        </div>
    </div>
</section>

<h1 class="text-center mb-4">Art</h1>
<div class="row g-4">


 <!-- Replace the inner <main> with <section> -->
 <section class="flex-grow-1">
        <section class="container my-5">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php
            // Fetch products from the database where category_id is 1
            $sql = "SELECT * FROM Products WHERE status = 'available' AND categorie_id = 1"; 
            $result = $conn->query($sql);

            // Loop through products and display them in cards
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product_id = $row['product_id']; // Assuming the primary key is product_id
                    $name = $row['name'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image = $row['image'];

                    // Use a fixed color for the badge
                    $fixedColor = 'primary';

                    echo "
                    <div class='col'>
                        <div class='card shadow-lg border-0 position-relative hover-effect' style='width: 100%; max-width: 30rem; cursor: pointer; transition: transform 0.3s ease;'>
                            <a href='logged-product_page.php?id=$product_id' class='text-decoration-none' style='color: inherit;'>
                                <div class='card-img-overlay text-end p-2'>
                                    <span class='badge bg-$fixedColor' style='font-size: 1rem; padding: 0.5rem 1rem; border-radius: 0.5rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);'>$$price</span>
                                </div>
                                <img src='uploads/$image' class='card-img-top' alt='$name' style='height: 25rem; object-fit: cover; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;'>
                                <div class='card-body text-center'>
                                    <h5 class='card-title text-primary'>$name</h5>
                                    <a href='#' class='btn btn-outline-secondary'>View</a>
                                </div>
                            </a>
                        </div>
                    </div>
                    ";
                }
            } else {
                echo "<p>No products available at the moment.</p>";
            }
            ?>
            </div>
        </section>
    </section>
</main>











    <footer class="mt-auto bg-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-links">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="logged-HomePage.php">Home</a></li>
                        <li><a href="logged-categories.php">Categories</a></li>
                        <li><a href="logged-about.php">About Us</a></li>
                        <li><a href="logged-contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-links">
                    <h5>Categories</h5>
                    <ul class="list-unstyled">
                        <li><a href="logged-art.php">Art</a></li>
                        <li><a href="logged-interiors.php">Interiors</a></li>
                        <li><a href="logged-jewelry.php">Jewelry</a></li>
                        <li><a href="logged-watches.php">Watches</a></li>
                        <li><a href="logged-coins.php">Coins & Stamps</a></li>
                        <li><a href="logged-bookss.php">Books & History</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-telephone me-2"></i>+966 (0) 55 1234567</li>
                        <li><i class="bi bi-envelope me-2"></i><a href="mailto:info@Jeek.com" class="text-dark text-decoration-none">info@Jeek.com</a></li>
                        <li><i class="bi bi-globe me-2"></i><a href="https://www.storename.com" target="_blank" class="text-dark text-decoration-none">www.Jeek.com</a></li>
                    </ul>
                    <div class="social-icons mt-3">
                        <a href="https://www.instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.whatsapp.com" target="_blank"><i class="bi bi-whatsapp"></i></a>
                        <a href="https://www.x.com" target="_blank"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>© 2024 Jeek. All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
