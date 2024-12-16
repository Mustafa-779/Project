<?php
require_once 'jeek_DB.php';
?>

<!doctype html>
<html lang="en">
<!-- Head Section: Contains metadata and external resource links -->

<head>

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

    <main class="container-fluid flex-grow-1">
        <div class="row">
            <div class="col-md-2 shadow">
                <!-- Sidebar -->
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
                                <a href="#" class="icon-link nav-link active" aria-current="page">
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
                                <a href="NewItem.php" class="icon-link nav-link" aria-current="page">
                                    <i class="bi bi-plus-square display-6 mb-2" style="margin-right: 10px"></i>
                                    List New Item
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="list" class="col-md-10 p-lg-5" style="padding-bottom: 200px">
                <?php

                    $sql = "SELECT * FROM Products WHERE user_id='$_SESSION[user_id]'";
                    $result = $conn->query($sql);
                    
                    // Loop through products and display them in cards
                    if ($result->num_rows > 0) {
                        echo "<div class='row'>";
                        while ($row = $result->fetch_assoc()) {
                            $product_id = $row['product_id'];
                            $name = $row['name'];
                            $description = $row['description'];
                            $price = $row['price'];
                            $image = $row['image'];
                            $quantity = $row['quantity'];
                            $category_id = $row['categorie_id'];

                            $sql = "SELECT * FROM categories WHERE categorie_id='$category_id'";
                            $result = $conn->query($sql);
                            $category_row = $result->fetch_assoc();
                            $category = $category_row["name"];

                            echo "
                            <div class='text-end mb-2' style='font-size: large'>Number of listed items: <span id=numItems> $result->num_rows</span></div>
                            <div class='col-md-4 mb-4'>
                                <div class='card shadow-sm border-0 h-100'>
                                
                                    <img src='uploads/$image' class='card-img-top' alt='$name' style='height: 200px; object-fit: cover;'>
                                    <div class='card-body d-flex flex-column'>
                                        <h5 class='card-title'>$name</h5>
                                        <p class='card-text text-muted'>$category</p>
                                        <p class='card-text'><strong>Price:</strong> $price</p>
                                        <p class='card-text flex-grow-1'>$description</p>
                                        <div class='d-flex justify-content-between'>
                                            <a href='logged-product_page.php?id=$product_id' class='btn btn-primary'>View Details</a>
                                            <button name='remove' class='btn btn-danger'>withdraw</button>
                                        </div>
                                    </div>
                                        <div class='text-center p-2'>
                                            <span class='badge bg-primary fs-6'>$quantity Pieces</span>
                                        </div>
                                    </div>
                                </div>";
                        }
                        echo "</div>"; // Close row
                    } else {
                        echo "<p>No products listed.</p>";
                    }
                ?>


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

    <?php include "Footer.php"; ?>