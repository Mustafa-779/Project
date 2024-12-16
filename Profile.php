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
                                <a href="#" class="icon-link nav-link active" aria-current="page">
                                    <i class="bi bi-person-vcard display-5 mb-2" style="margin-right: 10px"></i>
                                    Profile
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="row">
                                <a href="MyItems.php" class="icon-link nav-link" aria-current="page">
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

            <div class="col-md-9 justify-content-center" style="padding-bottom: 300px">
                <div class="row">
                    <div class="row">
                        <table
                            class="table-borderles"
                            style="text-align: left; font-size: large; font-weight: 700; margin: 60px">
                            <tr>
                                <!-- span tags are used for php and db accessing thigns -->
                                <td rowspan="2"><i class="bi bi-person-circle" style="font-size: 6rem"></i></td>
                                <td class="p-md-2">Name: <span id="name"><?= $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?></span></td>
                                <td class="p-md-2">Username: <span id="usr"><?= $_SESSION['username'] ?></span></td>
                                <td rowspan="2">
                                    <button
                                        class="btn btn-outline-dark"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-md-2">Email: <span id="email"><?= $_SESSION['email'] ?></span></td>
                                <td class="p-md-2">Phone: <span id="phone"><?= $_SESSION['phone_number'] ?></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Edit modal (Pop-up) -->
    <div
        class="modal fade"
        id="editModal"
        tabindex="-1"
        aria-labelledby="editModalLabel"
        aria-hidden="true">
        <!-- Modal container: Defines the dialog structure -->
        <div class="modal-dialog">
            <!-- Modal content: Contains the header, body, and footer -->
            <div class="modal-content">
                <!-- Modal header with title and close button -->
                <div class="modal-header">
                    <!-- Modal title -->
                    <h5 class="modal-title" id="editModalLabel">Update Account Information</h5>
                    <!-- Close button (X): Dismisses the modal -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal body: Contains the Update form -->
                <div class="modal-body">
                    <!-- Update form starts -->
                    <form action="updateAccount.php" method="POST">
                        <!-- Input field for first name -->
                        <div class="mb-3">
                            <!-- Label for first name -->
                            <label for="updatedFirstName" class="form-label">*First Name:</label>
                            <!-- Input group: Combines an icon and input field -->
                            <div class="input-group">
                                <!-- Icon for first name -->
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <!-- Text input field for first name -->
                                <input
                                    type="text"
                                    class="form-control"
                                    id="updatedFirstName"
                                    name="first_name"
                                    placeholder="first name"
                                    required />
                            </div>
                        </div>

                        <!-- Input field for last name -->
                        <div class="mb-3">
                            <label for="updatedLastName" class="form-label">*Last Name:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="updatedLastName"
                                    name="last_name"
                                    placeholder="last name"
                                    required />
                            </div>
                        </div>

                        <!-- Input field for username -->
                        <div class="mb-3">
                            <label for="updatedUsername" class="form-label">*Username:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="updatedUsername"
                                    name="username"
                                    placeholder="username"
                                    required />
                            </div>
                        </div>
                        <!-- Input field for password -->
                        <div class="mb-3">
                            <label for="updatedPassword" class="form-label">*Password:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="updatedPassword"
                                    name="password"
                                    placeholder="password"
                                    required />
                            </div>
                        </div>
                        <!-- Submit button for creating an account -->
                        <div class="d-grid">
                            <!-- Button spans the entire width of its container -->
                            <button type="submit" class="btn btn-primary">Update Information</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="notification" class="alert alert-danger" style="display: none; position: fixed; top: 100px; right: 20px; z-index: 1000;">
        <span id="notification-message"></span>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let Message = "";
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'user_not_found') {
                    echo 'errorMessage = "No user found with this username.";';
                } elseif ($_GET['error'] == 'invalid_password') {
                    echo 'errorMessage = "Invalid password.";';
                } elseif (isset($_GET['error']) == 'regiseration_error') {
                    echo 'errorMessage = "Username, email, or phone number already exists.";';
                }
            }
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


    <?php include "Footer.php"; ?>