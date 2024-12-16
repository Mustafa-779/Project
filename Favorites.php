<?php
require_once 'jeek_DB.php';
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="css-main/navbar-footer.css" />
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="bg-primary py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="imgs/jeek-high-resolution-logo-transparent.png" alt="Jeek Logo" class="me-2" style="height: 100px; width: 120px;">
            </div>

            <div class="flex-grow-1 mx-3">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search for items..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            <nav class="d-flex align-items-center">
                <ul class="nav me-3">
                    <li class="nav-item"><a href="logged-HomePage.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="logged-categories.php" class="nav-link text-white">Categories</a></li>
                    <li class="nav-item"><a href="logged-about.php" class="nav-link text-white">About</a></li>
                    <li class="nav-item"><a href="logged-contact.php" class="nav-link text-white">Contact Us</a></li>
                </ul>

                <?php if (isset($_SESSION['username'])): ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
                <?php else: ?>
                    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#signInModal">Login</button>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main class="container-fluid flex-grow-1">
        <div class="row">
            <div class="col-md-2 shadow">
                <div class="nav nav-pills d-flex flex-column flex-shrink-0 text-light text-center">
                    <ul class="flex-column mb-auto p-0 py-2" style="font-size: 1.5rem; color: black">
                        <li class="nav-item"><a href="Profile.php" class="icon-link nav-link"><i class="bi bi-person-vcard display-5 mb-2"></i>Profile</a></li>
                        <li class="nav-item"><a href="MyItems.php" class="icon-link nav-link"><i class="bi bi-box display-6 mb-2"></i>My Items</a></li>
                        <li class="nav-item"><a href="Favorites.php" class="icon-link nav-link active"><i class="bi bi-bookmark-heart display-6 mb-2"></i>Favorites</a></li>
                        <li class="nav-item"><a href="NewItem.php" class="icon-link nav-link"><i class="bi bi-plus-square display-6 mb-2"></i>List New Item</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-10 p-lg-5" style="padding-bottom: 200px">
                <?php
                $userId = $_SESSION['user_id'];
                $sql = "SELECT product_id FROM Favorites WHERE user_id='$userId'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<div class='row'>";
                    while ($row = $result->fetch_assoc()) {
                        $product_id = $row['product_id'];
                        $sql = "SELECT * FROM products WHERE product_id='$product_id'";
                        $productResult = $conn->query($sql);
                        $product_row = $productResult->fetch_assoc();

                        // Check if product exists
                        if ($product_row) {
                            $name = $product_row['name'];
                            $description = $product_row['description'];
                            $price = $product_row['price'];
                            $image = $product_row['image'];
                            $category_id = $product_row['categorie_id'];

                            $sql = "SELECT * FROM categories WHERE categorie_id='$category_id'";
                            $categoryResult = $conn->query($sql);
                            $category_row = $categoryResult->fetch_assoc();
                            $category = $category_row["name"];

                            echo "
                                <div id='product-$product_id' class='col-md-4 mb-4'>
                                    <div class='card shadow-sm border-0 h-100'>
                                        <img src='uploads/$image' class='card-img-top' alt='$name' style='height: 200px; object-fit: cover;'>
                                        <div class='card-body d-flex flex-column'>
                                            <h5 class='card-title'>$name</h5>
                                            <p class='card-text text-muted'>$category</p>
                                            <p class='card-text'><strong>Price:</strong> $price</p>
                                            <p class='card-text flex-grow-1'>$description</p>
                                            <div class='d-flex justify-content-between'>
                                                <a href='logged-product_page.php?id=$product_id' class='btn btn-primary'>View Details</a>
                                                <button class='btn btn-danger unfavorite' data-product-id='$product_id'>Unfavorite</button>
                                                <button class='btn btn-info buy-btn' data-product-id='$product_id' data-bs-toggle='modal' data-bs-target='#buyModal'>Buy</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    }
                    echo "</div>"; // Close row
                } else {
                    echo "<p>No products in Favorites.</p>";
                }
                ?>
            </div>
        </div>

        <!-- Buy Modal -->
        <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buyModalLabel">Purchase Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="purchaseForm">
                            <input type="hidden" id="purchaseProductId">
                            <div class="mb-3">
                                <label for="paymentMethod" class="form-label">Payment Method</label>
                                <select id="paymentMethod" class="form-select" required>
                                    <option value="" disabled selected>Select payment method</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="paypal">PayPal</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Confirm Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Handle Buy Button Click
            document.querySelectorAll('.buy-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    document.getElementById('purchaseProductId').value = productId;
                });
            });

            // Handle Purchase Form Submission
            document.getElementById('purchaseForm').addEventListener('submit', function(event) {
                event.preventDefault();

                const productId = document.getElementById('purchaseProductId').value;
                const paymentMethod = document.getElementById('paymentMethod').value;

                // Call your purchase API
                fetch('/api/purchase', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        productId: productId,
                        userId: <?= $_SESSION['user_id'] ?>,
                        paymentMethod: paymentMethod
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close the buy modal
                        $('#buyModal').modal('hide');

                        // Show the rating modal
                        $('#ratingModal').modal('show');

                        // Remove the product element from the favorites list
                        const productElement = document.getElementById(`product-${productId}`);
                        if (productElement) {
                            productElement.remove(); // Remove the product from the DOM
                        }
                    } else {
                        alert('Purchase failed: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while processing the purchase.');
                });
            });
        </script>

        <!-- Rating Modal -->
        <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ratingModalLabel">Rate Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rate this product:</label>
                            <select id="rating" class="form-select" required>
                                <option value="" disabled selected>Select rating</option>
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                        </div>
                        <button id="submitRating" class="btn btn-primary">Submit Rating</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('submitRating').addEventListener('click', function() {
                const rating = document.getElementById('rating').value;
                const productId = document.getElementById('purchaseProductId').value; // Reuse productId

                // Call your rating API
                fetch('/api/rate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        productId: productId,
                        rating: rating
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close the rating modal
                        $('#ratingModal').modal('hide');
                    } else {
                        alert('Rating failed: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while submitting your rating.');
                });
            });
        </script>
    </main>

    <?php include "Footer.php"; ?>
</body>
</html>