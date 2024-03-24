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
    if (empty($id) || empty($name) || empty($description) || empty($price) || empty($duration)) {
        echo "Please fill in all required fields.";
    } else {
        // Prepare SQL statement to insert data into the database
        $sql = "INSERT INTO packages (p_id, p_name, description, price, duration, availability) VALUES (?, ?, ?, ?, ?, ?)";
        
        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issdss", $id, $name, $description, $price, $duration, $availability);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            header("Location: packages.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement
        $stmt->close();
    }
}
?>


