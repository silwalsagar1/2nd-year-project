<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Confirmation</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .container a{
        text-decoration:none;
        font-weight:bold;
    }
    a:hover {
      color: black !important;
      scale:1.2; 
    }
    .container a img{
        width:3rem;
        mix-blend-mode: multiply;
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
            session_start();
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
  <div class="container text-center mt-5">
  <h1 class="m-4 ">Purchase Confirmation <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMwAAADACAMAAAB/Pny7AAAAb1BMVEX///9isB5VqwBgrxn4+/ZRqQBZrAD7/fpHpgBerhP2+vPO5MJcrgzq8+Xn8uHv9uvh7tnF37bT58i52aW/3K7a6tGGwGKq0ZNrtDOy1ZyWx3uNw29wtjxmsSqlz4x0uER6uk9+vFqgzYQ3oABWqxvcXOlIAAAHYElEQVR4nO2daXvqLBCGD5CNBDWLGjWrOf3/v/FN0s0lCYMVYd7T+3t7zVMCszBM//z55Zdf/gn8MAxN2/AUwjSrT0VR1MedaVN+StSdS+aNsKZITZvzE7Ky4oIzMsK4qGrTFj1M9kY/hXzAgs60UQ/hJ8S9VjLyF+HGcdI24PdSCBGtadOUiXPPm5LSf2iVY9o4NcJtM/WFvYshsWnzlNh1rpiRMohZm7ZPAT9r6KyU4TPzTVsIZ3Vi88syHAB70xbC2ZV8bre8E6DZMv7RnTyPv6Fn0zZCWe2DZSmECyw7JuZLO3/U8obE/4fJwoH8oYVsTVsJY1XT5Z3fa2FHHN4/LoRUC89xZJtpI9XCeI5jXZJKtl0I82ocB1ku8y69Foojx/Sl3mXQkps2E0RYulItnB5NmwlifZjJwi4QFQ4t6UG69Yk4oPCVfgLQ4jWJaTshONlBeoz1WiIMZ7KTV3ItokkxaPELSR42ailxxMlnaWTZa3nDkVgSWfIyaKk2ps2EsKnk7oV4BxRa4hKipUWhZdcAtNDzyrSdEFKQlj2K0mX0f9ICCGGIt0fxjUVvEC049n4SyF1lH8OgKF0kf+VS+tgSRTi2lWfI/d4vMayLk70BvjHaYjjHwiMBacEQW4ZHQPrSa8EQ8zsgLV6LoaPEz98AWkQZmTYUQj57GX4BkjuLHHImM5aZthMCTAvHUOvzjyAtHoZ6snOUV5N7XAzdV04G8ZXEPZk2FICTQfwLcQsEQb8P04IjsdxCfCXxUBQuE4ivJKLC4PhBeWXvLDE4/hSSVyJxlhHEV/abH4ODiTzIN0a8AkGWHIHO5D6DQVAhg1y99nAPQZa8K0FaSIAgs4yhWhAcymvYN0aC2v5OpRWg7WLAQxBdrhbbrL8Rjf2bf9PCtPCD/RHZpgAlln3GZn/5IjzB1oWIk/We36kBfRejlsb6ze/nDKaFufanlpm0C/aDv/Zv/i0osSQo6kqwJJkMobJpU6WkgD6lEQQNPqkAJTBDsd/6DbMjsOByKCrbHl7GkCaSEWp9eLk+A9eFCOtvLTcFVIv9IZlzgmrpcxjTxkrwO1ig3MNbyze/n4O1MKavgOFv1nHPerX5yd8LHMT0YYy2q75NmhUt4ZyVbZEnafxgfpFAnaXGMMaJCu56gvVw4dGAt10WPVBdjKDOcnjPpynpD/PDdSjFBKWHfZ0oerQdsKo0EGh6b+F3Ux8HF7Q6n1SeEqyA1b4Bt9N0ks1G64x7hzaHfm5hC9ciSl2VpaUHeIxzvocdoXtoQDYsjK5YWdpn4AXeUf61FcBKzKhFW6wMuDthblCvF09rv4ZdJ40IbR1+PuiCjrnuKZ0/3PwMWFUafxfR9nJsDbttJIzSYjtTE/IT2NXYO/ykLSbbwYMpz9tnkx9IqnAo9yeZvjIZdGXeDfHa/N4UeGY5/Em4zkslULPBhZymvpHjQ57zfOFpHbACame7gPNDd3WyqawLYYHerH8P3jWfcjzafTuevYKD6WMy3ZlyB63YfcFo8DlgIFfS4jWatfxxcqJwsn7IcWm28oe+K5U/BHP1ty0AW/RuDTtkq6hU+kE3e8ELEmcrH11xD6dto/Rj9PySmp+aD/8CniUPsJcVllP+iBol3PplV5c7RX+jjL5geYJYLRZQhXkv7fKLp0c8PolXd8bt+ANnGpDXN2EA29weQby+J14pM1GBHwxc9kea1JgZ5BMBZqaoww29hI2UQkcggan7vuT53pOauyNTzT2l6E4vF6lVc08JZhtjT8q55xKiNHrb76hUwaVQw7OvNk9UY77LN26fpYZZ8FYpVcuI56GdBd2k24cS6Tt4acV7hRraZLmIZ0nX4vkJ24Y3tjQuPSGC5taMIw1Bz0SXF8b0sfxN9NNIwKp5pEelsvj9wpQ2DfTxTz+KOXU1lTzI+vyDtREH0+bfAHxjOb0w5gOZG7KHl0bYNwLLhz7puV8YC9+RwfuUr6FWvlR+7O6GUVsCmWvqR5aGWvqQzHngQ2PEitB/grV6WGPrwvSAJvhdLYwFyfIsKo1+7wtjcW/8iqpdLFd2RWU3pEofmrD7AUbYKXxoli9Mf6Ip1J649f+1K6mg5zNjli/M8KFBl4a3pm2VE0Mb5F3rF6YHNjiOcGLaUBB70NJYlvnPsYacAYxal2BOAyk9odgxI/KKLWfWhsu3xNLnfi/pw3wSsptoXtk/EeOLUBLV6Hvoo4NocWl4ZWcZYwZn8UNzbbjBVGC30Pek8dWSJhYKAvaPXrhlVcxddjJu+7iCe2YzG4Hjv95c4XfTu4ZxDBOwb4mbSTUcwfy4CY6TE7K43TWZOcLJpalsLS9LmIoDuPY3WLqY6EWhCMZ6TuPfD2B2Tdv0OHdDWfSNK3kBt48gAlwh5jXRddKp952vbsLrOxtjHfLPYXd5Cy0aTBnmPc7lGYBh3PIiF8VnThDVMab5noxCEcyOlrD6bExnLu7tP7J9HzXF6Osex2okO1AhPFag3zEjUbffnzJsZYxZNiv0e/+XX/4x/gOjvGVE6+q8vQAAAABJRU5ErkJggg==" width="50" alt=""></h1>
    <p>Your purchase was successful!</p>
    <p>Thank you for choosing <span class="font-weight-bold">NAVOTSAAH</span></p>
  <a href="index.php"> <img src="data:image/png;base64,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" alt=""> Back to Homepage  </a><br />
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
