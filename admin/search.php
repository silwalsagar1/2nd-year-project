
<?php
// Include the database connection configuration
include 'config.php';

// Initialize searchResults array
$searchResults = array();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the search query from the form
    $searchUser = isset($_POST['searchUser']) ? $_POST['searchUser'] : '';

    // Perform the user search only if the search query is not empty
    if (!empty($searchUser)) {
        $sql = "SELECT * FROM users WHERE user_name LIKE '%$searchUser%'";
        $result = $conn->query($sql);

        // Store search results in an array
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $searchResults[] = $row;
            }
        }
    }
}

// Close the database connection (if not using persistent connections)
$conn->close();
?>
