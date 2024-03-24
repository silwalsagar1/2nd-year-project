<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect user to login page or handle as needed
    header("Location: login.php");
    exit();
}

// Ensure package details are received
if (!isset($_POST['package_id'], $_POST['package_duration'])) {
    // Redirect user back to package selection page if package details are missing
    header("Location: packages.php");
    exit();
}

// Store package details in session for later use
$_SESSION['package_id'] = $_POST['package_id'];
$_SESSION['package_duration'] = $_POST['package_duration'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <style>
        .container .paymentmthd a p{
            text-align: center;
            font-size: 1.5rem;
            font-weight: bolder;
            color: black;
            margin-top: 1.5rem;

        }
        .container .paymentmthd a{
            text-decoration: none;
        }
        .paymentmthd{
            background-color: #dfdfdf;
            padding:1rem;
            border-radius: 10px;
        }
        .heading{
            font-size: 2.5rem;
        }
        .form-label{
            font-size: 1rem;
            font-weight: bolder;
        }
        .flex-container {
          display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
         }
         .paymentmthd img{
            width:12rem;
            border-radius:8px;
          
         }

    </style>
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
                <a class="nav-link "  href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="category.php">Our services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="about.php">About us</a>
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
                          <a class="nav-link" href="userinfo.php">
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
    <!-- end header section -->
  </div>
   








    <div class="container">  
     <h1 class="text-center heading mt-5">Payment Form:</h1>
    <p class="text-center m-2">Please select your payment method and enter the transaction ID:</p>
    <div class="flex-container d-flex container">
        <div class="paymentmthd m-3 flex-item"> <a href="">
        <img  src="https://play-lh.googleusercontent.com/MRzMmiJAe0-xaEkDKB0MKwv1a3kjDieSfNuaIlRo750_EgqxjRFWKKF7xQyRSb4O95Y" alt="">
        <p>Esewa</p>
      </a>  </div>
<div class="paymentmthd m-3 flex-item">
        <a href="">
            <img src="https://blog.khalti.com/wp-content/uploads/2021/01/khalti-icon.png" alt="">
            <p>Khalti</p>

        </a>
      </div>
      <div class="paymentmthd m-3 flex-item">
        <a href="">
            <img src="data:image/png;base64,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" alt="">
            <p>Fonepay</p>
        </a>
      </div>
     

    </div>
    <div class="container mt-5">  
        <form action="process_payment.php" method="post">
        <div class="form-group">
        <input class="form-control" type="hidden" name="package_id" value="<?php echo $_POST['package_id']; ?>">
        <input type="hidden" name="package_duration" value="<?php echo $_POST['package_duration']; ?>">
        </div>
        <label class="form-label" for="payment_method">Payment Method:</label>
        <select class="form-control"  id="payment_method" name="payment_method" required>
            <option value="Esewa">Esewa</option>
            <option value="Khalti">Khalti</option>
            <option value="fonepay">Fonepay</option>
        </select>
        <label class="form-label" for="transaction_id">Transaction ID:</label>
        <input class="form-control"  type="text" id="transaction_id" name="transaction_id" required>
        <!-- Submit button -->
        <button class="btn btn-success mt-4" type="submit">Submit Payment</button>
    </form></div>
  
</div>

<section class="info_section mt-5">
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
