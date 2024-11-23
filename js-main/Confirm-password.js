// Confirm-password.js

// Get the form and input fields
const registerForm = document.getElementById('registerForm');
const passwordField = document.getElementById('password');
const confirmPasswordField = document.getElementById('confirmPassword');
const passwordErrorMessage = document.getElementById('passwordErrorMessage');

// Add event listener to form submit
registerForm.addEventListener('submit', function(event) {
    // Check if passwords match
    if (passwordField.value !== confirmPasswordField.value) {
        // Prevent form submission
        event.preventDefault();
        // Display error message
        passwordErrorMessage.style.display = 'block';
    } else {
        // Hide error message if passwords match
        passwordErrorMessage.style.display = 'none';
    }
});

// Optional: Add real-time validation (while typing)
confirmPasswordField.addEventListener('input', function() {
    if (passwordField.value !== confirmPasswordField.value) {
        passwordErrorMessage.style.display = 'block';
    } else {
        passwordErrorMessage.style.display = 'none';
    }
});
