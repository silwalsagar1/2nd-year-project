<?php
// Include config.php for the database connection
require_once "config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $duration = $_POST["duration"];
    $availability = $_POST["availability"];

    // Validate form data (you can add more validation as needed)
    if (empty($name) || empty($description) || empty($price) || empty($duration)) {
        echo "Please fill in all required fields.";
    } else {
        // Prepare SQL statement to update package data in the database
        $sql = "UPDATE packages SET p_name = ?, description = ?, price = ?, duration = ?, availability = ? WHERE p_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdssi", $name, $description, $price, $duration, $availability, $id);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            header("Location: packages.php");
            exit();
        } else {
            echo "Error updating package: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    }
} else {
    echo "Invalid request.";
}

// Close connection
$conn->close();
?>
