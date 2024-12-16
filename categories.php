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

    <!-- Styles for Navbar and Footer -->
    <link rel="stylesheet" href="css-main/navbar-footer.css">
    <!-- Styles for Cards -->
    <link rel="stylesheet" href="css-main/categorie-styles.css">
    <style>
        /* Placeholder for additional custom styles (inline CSS) */
    </style>
</head>

<!-- Body Section -->

<?php include "Header.php"; ?>


<main class="flex-grow-1">
    <section class="categories">
        <div class="category">
            <a href="art.php">
                <img src="imgs/Art-Bundle.webp" alt="Art">
                <h2>Art</h2>
            </a>
        </div>
        <div class="category">
            <a href="interiors.php">
                <img src="imgs/interior-vintage.jpg" alt="Interiors">
                <h2>Interiors</h2>
            </a>
        </div>
        <div class="category">
            <a href="jewelry.php">
                <img src="imgs/necklace.png" alt="Jewelry">
                <h2>Jewelry</h2>
            </a>
        </div>
        <div class="category">
            <a href="watches.php">
                <img src="imgs/vintage-watch-collection-timeless-view-blue-velvet_905033-32240.png" alt="Watches">
                <h2>Watches</h2>
            </a>
        </div>
        <div class="category">
            <a href="coins.php">
                <img src="imgs/silver coins.jpeg" alt="Coins & Stamps">
                <h2>Coins & Stamps</h2>
            </a>
        </div>
        <div class="category">
            <a href="bookss.php">
                <img src="imgs/books-4k.png" alt="Books & History">
                <h2>Books & History</h2>
            </a>
        </div>
    </section>
</main>

<?php include "Footer.php"; ?>