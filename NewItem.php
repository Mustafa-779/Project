<?php
// Include the database connection
require_once 'jeek_DB.php';

session_start(); // Start the session to retrieve user data if needed

// Initialize variables for error/success messages
$message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image']['name']; // Uploaded file name

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Fetch category ID based on the selected category name
        $categoryQuery = $conn->prepare("SELECT categorie_id FROM Categories WHERE name = ?");
        $categoryQuery->bind_param("s", $category);
        $categoryQuery->execute();
        $categoryResult = $categoryQuery->get_result();
        $category_id = $categoryResult->fetch_assoc()['categorie_id'];

        // Insert the new item into the Products table
        $sql = $conn->prepare("INSERT INTO Products (categorie_id, name, price, description, image, quantity, status) 
                                VALUES (?, ?, ?, ?, ?, ?, 'available')");
        $sql->bind_param("isdssi", $category_id, $name, $price, $description, $image, $quantity);

        if ($sql->execute()) {
            $message = "Item added successfully!";
        } else {
            $message = "Error adding item: " . $conn->error;
        }
    } else {
        $message = "Error uploading the image.";
    }
}
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


    <main class="container my-5">
        <?php if ($message): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">*Item Name</label>
                <input type="text" name="name" id="name" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">*Category</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="" selected disabled>Select category</option>
                    <option value="Art">Art</option>
                    <option value="Jewelry">Jewelry</option>
                    <option value="Books & History">Books & History</option>
                    <option value="Coins & Stamps">Coins & Stamps</option>
                    <option value="Interiors">Interiors</option>
                    <option value="Watches">Watches</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">*Price</label>
                <input type="number" name="price" id="price" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">*Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">*Description</label>
                <textarea name="description" id="description" class="form-control" rows="6" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">*Image</label>
                <input type="file" name="image" id="image" class="form-control" required />
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit Item</button>
            </div>
        </form>
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


        <div class="modal fade" id="previewtModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <!-- Modal container: Defines the dialog structure -->
            <div class="modal-dialog">
                <!-- Modal content: Contains the header, body, and footer -->
                <div class="modal-content">
                    <!-- Modal header with title and close button -->
                    <div class="modal-header">
                        <!-- Modal title -->
                        <h5 class="modal-title" id="editModalLabel">Preview Item Page</h5>
                        <!-- Close button (X): Dismisses the modal -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <!-- Please, Insert "Item Page" body here. Then, do the js things to display user's input information-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS for interactivity -->
        <script src="general.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
