<?php
include 'config.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $delete_query = "DELETE FROM users WHERE user_id = $user_id";
    $delete_result = $conn->query($delete_query);

    if ($delete_result) {
        header("Location: Usermanagement.php");
        exit();
    } else {
        die("Delete failed: " . $conn->error);
    }
} else {
    header("Location: Usermanagement.php");
    exit();
}
?>


