<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $accountType = $_POST["accountType"];
    $address = $_POST["address"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $check_stmt = $conn->prepare("SELECT user_name FROM users WHERE user_name = ?");
    $check_stmt->bind_param("s", $user_name);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        header("Location: Usermanagement.php");
        echo "Username already exists. Please choose a different username.";
        $check_stmt->close();
        $conn->close();
        exit;
    }

    $check_stmt->close();

    $insert_stmt = $conn->prepare("INSERT INTO users (first_name, last_name, user_name, email, Acc_type, address, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insert_stmt->bind_param("sssssss", $first_name, $last_name, $user_name, $email, $accountType, $address, $password);

    if ($insert_stmt->execute()) {
        echo "User added successfully!";
        header("Location: Usermanagement.php");
    } else {
        echo "Error: " . $insert_stmt->error;
    }

    $insert_stmt->close();
    $conn->close();
}
?>
