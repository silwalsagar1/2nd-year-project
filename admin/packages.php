
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Package Management</title>
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

        .glass{
            color: black;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.5px);
            -webkit-backdrop-filter: blur(6.5px);
            border: 0px solid rgba(38, 59, 184, 0.78);
            border-radius:  30px;
        }
        thead{
        background-color: blue; 
        border: 3px solid black;
        text-align: center;
    }
    th{
        border:2px solid black
     }
  .container lable{
      font-weight: 800;
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
                <a class="nav-link mx-3" href="Usermanagement.php">USER MANAGEMENT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-3 active" href="packages.php">Packages</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid mt-5 text-white">
  <h2>Package Management</h2>
  <div class="mb-4">
    <h3>Available Packages</h3>
    <table class="table glass" border='0'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Availability</th>

                <th>Action</th> <!-- New column for Edit and Delete buttons -->
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';

            $sql = "SELECT * FROM packages";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["p_id"] . "</td>
                            <td>" . $row["p_name"] . "</td>
                            <td>" . $row["description"] . "</td>
                            <td>" . $row['price'] . "$</td>
                            <td>" . $row["duration"] . "</td>
                            <td>" . $row["availability"] . "</td>
                            <td>
                                <a href='edit_package.php?id=" . $row["p_id"] . "' class='btn btn-primary'>Edit</a>
                                <a href='delete_package.php?id=" . $row["p_id"] . "' class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No packages available</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

  </div>
  <div class="container glass p-5 text-whit">
    <h2>Create a New Package</h2>
  
    <form action="create_package.php" method="post">
      <div class="form-group">
        <label for="name">Package ID:</label>
        <input type="number" class="form-control" id="id" name="id" required>
      </div>
      <div class="form-group">
        <label for="name">Package Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" id="price" name="price" required>
      </div>
      <div class="form-group">
        <label for="duration">Duration:</label>
        <input type="text" class="form-control" id="duration" name="duration" required>
      </div>
      <div class="form-group">
      <label>Availability</label> <br>
      <input type="radio" name="availability" value="1" checked> Available
      <input type="radio"  name="availability" value="0"> Unavailable
      </div>
      <button type="submit" class="btn btn-primary">Create Package</button>
     
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>