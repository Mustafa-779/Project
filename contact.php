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
    <style>
        /* Placeholder for additional custom styles (inline CSS) */
    </style>
</head>

<!-- Body Section -->

<?php include "Header.php"; ?>

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