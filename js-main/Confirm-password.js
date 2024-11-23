// Confirm-password.js

// Get the form and input fields
const registerForm = document.getElementById('registerForm');
const passwordField = document.getElementById('password');
const confirmPasswordField = document.getElementById('confirmPassword');
const passwordError = document.getElementById('passwordError');

// Add event listener to form submit
registerForm.addEventListener('submit', function (event) {
    // Get trimmed values of the passwords
    const password = passwordField.value.trim();
    const confirmPassword = confirmPasswordField.value.trim();

    // Check if passwords match
    if (password === "" || confirmPassword === "") {
        // Prevent form submission if either password is empty
        event.preventDefault();
        passwordError.textContent = "Password fields cannot be empty.";
        passwordError.style.display = "block";
    } else if (password !== confirmPassword) {
        // Prevent form submission if passwords do not match
        event.preventDefault();
        passwordError.textContent = "Passwords do not match!";
        passwordError.style.display = "block";
    } else {
        // If passwords match, allow form submission
        passwordError.style.display = "none";
    }
});
