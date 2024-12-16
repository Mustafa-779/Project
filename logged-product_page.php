<?php
// Include the database connection
require_once 'jeek_DB.php';

// Check if product ID is passed in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from the database based on the product ID
    $sql = "SELECT * FROM Products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the product exists
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $name = $product['name'];
        $description = $product['description'];
        $price = $product['price'];
        $image = $product['image'];
        $rating = $product['rating'];  // Assuming the product has a rating
    } else {
        // Redirect to home page if the product is not found
        header("Location: logged-HomePage.php");
        exit;
    }
} else {
    // Redirect to home page if no product ID is provided
    header("Location: logged-HomePage.php");
    exit;
}
?>



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

<main class="flex-grow-1 my-5">
    <div class="container">
        <!-- Item Section -->
        <section class="row align-items-center">
            <!-- Left Side: Image and Item Name -->
            <div class="col-md-6 text-center">
                <h2 class="mb-4 fw-bold text-primary"><?php echo $name; ?></h2>
                <p class="fs-4 text-danger fw-bold m-0">
                    <i class="bi bi-tag-fill me-2"></i>$<?php echo $price; ?>
                </p>
                <img src="uploads/<?php echo $image; ?>" alt="Item Image" class="img-fluid rounded shadow">
            </div>

            <!-- Right Side: Description and Details -->
            <div class="col-md-6">
                <!-- Description Section -->
                <div class="mb-4">
                    <h4 class="fw-bold text-secondary">Description</h4>
                    <p class="text-muted"><?php echo $description; ?></p>
                </div>

                <!-- Rating Section -->
                <div class="mb-4">
                    <h5 class="fw-bold text-secondary">Rating</h5>
                    <div class="d-flex align-items-center">
                        <span class="text-warning fs-4 me-2">
                            <?php
                            // Display stars based on rating (simple 5-star display)
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < floor($rating)) {
                                    echo "<i class='bi bi-star-fill'></i>";
                                } elseif ($i == floor($rating) && $rating - floor($rating) >= 0.5) {
                                    echo "<i class='bi bi-star-half'></i>";
                                } else {
                                    echo "<i class='bi bi-star'></i>";
                                }
                            }
                            ?>
                        </span>
                        <span class="text-muted">(<?php echo $rating; ?>/5)</span>
                    </div>
                </div>



                <!-- Action Buttons -->
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

<!-- Contact the Owner Section -->
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

<?php include "Footer.php"; ?>