<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Link to custom styles for further customization -->
    <link rel="stylesheet" href="css-main/navbar-footer.css">
    <link rel="stylesheet" href="css-main/categorie-styles.css">
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
                            aria-expanded="false">
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
                    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#signInModal">Login</button>
                <?php
                endif;
                ?>
            </nav>
        </div>
    </header>
</body>






<main class="flex-grow-1">
    <section class="categories">
        <div class="category">
            <a href="logged-art.php">
                <img src="imgs/Art-Bundle.webp" alt="Art">
                <h2>Art</h2>
            </a>
        </div>
        <div class="category">
            <a href="logged-interiors.php">
                <img src="imgs/interior-vintage.jpg" alt="Interiors">
                <h2>Interiors</h2>
            </a>
        </div>
        <div class="category">
            <a href="logged-jewelry.php">
                <img src="imgs/necklace.png" alt="Jewelry">
                <h2>Jewelry</h2>
            </a>
        </div>
        <div class="category">
            <a href="logged-watches.php">
                <img src="imgs/vintage-watch-collection-timeless-view-blue-velvet_905033-32240.png" alt="Watches">
                <h2>Watches</h2>
            </a>
        </div>
        <div class="category">
            <a href="logged-coins.php">
                <img src="imgs/silver coins.jpeg" alt="Coins & Stamps">
                <h2>Coins & Stamps</h2>
            </a>
        </div>
        <div class="category">
            <a href="logged-bookss.php">
                <img src="imgs/books-4k.png" alt="Books & History">
                <h2>Books & History</h2>
            </a>
        </div>
    </section>
</main>

<?php include "Footer.php"; ?>