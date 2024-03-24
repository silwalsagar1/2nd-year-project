<?php
include 'config.php';

$countQuery = "SELECT COUNT(*) as totalUsers FROM users";
$countResult = $conn->query($countQuery);

// Query to get the total number of personal accounts
$countPersonalQuery = "SELECT COUNT(*) as totalPersonal FROM users WHERE Acc_type = 'personal'";
$countPersonalResult = $conn->query($countPersonalQuery);

// Query to get the total number of business accounts
$countBusinessQuery = "SELECT COUNT(*) as totalBusiness FROM users WHERE Acc_type = 'business'";
$countBusinessResult = $conn->query($countBusinessQuery);

if (!$countResult || !$countPersonalResult || !$countBusinessResult) {
    die("Query failed: " . $conn->error);
}

// Fetch the results
$totalUsers = $countResult->fetch_assoc()['totalUsers'];
$totalPersonal = $countPersonalResult->fetch_assoc()['totalPersonal'];
$totalBusiness = $countBusinessResult->fetch_assoc()['totalBusiness'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Management</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
           body {
          margin: 0;
          padding: 0;
          background-image: url('../myimg/backgroung.jpg');
          background-size: cover;
          background-position: center;
          background-repeat:;
          height: 100vh;
      }

        .navbar {
            background-color: #49545f;
            color: #fff;
        }

        .nav-link {
            color: #fff; 
        }

        .nav-link.active {
            font-weight: bold;
        }
        .nav-link {
            border-radius: 10px;
        transition: background-color 0.3s; /* Smooth transition for hover effect */
    }
    .nav-link:hover {
        color: black;
        font-weight: bold;
        background-color: grey; 
    }
     .card{
        color: black;
        background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.5px);
            -webkit-backdrop-filter: blur(6.5px);
            border: 0px solid rgba(38, 59, 184, 0.78);
            border-radius:  30px;
     }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand mr-5" href="index.php">
        <img class="logo" src="../myimg/20240104_235634_0000.svg" style="width:3rem;" />
        <span>NAVOTSAAH</span>
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link mx-3 active" href="adminDashboard.php">DASHBOARD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-3" href="Usermanagement.php">USER MANAGEMENT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-3" href="packages.php">PACKAGES</a>
            </li>
        </ul>
    </div>
</nav>
<!--main section -->
<section class="container">
    <div class="card text-center mt-5 ">
    <div class="card-header">
        <h1>ADMIN DASHBOARD</h1>
    </div>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    <div class="card-footer text-body-secondary">
        2 days ago
    </div>
    </div>
</section>
<section class=" container mt-5">

<div class="card w-75 mb-3">
    <div class="card-header">
        <h3 class="card-title"><img style="width: 2rem;" class="mr-3" src="user-management-57.svg" alt="" srcset=""> User Management</h3>
    </div>
  <div class="card-body p-4">
    <h5 class="card-text">Total Users: <?php echo $totalUsers; ?></h5>
    <h5 class="card-text">Personal Acc:  <?php echo $totalPersonal; ?></h5>
    <h5 class="card-text">Business Acc: <?php echo $totalBusiness; ?></h5>
    <a href="Usermanagement.php" class="btn btn-success">MANAGE USERS</a>
  </div>
</div>

<div class="card w-75">
    <div class="card-header">  <h3 class="card-title"><img class="mr-4" style="width: 2rem;" src="package-31.svg" alt="" srcset="">Packages</h3></div>
  <div class="card-body p-4">
  
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="" class="btn btn-success">MANAGE PACKAGES</a>
  </div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
