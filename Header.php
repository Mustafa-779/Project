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

    <!-- Notification to inform guest with errors, eg. user does not exist ... -->
    <div id="notification" class="alert alert-danger" style="display: none; position: fixed; top: 100px; right: 20px; z-index: 1000;">
        <span id="notification-message"></span>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let errorMessage = "";
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
