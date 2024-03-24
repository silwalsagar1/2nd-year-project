<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminUsername = mysqli_real_escape_string($conn, $_POST['Auser']);
    $adminPassword = mysqli_real_escape_string($conn, $_POST['Apassword']);
    $query = "SELECT * FROM admin WHERE a_username='$adminUsername' AND a_password='$adminPassword'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        header("Location: adminDashboard.php");
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
      .card{
        border-radius: 29px;
        box-shadow:  10px 10px 20px cyan,
        -20px -20px 40px black;
      }
    </style>
</head>
<body>
<section class="admin-background">
  <div class="container py-5 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
             <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">ADMIN Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
              <form action="adminLogin.php" method="post">
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="Auser">User Name</label>
                    <input type="text" id="Auser" name="Auser" class="form-control form-control-lg" />
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="Apassword">Password</label>
                    <input type="password" name="Apassword" id="Apassword" class="form-control form-control-lg" />
                </div>

                <button class="btn btn-outline-light btn-lg custom-btn px-5" type="submit">Login</button>
            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>