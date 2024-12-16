<!DOCTYPE html>
< lang="en">
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
    <link rel="stylesheet" href="css-main/cards.css">
    <style>
        /* Placeholder for additional custom styles (inline CSS) */
    </style>
</head>

<!-- Body Section -->

<?php include "Header.php"; ?>

<!-- about Section -->
<main class="container my-5 flex-grow-1">
    <section>
        <h2 class="text-center">About Us</h2>
        <p class="mt-4">
            Welcome to Jeek, the ultimate destination for collectors and enthusiasts of rare and unique items.
            In today’s digital age, we bridge the gap between passionate collectors and owners of coveted artifacts,
            offering a seamless and engaging platform to discover and acquire extraordinary treasures.
        </p>
        <p>
            Our mission is to celebrate the rarity, historical significance, and investment potential of these unique items.
            By combining high-quality imagery, detailed product descriptions, and user-friendly navigation,
            we strive to create a superior shopping experience backed by trustworthy policies to ensure your confidence and satisfaction.
        </p>
        <ul>
            <li><strong>Comprehensive Search Tools:</strong> Easily find the items you’re looking for.</li>
            <li><strong>Dynamic Marketplace:</strong> Buy and sell rare items in an interactive environment.</li>
            <li><strong>Community Hub:</strong> Access expert insights, forums, and articles to deepen your knowledge and connect with fellow collectors.</li>
        </ul>
        <p>
            At Jeek, we aim to build a vibrant community united by a shared passion for rare items while providing an unparalleled resource for enriching your collections. Join us in exploring the extraordinary.
        </p>
    </section>
</main>


<?php include "Footer.php"; ?>