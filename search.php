<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'jeek_DB';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query from the form
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if ($query) {
    // Search for products where the name matches the query
    $sql = "SELECT product_id, name, price, description, status FROM Products WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display the results
    if ($result->num_rows > 0) {
        echo "<h2>Search Results for '$query'</h2>";
        echo "<table class='table table-striped'>";
        echo "<thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
              </thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['product_id']}</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>{$row['price']}</td>
                    <td>" . htmlspecialchars($row['description']) . "</td>
                    <td>{$row['status']}</td>
                  </tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<h2>No results found for '$query'</h2>";
    }

    $stmt->close();
} else {
    echo "<h2>Please enter a search query.</h2>";
}

// Close the connection
$conn->close();
?>
