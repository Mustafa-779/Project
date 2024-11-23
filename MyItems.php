<?php
// about.php
?>
<!doctype html>
<html lang="en">
    <!-- Head Section: Contains metadata and external resource links -->
    <head>
        <!-- Sets the character encoding for the document to UTF-8 (standard for web content) -->
        <meta charset="UTF-8" />
        <!-- Ensures responsive design for all devices (mobile-first design) -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Title of the webpage, displayed on the browser tab -->
        <title>Account</title>
        <!-- Link to Bootstrap CSS for styling and responsive utilities -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Link to Bootstrap Icons for using pre-designed vector icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Link to custom styles for further customization -->
        <link rel="stylesheet" href="css-main/navbar-footer.css" />
        <style>
            /* Placeholder for additional custom styles (inline CSS) */
        </style>
    </head>

    <!-- Body Section -->
    <body class="d-flex flex-column min-vh-100">
        <!-- Navbar Section -->
        <header class="bg-primary py-3">
            <!-- Container to center content and provide consistent spacing -->
            <div class="container d-flex justify-content-between align-items-center">
                <!-- Logo and Store Name Section -->
                <div class="d-flex align-items-center">
                    <!-- Logo Image -->
                    <img
                        src="imgs/jeek-high-resolution-logo-transparent.png"
                        alt="Jeek Logo"
                        class="me-2"
                        style="height: 100px; width: 120px" />
                    <!-- Placeholder for store name -->
                    <span class="fs-4 text-white"></span>
                </div>

                <!-- Search Bar -->
                <div class="flex-grow-1 mx-3">
                    <form class="d-flex">
                        <!-- Input field for search -->
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="Search for items..."
                            aria-label="Search" />
                        <!-- Search button -->
                        <button class="btn btn-outline-light" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Navigation Menu -->
                <nav class="d-flex align-items-center">
                    <!-- Unordered list for navigation links -->
                    <ul class="nav me-3">
                        <!-- Individual navigation links -->
                        <li class="nav-item"><a href="HomePage.html" class="nav-link text-white">Home</a></li>
                        <li class="nav-item"><a href="categories.html" class="nav-link text-white">Categories</a></li>
                        <li class="nav-item"><a href="about.html" class="nav-link text-white">About</a></li>
                        <li class="nav-item"><a href="contact.html" class="nav-link text-white">Contact Us</a></li>
                    </ul>

                </nav>
            </div>
        </header>

        <main class="container-fluid flex-grow-1">
            <div class="row">
                <div class="col-md-2 shadow">
                    <!-- Sidebar -->
                    <div class="nav nav-pills d-flex flex-column flex-shrink-0 text-light text-center">
                        <ul class="flex-column mb-auto p-0 py-2" style="font-size: 1.5rem; color: black">
                            <!-- List of links to key pages -->
                            <li class="nav-item">
                                <div class="row">
                                    <a href="Profile.html" class="icon-link nav-link" aria-current="page">
                                        <i class="bi bi-person-vcard display-5 mb-2" style="margin-right: 10px"></i>
                                        Profile
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="row">
                                    <a href="#" class="icon-link nav-link active" aria-current="page">
                                        <i class="bi bi-box display-6 mb-2" style="margin-right: 10px"></i>
                                        My Items
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="row">
                                    <a href="Favorites.html" class="icon-link nav-link" aria-current="page">
                                        <i class="bi bi-bookmark-heart display-6 mb-2" style="margin-right: 10px"></i>
                                        Favorites
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="row">
                                    <a href="NewItem.html" class="icon-link nav-link" aria-current="page">
                                        <i class="bi bi-plus-square display-6 mb-2" style="margin-right: 10px"></i>
                                        List New Item
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="list" class="col-md-10 p-lg-5" style="padding-bottom: 200px">
                    <!-- Items List, each row represents 1 item -->
                    <!-- Rows are gonna be created using js. Rows below are samples -->
                    <div class="text-start mb-2" style="font-size: large">Number of listed items: <span id="numItems">3</span></div>
                    <div class="row">
                        <div class="card mb-2" style="max-height: 200px">
                            <div class="row g-0">
                                <div class="col-md-2">
                                    <img
                                        src="imgs/Chair.webp"
                                        class="img-fluid rounded-start"
                                        style="max-height: 200px; max-width: 200px"
                                        alt="item" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title pt-3">Fancy Chair</h5>
                                        <p class="card-text">Interiors</p>
                                    </div>
                                </div>
                                <div class="col-md-2 p-md-5">
                                    <div class="row pb-lg-4"><a href="#" class="btn btn-primary">View</a></div>
                                    <div class="row"><button name="remove" class="btn btn-danger">Remove</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card mb-2" style="max-height: 200px">
                            <div class="row g-0">
                                <div class="col-md-2">
                                    <img
                                        src="imgs/watch2.webp"
                                        class="img-fluid rounded-start"
                                        style="max-height: 200px; max-width: 200px"
                                        alt="item" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title pt-3">Golden Watch</h5>
                                        <p class="card-text">Watches</p>
                                    </div>
                                </div>
                                <div class="col-md-2 p-md-5">
                                    <div class="row pb-lg-4"><a href="#" class="btn btn-primary">View</a></div>
                                    <div class="row"><button name="remove" class="btn btn-danger">Remove</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card mb-2" style="max-height: 200px">
                            <div class="row g-0">
                                <div class="col-md-2">
                                    <img
                                        src="imgs/ring2.webp"
                                        class="img-fluid rounded-start"
                                        style="max-height: 200px; max-width: 200px"
                                        alt="item" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title pt-3">Diamond Ring</h5>
                                        <p class="card-text">Jewelry</p>
                                    </div>
                                </div>
                                <div class="col-md-2 p-md-5">
                                    <div class="row pb-lg-4"><a href="#" class="btn btn-primary">View</a></div>
                                    <div class="row"><button name="remove" class="btn btn-danger">Remove</button></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Navigation -->
                    <nav aria-label="Items Navigation" id="paginationNav" style="display: none">
                        <ul class="pagination justify-content-center mt-3">
                            <li class="page-item disabled">
                                <button class="page-link" tabindex="-1">Previous</button>
                            </li>
                            <li class="page-item">
                                <button class="page-link">Next</button>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>

        <!-- Search Bar -->
        <footer class="mt-auto bg-light py-4">
            <!-- Container to structure the footer content -->
            <div class="container">
                <div class="row">
                    <!-- Links Section: Provides quick navigation to important pages -->
                    <div class="col-md-4 footer-links">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <!-- List of links to key pages -->
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Categories</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Middle Section: Highlights specific product categories -->
                    <div class="col-md-4 footer-links">
                        <h5>Categories</h5>
                        <ul class="list-unstyled">
                            <!-- Links to categories offered on the website -->
                            <li><a href="#">Art</a></li>
                            <li><a href="#">Interiors</a></li>
                            <li><a href="#">Jewelry</a></li>
                            <li><a href="#">Watches</a></li>
                            <li><a href="#">Coins & Stamps</a></li>
                            <li><a href="#">Books & History</a></li>
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
                                <i class="bi bi-envelope me-2"></i
                                ><a href="mailto:info@storename.com" class="text-dark text-decoration-none"
                                    >info@Jeek.com</a
                                >
                            </li>
                            <!-- Website URL with clickable link -->
                            <li>
                                <i class="bi bi-globe me-2"></i
                                ><a
                                    href="https://www.storename.com"
                                    target="_blank"
                                    class="text-dark text-decoration-none"
                                    >www.Jeek.com</a
                                >
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


        <!-- Bootstrap JS for interactivity -->
        <script src="general.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>