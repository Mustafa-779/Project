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

    

    <main class="flex-grow-1 my-5">

        
        <div class="container">
            <!-- Item Section -->
            <section class="row align-items-center">
                <!-- Left Side: Image and Item Name -->
                <div class="col-md-6 text-center">
                    <h2 class="mb-4 fw-bold text-primary">3 Eyes Gold Geneva Casual Quartz Watch</h2>
                    <p class="fs-4 text-danger fw-bold m-0">
                        <i class="bi bi-tag-fill me-2"></i>$1177
                    </p>
                    <img src="imgs/Goldwatch.jpg" alt="Item Image" class="img-fluid rounded shadow">
                </div>
    
                <!-- Right Side: Description and Details -->
                <div class="col-md-6">
                    <!-- Description Section -->
                    <div class="mb-4">
                        <h4 class="fw-bold text-secondary">Description</h4>
                        <p class="text-muted">
                            This luxurious gold watch is crafted with precision and style. Its timeless design complements any outfit, making it a perfect accessory for any occasion. Experience unmatched elegance and functionality.
                        </p>
                    </div>
    
                    <!-- Rating Section -->
                    <div class="mb-4">
                        <h5 class="fw-bold text-secondary">Rating</h5>
                        <div class="d-flex align-items-center">
                            <span class="text-warning fs-4 me-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </span>
                            <span class="text-muted">(4.5/5)</span>
                        </div>
                    </div>
    
                    <!-- Additional Details -->
                    <div class="mb-4">
                        <h5 class="fw-bold text-secondary">Features</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Water-resistant</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>High-precision quartz movement</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Scratch-resistant</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Two-year warranty</li>
                        </ul>
                    </div>
    
                    <!-- Buttons -->
                    <div class="d-flex gap-3">
                        <button class="btn btn-outline-primary btn-lg w-50">
                            <i class="bi bi-heart-fill me-2"></i>Add to Favorites
                        </button>
                        <button class="btn btn-outline-danger btn-lg w-50">
                            <i class="bi bi-flag-fill me-2"></i>Report
                        </button>
                    </div>

                    
                </div>
            </section>
        </div>
    </main>
    

<!-- Contact the Owner -->
<div class="contact-owner-section p-4 mb-4">
    <h4 class="fw-bold text-primary mb-4"><i class="bi bi-person-circle me-2"></i>Contact the Owner</h4>
    <div class="d-flex align-items-center mb-3">
        <i class="bi bi-person-fill fs-4 text-secondary me-3"></i>
        <p class="mb-0"><strong>Name:</strong> Ahmed Mohammed</p>
    </div>
    <div class="d-flex align-items-center mb-3">
        <i class="bi bi-envelope-fill fs-4 text-secondary me-3"></i>
        <p class="mb-0"><strong>Email:</strong> <a href="mailto:Ahmed@gmail.com" class="text-decoration-none text-primary">Ahmed@gmail.com</a></p>
    </div>
    <div class="d-flex align-items-center">
        <i class="bi bi-telephone-fill fs-4 text-secondary me-3"></i>
        <p class="mb-0"><strong>Phone No.:</strong> +966 (0) 55 1234567</p>
    </div>
</div>




        </section>
    </div>
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