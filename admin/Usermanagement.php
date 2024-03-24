<?php
include 'config.php';

$query = "SELECT * FROM users";
$result = $conn->query($query);
if (!$result) {
    die("Query failed: " . $conn->error);
}

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
       .table{
        color: black;
        background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.5px);
            -webkit-backdrop-filter: blur(6.5px);
            border: 0px solid rgba(38, 59, 184, 0.78);
            border-radius:  30px;
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
    thead{
        background-color: blue; 
        border: 3px solid black;
        text-align: center;
    }
    th{
        border:2px solid black
     }
     td.password-column {
        max-width: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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
                <a class="nav-link mx-3" href="adminDashboard.php">DASHBOARD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-3 active" href="Usermanagement.php">USER MANAGEMENT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-3" href="packages.php">Packages</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container py-5 text-center">
<div class="container text-white mt-5">
        <form action="" method="POST">
            <div class="input-group mb-5">
                <h2 class="mr-4">User Search:</h2>
                <input type="search" class="form-control" id="searchUser" name="searchUser" placeholder="Search username or user id.">
                <button class="btn btn-dark my-1 float-right" type="submit" data-toggle="collapse" data-target="#searchResults">Search</button>
            </div>
        </form>

        <?php
        if (isset($searchResults) && !empty($searchResults)) {
            echo '<div id="searchResults" class="collapse show">';
            echo '<table class="table table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>User ID</th>';
            echo '<th>Username</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Loop through the search results and display each user
            foreach ($searchResults as $user) {
                echo '<tr>';
                echo '<td>' . $user['user_id'] . '</td>';
                echo '<td>' . $user['user_name'] . '</td>';
                // Add more columns if needed
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>
    </div>

<button class="btn btn-success add-player-btn my-1 float-right" data-toggle="collapse" data-target="#addPlayerForm">Add User</button>
            <div id="addPlayerForm" class=" container collapse mt-3">
            <form action="submit_form.php" method="post">
                    <table border=2 class="table">
                    <thead> 
                        <th colspan=2 >ADD USER</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><label for="first_name">First Name:</label></td>
                            <td><input type="text" class="form-control" id="first_name" name="first_name" required></td>
                        </tr>
                        <tr>
                            <td><label for="last_name">Last Name:</label></td>
                            <td><input type="text" class="form-control" id="last_name" name="last_name" required></td>
                        </tr>
                        <tr>
                            <td><label for="user_name">Username:</label></td>
                            <td><input type="text" class="form-control" id="user_name" name="user_name" required></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email:</label></td>
                            <td><input type="email" class="form-control" id ="email" name="email"/></td>
                        </tr>
                        <tr>
                            <td><label for="Acc_type">Account type:</label></td>
                            <td>
                                <select class="form-control" id="accountType" name="accountType" required>
                                    <option value="" disabled selected>Select account type</option>
                                    <option value="personal">Personal</option>
                                    <option value="business">Business</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-label" for="address">Address</label>
                            </td>
                            <td>
                                <input type="text" id="address" name="address" class="form-control">
                            </td>
                        </tr>
    
                        <tr>
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" class="form-control" id="password" name="password" required></td>
                        </tr>
         
                        <tr> <td colspan=2><button type="submit" class="btn btn-primary">Submit</button></td></tr>
                    </table>
                    
                </form>
            </div>
         <h1 style="color:white;">USER DETAILS</h1>
         
        <table border='0' class=" table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td class="password-column"><?php echo $row['password']; ?></td>
                       <td>
                            <a href="edit_user.php?id=<?php echo $row['user_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete_user.php?id=<?php echo $row['user_id']; ?>" class="btn my-2 btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</main>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
