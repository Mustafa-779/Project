<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css-main/navbar-footer.css">
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




<!-- Contact Section -->
<main class="flex-grow-1">
    <!-- Main content section that expands to fill available vertical space -->
    <section class="container my-5">
        <!-- Section with padding and spacing, contains the contact form and contact details -->
        <div class="row">
            <!-- Div for the Contact Form (Left Column) -->
            <div class="col-md-6">
                <!-- Contact Form Card -->
                <form id="contactForm" class="card p-4 shadow">
                    <!-- Form Title -->
                    <h4>Send A Message</h4>

                    <!-- Input for Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" id="name" class="form-control">
                    </div>

                    <!-- Input for Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control">
                    </div>

                    <!-- Input for Phone Number -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone No.</label>
                        <input type="text" id="phone" class="form-control">
                    </div>

                    <!-- Input for Subject -->
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" id="subject" class="form-control">
                    </div>

                    <!-- Textarea for Message -->
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" class="form-control" rows="4"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>

            <!-- Div for the Contact Details (Right Column) -->
            <div class="col-md-6">
                <!-- Contact Details Card -->
                <div class="card p-4 shadow">
                    <!-- Title for Contact Details -->
                    <h4>Contact Details</h4>

                    <!-- Contact Information -->
                    <p><strong>Phone:</strong> +966 (0) 55 1234567</p>
                    <p><strong>Email:</strong> info@Jeek.com</p>
                    <p><strong>Website:</strong> www.Jeek.com</p>

                    <!-- Title for Additional Information -->
                    <h4 class="mt-4">Our Timing</h4>

                    <!-- Operating Hours -->
                    <p>24/7</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include "Footer.php"; ?>