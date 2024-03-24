<!-- <?php
include 'config.php';
$login = false;
$showError= false;

// Enable error reporting for debugging
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    $result = $conn->query("SELECT user_id, password FROM users WHERE user_name='$username'"); 
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Retrieved Hashed Password: " . $row['password'] . "<br>";
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['user_id'];
                header("Location: index.php");
                exit();
            } else {
                echo "Incorrect password!";
            }
        } else {
            echo "User not found!";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $result->close();
}

$conn->close();
?> -->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>NAVOTSAAH</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="sub_page">
  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark" style="position: sticky">
  <div class="container-fluid costom_nav">
    <a class="navbar-brand" href="index.php">
      <img class="logo" src="myimg/20240104_235634_0000.svg" style="width:3rem;" />
      <span>NAVOTSAAH</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse link_costom " id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">Our services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <div class=" d-flex justify-content-end align-items-center">
      
      <?php
       $isLoggedIn = isset($_SESSION['user_id']);
        if ($isLoggedIn) {
          include 'config.php';
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch the username based on the user_id from the session
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT user_name FROM users WHERE user_id = '$user_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row['user_name'];

                echo '
                  <div class="nav-item">
                    <a class="nav-link active"  aria-current="page" href="userinfo.php">
                      <img src="myimg/person.svg" style="width:2rem;"/>
                      <span style="font-weight:600;">' . $username . '</span>
                    </a>
                  </div>
                ';
            } else {
                echo "Username not found in the database.";
            }

            $conn->close();
        } else {
            // If user is not logged in, show login/signup button
            echo '
              <div class="nav-item">
                <a class="nav-link" href="login.php">
                  Login/Signup
                </a>
              </div>
            ';
        }
    ?>

    </div>
  </ul>
    </div>
  </div>
</nav>
        </div>
      </header>
      <!-- <--- maim section starts fron nere---->
        <section class="UserCard container">
            <div class="UserCard_body">
                <div class="container mt-5">
                <?php
                include 'config.php';
                // session_start();
                if (isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $sql = "SELECT * FROM users WHERE user_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $userId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                ?>
                <h2>User Profile</h2>
                <div id="profile" class="view-mode">
                    <div class="mb-3">
                    <label for="firstName" class="form-label">First Name :</label>
                    <div id="firstName" class="profile-value"><?php echo $user['first_name']; ?></div>
                    </div>
                    <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name :</label>
                    <div id="lastName" class="profile-value"><?php echo $user['last_name']; ?></div>
                    </div>
                    <div class="mb-3">
                    <label for="userName" class="form-label">Username :</label>
                    <div id="userName" class="profile-value"><?php echo $user['user_name']; ?></div>
                    </div>
                    <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <div id="email" class="profile-value"><?php echo $user['email']; ?></div>
                    </div>
                    <div class="mb-3">
                    <label for="address" class="form-label">Address :</label>
                    <div id="address" class="profile-value"><?php echo $user['address']; ?></div>
                    </div>
                </div>
                <p class="d-inline-flex gap-1">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Edit Profile
                </a>
                </p>
                <div class="collapse" id="collapseExample">
                <div class="card card-body" style="background-color: transparent;">
                <form id="editProfileForm" action="update_user.php" method="post" class="edit-mode">
                    <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $user['first_name']; ?>">
                    </div>
                    <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $user['last_name']; ?>">
                    </div>
                    <div class="mb-3">
                    <label for="userName" class="form-label">Username</label>
                    <input type="text" class="form-control" id="userName" name="userName" value="<?php echo $user['user_name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                    <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address"><?php echo $user['address']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success save-mode-btn">Save Changes</button>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Cancel</a>
                </form>
                </div>
                </div>
                <?php
                } else {
                    echo "User not found.";
                }

                $stmt->close();
                $conn->close();
                } else {
                header("Location: login.php");
                exit();
                }
                ?>
            </div>  
        </section>
        <div class="logout container">
        <form method="post">
            <button type="submit"  name="logout" class="btn btn-danger">Log Out</button>
        </form>
        <?php
             if (isset($_POST['logout'])) {
             session_destroy();
             header("Location: login.php");
            exit();
            }
        ?>
        </div>
     
  <section class="info_section ">
    <div class="info_container layout_padding-top">
      <div class="container">
        <div class="info_top">
          <div class="info_logo">
            <img  class="logo" 
              src="myimg/20240104_235634_0000.svg" alt="" />
            <span>
              NAVOTSAAH
            </span>
          </div>
          <div class="social_box">
            <a href="#">
              <img src="images/fb.png" alt="">
            </a>
            <a href="#">
              <img src="images/twitter.png" alt="">
            </a>
            <a href="#">
              <img src="images/linkedin.png" alt="">
            </a>
            <a href="#">
              <img src="images/instagram.png" alt="">
            </a>
            <a href="#">
              <img src="images/youtube.png" alt="">
            </a>
          </div>
        </div>

        <div class="info_main">
          <div class="row">
            <div class="col-md-3 col-lg-2">
              <div class="info_link-box">
                <h5>
                  Useful Link
                </h5>
                <ul>
                  <li class=" active">
                    <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="">
                    <a class="" href="about.html">About </a>
                  </li>
                  <li class="">
                    <a class="" href="work.html">Work </a>
                  </li>
                  <li class="">
                    <a class="" href="category.html">Category </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 ">
              <h5>
                Offices
              </h5>
              <p>
                Readable content of a page when looking at its layoutreadable content of a page when looking at its layout
              </p>
            </div>

            <div class="col-md-3 col-lg-2 offset-lg-1">
              <h5>
                Information
              </h5>
              <p>
                Readable content of a page when looking at its layoutreadable content of a page when looking at its layout
              </p>
            </div>

            <div class="col-md-3  offset-lg-1">
              <div class="info_form ">
                <h5>
                  Newsletter
                </h5>
                <form action="">
                  <input type="email" placeholder="Email">
                  <button>
                    Subscribe
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9 col-md-10 mx-auto">
            <div class="info_contact layout_padding2">
              <div class="row">
                <div class="col-md-3">
                  <a href="#" class="link-box">
                    <div class="img-box">
                      <img src="images/location.png" alt="">
                    </div>
                    <div class="detail-box">
                      <h6>
                        balkumari,lalitpur
                      </h6>
                    </div>
                  </a>
                </div>
                <div class="col-md-4">
                  <a href="#" class="link-box">
                    <div class="img-box">
                      <img src="images/mail.png" alt="">
                    </div>
                    <div class="detail-box">
                      <h6>
                        Navotsaah@gmail.com
                      </h6>
                    </div>
                  </a>
                </div>
                <div class="col-md-5">
                  <a href="#" class="link-box">
                    <div class="img-box">
                      <img src="images/call.png" alt="">
                    </div>
                    <div class="detail-box">
                      <h6>
                        Call +977 987654321
                      </h6>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section ">
    <div class="container">
      <p>
        &copy; <span id="displayDate"></span> All Rights Reserved By NAVOTSAAH
      </p>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script type="module" src="js/custom.js"></script>
</body>

</html>

