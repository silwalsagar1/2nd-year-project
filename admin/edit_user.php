<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $query = "SELECT * FROM users WHERE user_id = $userId";
    $result = $conn->query($query);
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        die("User not found");
    }
} else {
    die("User ID not provided");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newFirstName = mysqli_real_escape_string($conn, $_POST['newFirstName']);
    $newLastName = mysqli_real_escape_string($conn, $_POST['newLastName']);
    $newUsername = mysqli_real_escape_string($conn, $_POST['newUsername']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $updateQuery = "UPDATE users SET first_name = '$newFirstName', last_name = '$newLastName', user_name = '$newUsername', password = '$hashedPassword' WHERE user_id = $userId";

    if ($conn->query($updateQuery) === TRUE) {
        // User details updated successfully
        echo '<script type="text/javascript">alert("Changes saved successfully!");</script>';
        header("Location: Usermanagement.php");
        exit();
    } else {
        echo "Error updating user details: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
          margin: 0;
          padding: 0;
          background-image: url('../myimg/backgroung.jpg');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
          height: 100vh;
      }
       .containerBox{
        color:white;
            background: rgba(91, 102, 169, 0.35);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.5px);
            -webkit-backdrop-filter: blur(6.5px);
            border: 1px solid rgba(38, 59, 184, 0.78);
            border-radius:  30px;
      }
        label{
            font-weight: bolder;
            font-size:1rem;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container">
    <div class="containerBox p-5 mt-5">
    <h1 class='text-center'style="color:white;">Edit User - <?php echo $user['user_name']; ?></h1>
        <form method="post">
            <div class="mb-3">
                <label for="newFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="newFirstName" name="newFirstName" value="<?php echo $user['first_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="newLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="newLastName" name="newLastName" value="<?php echo $user['last_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="newUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="newUsername" name="newUsername" value="<?php echo $user['user_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="newPassword" name="newPassword" value="<?php echo $user['password']; ?>">
                    <button class="btn btn-dark" type="button" id="passwordToggle" onclick="togglePasswordVisibility()">Show</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("newPassword");
            var passwordToggle = document.getElementById("passwordToggle");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggle.innerText = "Hide";
            } else {
                passwordInput.type = "password";
                passwordToggle.innerText = "Show";
            }
        }
    </script>
</body>

</html>
