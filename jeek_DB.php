<?php
// Database connection details
$host = 'localhost'; // Your MySQL server (e.g., '127.0.0.1')
$username = 'root'; // MySQL username (default for XAMPP/WAMP is 'root')
$password = ''; // MySQL password (leave blank if there is no password)
$dbname = 'jeek_DB'; // The name of the database

// Create connection to MySQL
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 1: Create the Database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) !== TRUE) {
    // Optionally log errors for debugging
    error_log("Error creating database: " . $conn->error);
}

// Select the newly created database
$conn->select_db($dbname);

// Step 2: Create Tables
// Users table with security question and answer
$sql_users = "
CREATE TABLE IF NOT EXISTS Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone_number VARCHAR(15) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    security_question VARCHAR(255) NOT NULL, -- Security question
    security_answer VARCHAR(255) NOT NULL,   -- Answer to the security question
    role ENUM('admin', 'customer', 'staff') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

// Categories table
$sql_categories = "
CREATE TABLE IF NOT EXISTS Categories (
    categorie_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    description VARCHAR(3000)
);";

// Products table
$sql_products = "
CREATE TABLE IF NOT EXISTS Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT, -- Foreign key to link the product to a user
    categorie_id INT,
    name VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    description VARCHAR(3000),
    image VARCHAR(255),
    status ENUM('available', 'out_of_stock', 'discontinued') NOT NULL,
    quantity INT NOT NULL,
    isfavorite TINYINT(1) DEFAULT 0,
    ispopular TINYINT(1) DEFAULT 0,
    features VARCHAR(1000),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (categorie_id) REFERENCES Categories(categorie_id) ON DELETE SET NULL
);";

// Payments table
$sql_payments = "
CREATE TABLE IF NOT EXISTS Payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    method VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    transaction_id VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);";

// Reviews table
$sql_reviews = "
CREATE TABLE IF NOT EXISTS Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    rating FLOAT NOT NULL,
    comment VARCHAR(1000),
    likes INT DEFAULT 0,
    dislikes INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Products(product_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);";

// Execute all the queries to create tables
if ($conn->query($sql_users) !== TRUE) {
    // Optionally log errors for debugging
    error_log("Error creating Users table: " . $conn->error);
}

if ($conn->query($sql_categories) !== TRUE) {
    // Optionally log errors for debugging
    error_log("Error creating Categories table: " . $conn->error);
}

if ($conn->query($sql_products) !== TRUE) {
    // Optionally log errors for debugging
    error_log("Error creating Products table: " . $conn->error);
}

if ($conn->query($sql_payments) !== TRUE) {
    // Optionally log errors for debugging
    error_log("Error creating Payments table: " . $conn->error);
}

if ($conn->query($sql_reviews) !== TRUE) {
    // Optionally log errors for debugging
    error_log("Error creating Reviews table: " . $conn->error);
}

?>