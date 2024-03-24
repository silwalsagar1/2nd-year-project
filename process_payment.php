<?php
session_start();

// Include the config file to establish database connection
include 'config.php';

// Retrieve user_id from session
$user_id = $_SESSION['user_id'];

// Ensure package details are received
if (!isset($_POST['package_id'], $_POST['package_duration'], $_POST['payment_method'], $_POST['transaction_id'])) {
    // Redirect user back to payment page if payment details are missing
    header("Location: payment_form.php");
    exit();
}

// Retrieve package details from session
$package_id = $_POST['package_id'];
$package_duration = $_POST['package_duration'];

// Retrieve payment details
$payment_method = $_POST['payment_method'];
$transaction_id = $_POST['transaction_id'];

// Get the current date as the subscription date
$sub_date = date('Y-m-d');

// Calculate expiration date based on package duration
$exp_date = date('Y-m-d', strtotime($sub_date . ' + ' . $package_duration . ' days'));

// Insert the purchase details into the database
$insert_query = "INSERT INTO subscriptions (user_id, p_id, sub_date, exp_date, transaction_id) VALUES ('$user_id', '$package_id', '$sub_date', '$exp_date', '$transaction_id')";
if ($conn->query($insert_query) === TRUE) {
    // Purchase successful
    // Redirect user to a confirmation page
    header("Location: purchase_confirmation.php");
    exit();
} else {
    // Error occurred while inserting data into the database
    echo "Error: " . $insert_query . "<br>" . $conn->error;
}
?>
