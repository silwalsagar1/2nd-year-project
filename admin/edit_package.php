<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
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
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.5px);
            -webkit-backdrop-filter: blur(6.5px);
            border: 1px solid rgba(38, 59, 184, 0.78);
            border-radius:  30px;
      }
        label{
            font-weight:800;
            font-size:1rem;
        }
    </style>   
</head>
<body class="bg-dark">
    <div class="container">
        <div class="containerBox p-5 mt-5">
            <h2>Edit Package</h2>
            <form action="update_package.php" method="post">
                <?php
                // Include config.php for the database connection
                require_once "config.php";

                // Check if the package ID is provided
                if(isset($_GET['id'])) {
                    $package_id = $_GET['id'];

                    // Fetch package details from the database
                    $sql = "SELECT * FROM packages WHERE p_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $package_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                        <input type="hidden" name="id" value="<?php echo $row['p_id']; ?>">
                        <div class="form-group">
                            <label for="name">Package Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['p_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $row['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration:</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $row['duration']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Availability</label> <br>
                            <input type="radio" name="availability" value="1" <?php if($row['availability'] == 1) echo "checked"; ?>> <b>Available</b>
                            <input type="radio"class="ml-5"  name="availability" value="0" <?php if($row['availability'] == 0) echo "checked"; ?>> <b>Unavailable</b>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Package</button>
                        <?php
                    } else {
                        echo "<p>Package not found.</p>";
                    }

                    // Close statement
                    $stmt->close();
                } else {
                    echo "<p>Package ID not provided.</p>";
                }

                // Close connection
                $conn->close();
                ?>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
