<?php
// Include config.php for the database connection
require_once "config.php";

// Check if the package ID is provided
if(isset($_GET['id'])) {
    $package_id = $_GET['id'];

    // Delete package from the database
    $sql = "DELETE FROM packages WHERE p_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $package_id);
    $stmt->execute();

    // Check if the deletion was successful
    if($stmt->affected_rows > 0) {
        header("Location: packages.php");
            exit();
    } else {
        echo "Error deleting package.";
    }

    // Close statement
    $stmt->close();
} else {
    echo "Package ID not provided.";
}

// Close connection
$conn->close();
?>
