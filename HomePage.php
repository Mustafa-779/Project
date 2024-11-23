<?php
    echo "PHP is working!";
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
        
        <!-- Styles for Navbar and Footer -->
        <link rel="stylesheet" href="css-main/navbar-footer.css">
        <!-- Styles for Cards -->
        <link rel="stylesheet" href="css-main/cards.css">
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
                <img src="imgs/jeek-high-resolution-logo-transparent.png" alt="Jeek Logo" class="me-2" style="height: 100px; width: 120px;">
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
                        aria-label="Search">
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
                <!-- Login Button -->
                <!-- A button styled with Bootstrap's outline classes, triggers the sign-in modal -->
                <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#signInModal">Login</button>
            </nav>
        </div>
    </header>
    </body>

    <!-- Login modal (Pop-up) -->
<div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <!-- Modal dialog container -->
    <div class="modal-dialog">
        <!-- Modal content: Contains header, body, and footer -->
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <!-- Title for the modal -->
                <h5 class="modal-title" id="signInModalLabel">Login or create an account</h5>
                <!-- Close button to dismiss the modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body: Contains the login form -->
            <div class="modal-body">
                <!-- Login form starts -->
                <form>
                    <!-- Username input field -->
                    <div class="mb-3">
                        <!-- Label for username -->
                        <label for="username" class="form-label">Username</label>
                        <!-- Input group for username with icon -->
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="username" placeholder="Enter your username">
                        </div>
                    </div>

                    <!-- Password input field -->
                    <div class="mb-3">
                        <!-- Label for password -->
                        <label for="password" class="form-label">Password</label>
                        <!-- Input group for password with icon -->
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <!-- Link to Forgot Password modal -->
                        <div class="text-end">
                            <a href="#" class="small text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot your password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid">
                        <!-- Button spans the full width of its container -->
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer text-center">
                <!-- Link to Create Account modal -->
                <p class="mb-0 w-100">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">Create new account</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <!-- Modal dialog container -->
    <div class="modal-dialog">
        <!-- Modal content: Includes header, body, and footer -->
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <!-- Title for the modal -->
                <h5 class="modal-title" id="forgotPasswordModalLabel">Reset your password</h5>
                <!-- Close button to dismiss the modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- Informational text -->
                <p class="mb-4">
                    Enter your username and email address and press the SEND button to request a new password. 
                    You will receive an email with your new password within five minutes.
                </p>

                <!-- Forgot Password form -->
                <form>
                    <!-- Username input field -->
                    <div class="mb-3">
                        <!-- Label for username -->
                        <label for="forgotPasswordUsername" class="form-label">Username</label>
                        <!-- Input group to combine an icon and input field -->
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="forgotPasswordUsername" name="username" placeholder="Enter your username" required>
                        </div>
                    </div>

                    <!-- Email input field -->
                    <div class="mb-3">
                        <!-- Label for email -->
                        <label for="forgotPasswordEmail" class="form-label">Email</label>
                        <!-- Input group for email with an icon -->
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control" id="forgotPasswordEmail" name="email" placeholder="Enter your email address" required>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid">
                        <!-- Button spans the full width of its container -->
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer text-center">
                <!-- Link to navigate back to the login modal -->
                <p class="mb-0 w-100">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signInModal">Back to Login</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Register modal (Pop-up) -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <!-- Modal container: Defines the dialog structure -->
    <div class="modal-dialog">
        <!-- Modal content: Contains the header, body, and footer -->
        <div class="modal-content">
            <!-- Modal header with title and close button -->
            <div class="modal-header">
                <!-- Modal title -->
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <!-- Close button (X): Dismisses the modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body: Contains the registration form -->
            <div class="modal-body">
                <!-- Registration form starts -->
                <form>
                    <!-- Input field for first name -->
                    <div class="mb-3">
                        <label for="firstName" class="form-label">*First Name:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter your first name" required>
                        </div>
                    </div>

                    <!-- Input field for last name -->
                    <div class="mb-3">
                        <label for="lastName" class="form-label">*Last Name:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter your last name" required>
                        </div>
                    </div>

                    <!-- Input field for username -->
                    <div class="mb-3">
                        <label for="registerUsername" class="form-label">*Username:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="registerUsername" placeholder="Choose a username" required>
                        </div>
                    </div>

                    <!-- Input field for email -->
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">*Email:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control" id="registerEmail" placeholder="Enter your email address" required>
                        </div>
                    </div>

                    <!-- Input field for phone number -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">*Phone Number:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" required>
                        </div>
                    </div>

                    <!-- Input field for password -->
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">*Password:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="registerPassword" placeholder="Choose a password" required>
                        </div>
                    </div>

                    <!-- Input field for confirming password -->
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">*Confirm Password:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Re-enter your password" required>
                        </div>
                    </div>

                    <!-- Submit button for creating an account -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Create account</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer with navigation back to login -->
            <div class="modal-footer text-center">
                <!-- Back to login link -->
                <p class="mb-0 w-100">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signInModal">Back to Login</a>
                </p>
            </div>
        </div>
    </div>
</div>

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
                <a href="art.html" class="icon-link">
                    <!-- Icon representing art -->
                    <i class="bi bi-palette display-4 mb-2"></i>
                    <p>Art</p>
                </a>
            </div>
            <!-- Category: Interiors -->
            <div class="col">
                <a href="interiors.html" class="icon-link">
                    <!-- Icon representing interiors -->
                    <i class="bi bi-house-door display-4 mb-2"></i>
                    <p>Interiors</p>
                </a>
            </div>
            <!-- Category: Jewelry -->
            <div class="col">
                <a href="jewelry.html" class="icon-link">
                    <!-- Icon representing jewelry -->
                    <i class="bi bi-gem display-4 mb-2"></i>
                    <p>Jewelry</p>
                </a>
            </div>
            <!-- Category: Watches -->
            <div class="col">
                <a href="watches.html" class="icon-link">
                    <!-- Icon representing watches -->
                    <i class="bi bi-watch display-4 mb-2"></i>
                    <p>Watches</p>
                </a>
            </div>
            <!-- Category: Coins & Stamps -->
            <div class="col">
                <a href="coins.html" class="icon-link">
                    <!-- Icon representing coins and stamps -->
                    <i class="bi bi-coin display-4 mb-2"></i>
                    <p>Coins & Stamps</p>
                </a>
            </div>
            <!-- Category: Books & History -->
            <div class="col">
                <a href="bookss.html" class="icon-link">
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
        <!-- Card for Jewelry -->
        <div class="col-md-4">
            <a href="#" class="card shadow-lg border-0 hover-effect text-decoration-none">
                <div class="card-img-overlay text-end p-2">
                    <span class="badge bg-success fs-6">$163</span>
                </div>
                <img src="imgs/ring2.webp" class="card-img-top rounded-top" alt="Jewelry - Ring">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-primary">Jewelry</h5>
                    <p class="card-text text-muted">Become elegant for every occasion.</p>
                </div>
            </a>
        </div>

        <!-- Card for Books -->
        <div class="col-md-4">
            <a href="#" class="card shadow-lg border-0 hover-effect text-decoration-none">
                <div class="card-img-overlay text-end p-2">
                    <span class="badge bg-warning fs-6">$27</span>
                </div>
                <img src="imgs/verynewbook.webp" class="card-img-top rounded-top" alt="Books - History">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-primary">Books & History</h5>
                    <p class="card-text text-muted">Uncover new tricks, one page at a time.</p>
                </div>
            </a>
        </div>

        <!-- Card for Interiors -->
        <div class="col-md-4">
            <a href="#" class="card shadow-lg border-0 hover-effect text-decoration-none">
                <div class="card-img-overlay text-end p-2">
                    <span class="badge bg-danger fs-6">$300</span>
                </div>
                <img src="imgs/Chair.webp" class="card-img-top rounded-top" alt="Interiors - Chair">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-primary">Interiors</h5>
                    <p class="card-text text-muted">Transform your living space with style.</p>
                </div>
            </a>
        </div>

        <!-- Card for Art -->
        <div class="col-md-4">
            <a href="#" class="card shadow-lg border-0 hover-effect text-decoration-none">
                <div class="card-img-overlay text-end p-2">
                    <span class="badge bg-primary fs-6">$110</span>
                </div>
                <img src="imgs/art3.webp" class="card-img-top rounded-top" alt="Art - Painting">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-primary">Art</h5>
                    <p class="card-text text-muted">Masterpiece for collectors.</p>
                </div>
            </a>
        </div>

        <!-- Card for Coins -->
        <div class="col-md-4">
            <a href="#" class="card shadow-lg border-0 hover-effect text-decoration-none">
                <div class="card-img-overlay text-end p-2">
                    <span class="badge bg-secondary fs-6">$80</span>
                </div>
                <img src="imgs/coin3.jpg" class="card-img-top rounded-top" alt="Coins - Stamps">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-primary">Coins & Stamps</h5>
                    <p class="card-text text-muted">Victorian treasures await.</p>
                </div>
            </a>
        </div>

           <!-- Card for Watches -->
<div class="col-md-4">
    <a href="GoldenWatch.html" class="card shadow-lg border-0 hover-effect text-decoration-none">
        <div class="card-img-overlay text-end p-2">
            <span class="badge bg-info fs-6">$1177</span>
        </div>
        <img src="imgs/Goldwatch.jpg" class="card-img-top rounded-top" alt="Watches - Classic">
        <div class="card-body text-center">
            <h5 class="card-title fw-bold text-primary">Watches</h5>
            <p class="card-text text-muted">Timeless piece for your wrist.</p>
        </div>
    </a>
</div>

    </div>
</section>



</main>
  
<!-- Footer Area and adds color -->
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
                    <li><i class="bi bi-envelope me-2"></i><a href="mailto:info@storename.com" class="text-dark text-decoration-none">info@Jeek.com</a></li>
                    <!-- Website URL with clickable link -->
                    <li><i class="bi bi-globe me-2"></i><a href="https://www.storename.com" target="_blank" class="text-dark text-decoration-none">www.Jeek.com</a></li>
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