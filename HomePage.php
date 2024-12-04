
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
                    <li class="nav-item"><a href="HomePage.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="categories.php" class="nav-link text-white">Categories</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link text-white">About</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link text-white">Contact Us</a></li>
                </ul>
                <!-- Login Button -->
                <!-- A button styled with Bootstrap's outline classes, triggers the sign-in modal -->
                <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#signInModal">Login</button>
            </nav>
        </div>
    </header>

    <!-- Login modal (Pop-up) -->
<div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
    <!-- Modal dialog container -->
    <div class="modal-dialog">
        <!-- Modal content: Contains header, body, and footer -->
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="signInModalLabel">Login or create an account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body: Contains the login form -->
            <div class="modal-body">
                <!-- Login form starts -->
                <form action="login.php" method="POST">
                    <!-- Username input field -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                    </div>

                    <!-- Password input field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <!-- Link to Forgot Password modal -->
                        <div class="text-end">
                            <a href="#" class="small text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot your password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer text-center">
                <p class="mb-0 w-100">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">Create new account</a>
                </p>
            </div>
        </div>
    </div>
</div>



<!-- Register modal (Pop-up) -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="register.php" method="POST">
                    <!-- Name Fields -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter your first name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter your last name" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="tel" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter your phone number" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Re-enter your password" required>
                        </div>
                    </div>

<!-- Security Question -->
<div class="mb-3">
    <label for="securityQuestion" class="form-label">Security Question</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-question-circle"></i></span>
        <select class="form-select" id="securityQuestion" name="security_question" required>
            <option value="">Select a question</option>
            <option value="What is your youngest brother/sister name?">What is your youngest brother/sister name?</option>
            <option value="What was the name of your first pet?">What was the name of your first pet?</option>
            <option value="What was the name of your elementary school?">What was the name of your elementary school?</option>
            <option value="What is your favorite book?">What is your favorite book?</option>
            <option value="What is the name of the city where you were born?">What is the name of the city where you were born?</option>
            <option value="What is your father's middle name?">What is your father's middle name?</option>
            <option value="What was the make and model of your first car?">What was the make and model of your first car?</option>
            <option value="What is the name of your best friend from childhood?">What is the name of your best friend from childhood?</option>
            <option value="What is the name of the street you grew up on?">What is the name of the street you grew up on?</option>
        </select>
    </div>
</div>

                    <!-- Security Answer -->
                    <div class="mb-3">
                        <label for="securityAnswer" class="form-label">Answer</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                            <input type="text" class="form-control" id="securityAnswer" name="security_answer" placeholder="Enter your answer" required>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer text-center">
                <p class="mb-0 w-100">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signInModal">Already have an account? Login</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password Modal (Pop-up) -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <!-- Modal dialog container -->
    <div class="modal-dialog">
        <!-- Modal content: Contains header, body, and footer -->
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Reset Your Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body: Contains the form for resetting password -->
            <div class="modal-body">
                <!-- Reset password form starts -->
                <form action="check_username.php" method="POST">
                    <!-- Username input field -->
                    <div class="mb-3">
                        <label for="resetPassword" class="form-label">Username or Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" id="resetPassword" name="reset_password" placeholder="Enter your username or email" required>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer text-center">
                <p class="mb-0 w-100">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signInModal">Remember your password? Login</a>
                </p>
            </div>
        </div>
    </div>
</div>





<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    <li><a href="HomePage.php">Home</a></li>
                    <li><a href="Categories.php">Categories</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            
            <!-- Middle Section: Highlights specific product categories -->
            <div class="col-md-4 footer-links">
                <h5>Categories</h5>
                <ul class="list-unstyled">
                    <!-- Links to categories offered on the website -->
                    <li><a href="art.php">Art</a></li>
                    <li><a href="interiors.php">Interiors</a></li>
                    <li><a href="jewelry.php">Jewelry</a></li>
                    <li><a href="watches.php">Watches</a></li>
                    <li><a href="coins.php">Coins & Stamps</a></li>
                    <li><a href="bookss.php">Books & History</a></li>
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
                    <li><i class="bi bi-envelope me-2"></i><a href="mailto:info@jeek.com" class="text-dark text-decoration-none">info@Jeek.com</a></li>
                    <!-- Website URL with clickable link -->
                    <li><i class="bi bi-globe me-2"></i><a href="https://www.jeek.com" target="_blank" class="text-dark text-decoration-none">www.Jeek.com</a></li>
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




