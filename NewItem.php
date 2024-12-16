<?php
// Include the database connection
require_once 'jeek_DB.php';
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List New Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="css-main/navbar-footer.css" />
    <style>
        /* Custom styles */
        .form-label {
            font-weight: bold;
        }
        .sidebar {
            height: 100%;
            padding: 15px;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="bg-primary py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="imgs/jeek-high-resolution-logo-transparent.png" alt="Jeek Logo" class="me-2" style="height: 100px;">
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

    <div class="container-fluid flex-grow-1">
        <div class="row">
            <aside class="col-md-2 shadow">
            <div class="nav nav-pills d-flex flex-column flex-shrink-0 text-light text-center">
                    <ul class="flex-column mb-auto p-0 py-2" style="font-size: 1.5rem; color: black">
                        <!-- List of links to key pages -->
                        <li class="nav-item">
                            <div class="row">
                                <a href="Profile.php" class="icon-link nav-link" aria-current="page">
                                    <i class="bi bi-person-vcard display-5 mb-2" style="margin-right: 10px"></i>
                                    Profile
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="row">
                                <a href="myItems.php" class="icon-link nav-link" aria-current="page">
                                    <i class="bi bi-box display-6 mb-2" style="margin-right: 10px"></i>
                                    My Items
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="row">
                                <a href="Favorites.php" class="icon-link nav-link" aria-current="page">
                                    <i class="bi bi-bookmark-heart display-6 mb-2" style="margin-right: 10px"></i>
                                    Favorites
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="row">
                                <a href="NewItem.php" class="icon-link nav-link active" aria-current="page">
                                    <i class="bi bi-plus-square display-6 mb-2" style="margin-right: 10px"></i>
                                    List New Item
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>

            <main class="col-md-9">
                <span></span>
                <form action="addItem.php" method="POST" enctype="multipart/form-data">
                
                    <div class="mb-3">
                        <br/>
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
                </for>
            </main>
        </div>
    </div>

    <div id="notification" class="alert alert-primary" style="display: none; position: fixed; top: 100px; right: 20px; z-index: 1000;">
        <span id="notification-message"></span>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let errorMessage = "";
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'insertion_error') {
                    echo 'errorMessage = "Insertion Failed. Try again.";';
                } elseif ($_GET['error'] == 'sql_error') {
                    echo 'errorMessage = "Database error. Try again";';
                } elseif (isset($_GET['error']) == 'insertion_error1') {
                    echo 'errorMessage = "Error: Selected category does not exist.";';
                }
            }
            elseif(isset($_GET['successful']))
                echo 'errorMessage = "Item added successfully!";';
            ?>

            if (errorMessage) {
                // Display the notification
                const notification = document.getElementById("notification");
                const notificationMessage = document.getElementById("notification-message");

                notificationMessage.textContent = errorMessage;
                notification.style.display = "block";


                setTimeout(function() {
                    notification.style.opacity = "0"; // Fade out
                    setTimeout(function() {
                        notification.style.display = "none";
                    }, 500);
                }, 5000);
            }
        });
    </script>

    <style>
        /* Optional: Add a fade-out transition */
        #notification {
            transition: opacity 0.5s ease;
            /* Adjust duration as needed */
        }
    </style>

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
                        <li><a href="logged-books.php">Books & History</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-telephone me-2"></i>+966 (0) 55 1234567</li>
                        <li><i class="bi bi-telephone-fill me-2"></i>+966 (0) 0 1234567</li>
                        <li><i class="bi bi-envelope me-2"></i><a href="mailto:info@storename.com" class="text-dark text-decoration-none">info@Jeek.com</a></li>
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

    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Preview Item Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Placeholder for item preview content -->
                </div>
            </div>
        </div>
    </div>

    <script src="general.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>