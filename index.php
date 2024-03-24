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
  <link rel="website icon" href="myimg/20240104_235634_0000.svg">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    a{
      text-decoration: none !important;
    }
  </style>
</head>


<body >  
      
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">Our services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="work.php">Works</a>
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
    <!-- slider section -->
    <section class="slider_section ">
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-5 offset-md-1">
                    <div class="detail-box">
                      <h1>
                        SEARCH<br>
                        ENGINE<br>
                        OPTIMIZATION(S.E.O)
                      </h1>
                      <p>
                        Supercharge your online presence and boost business success with our expert SEO services, unlocking top search engine rankings and driving targeted traffic to your website.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn-1">
                          Know More
                        </a>
                        <a href="" class="btn-2">
                          Get A Quote
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="offset-md-1 col-md-4 img-container">
                    <div class="img-box">
                      <img src="myimg/seo.svg" alt="">
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="carousel-item active">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-5 offset-md-1">
                    <div class="detail-box">
                      <h1>
                        content<br>
                        marketing
                      </h1>
                      <p>
                        Elevate your brand with our cutting-edge content marketing strategies, creating compelling and valuable content that resonates with your audience, builds trust, and drives sustainable growth for your business.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn-1">
                          Know More
                        </a>
                        <a href="" class="btn-2">
                          Get A Quote
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="offset-md-1 col-md-4 img-container">
                    <div class="img-box">
                      <img src="myimg/8944532_4049763.svg" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-5 offset-md-1">
                    <div class="detail-box">
                      <h1>
                        social<br>
                        media<br>
                        marketing
                      </h1>
                      <p>
                        Transform your brand's online presence and connect with your audience on a deeper level through our dynamic social media marketing solutions, leveraging the power of engaging content and strategic campaigns to boost visibility, foster community, and drive impactful results.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn-1">
                          Know More
                        </a>
                        <a href="" class="btn-2">
                          Get A Quote
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="offset-md-1 col-md-4 img-container">
                    <div class="img-box">
                      <img src="myimg/SMmarketing.svg" alt="">
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    </section>
    <!-- end slider section -->
  </div>
  <section class="experience_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="img-box">
            <img src="myimg/15635327_5618166.svg" alt="">
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
              GET YOUR PRODUCT TO THE PEOPLES EYES
              </h2>
            </div>
            <p>
              Get your products or services into the spotlight with Navotsaah, where growth is a shared journey. Our collaborative approach ensures that your offerings receive the attention they deserve, reaching the eyes of your target audience effectively. <br><br>

              At Navotsaah, our seasoned professionals specialize in navigating the digital landscape, utilizing innovative strategies such as SEO, social media, content creation, and analytics. We're not just a service provider; we're your dedicated ally, committed to maximizing the potential of your brand. Let's grow together and make your mark in the competitive market with Navotsaah, where your success becomes our success.
            </p>
            <div class="btn-box">
              <a href="about.html" class="btn-1">
                Read More
              </a>
              <a href="" class="btn-2">
                SERVISES
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <section class="category_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          OUR SERVICES
        </h2>
      </div>
      <div class="category_container">
       <div class="box">
       <a style="text-decoration: none;"  href="available_packages.php">
          <div class="img-box">
            <img src="myimg/sm2.svg" alt="">
          </div>
          <div class="detail-box">
            <h5 style="color:white;">
            Social Media Marketing
            </h5>
          </div>
          </a>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="myimg/content4.svg" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Content Marketing
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <!-- <img src="images/c3.png" alt=""> -->
            <img src="myimg/seo.svg" alt="">
          </div>
          <div class="detail-box">
            <h5>
              SEO Markting
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="myimg/emailM.svg" alt="">
          </div>
          <div class="detail-box">
            <h5>
              E-mail Marketing
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="myimg/influencerM.svg" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Influencer Marketing
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="myimg/advert.svg" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Advertisement Marketing
            </h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-9 mx-auto">
          <div class="img-box">
            <img src="myimg/marketing2.svg" alt="">
          </div>
        </div>
      </div>
      <div class="detail-box">
        <h2>
          About NAVOTSAAH  
        </h2>
        <p>
          NAVOTSAAH for an unparelleled experience. we prioritize your satisfaction, delivering expectional quality that exceeds expectations. our customer centric approach ensures your happiness and success, with dedicated team of experts commited to innovation and reliability. count on us for unwavering support, making NAVOTSAAH  the trusted partner for your needs. elevate your journey with a brand that values excellence and prioritixe your unique requirements 
        </p>
        <a href="about.html">
          Read More
        </a>
      </div>
    </div>
  </section>
  <section class="freelance_section layout_padding">
    <div id="accordion">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 offset-md-1">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  Work NAVOTSAAH Has Done
                </h2>
              </div>
              <div class="tab_container">
                <div class="t-link-box" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <div class="img-box">
                    <img src="myimg/visualization-eye-svgrepo-com.svg" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Digital Dynamo
                    </h5>
                    <h4>
                      Mastering online realms, NAVOTSAAH maximized digital engagement for unparalleled visibility.
                    </h4>
                  </div>
                </div>
                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <div class="img-box">
                    <img src="myimg/strategy-finance-business-planning-svgrepo-com.svg" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Strategic Synchrony
                    </h5>
                    <h4>
                      Precision planning harmonized with execution, propelling NAVOTSAAH to strategic supremacy
                    </h4>
                  </div>
                </div>
                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <div class="img-box">
                    <img src="myimg/cliente.svg" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Client Conquest:
                    </h5>
                    <h4>
                      NAVOTSAAH's relentless dedication transformed clients into loyal brand advocates triumphantly.
                    </h4>
                  </div>
                </div>
                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <div class="img-box">
                    <img src="myimg/innovation.svg" alt="">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Innovation Maestro:
                    </h5>
                    <h4>
                      Pioneering breakthroughs, NAVOTSAAH's innovative prowess redefined marketing landscapes with brilliance
                    </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="img-box">
                <img src="myimg/marketing123.svg" alt="">
              </div>
            </div>
            <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="img-box">
                <img src="myimg/target.svg" alt="">
              </div>
            </div>
            <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="img-box">
                <img src="myimg/clientconquest.svg" alt="">
              </div>
            </div>
            <div class="collapse" id="collapseFour" aria-labelledby="headingfour" data-parent="#accordion">
              <div class="img-box">
                <img src="myimg/innovationmastero.svg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- info section -->

  <section class="info_section ">
    <div class="info_container layout_padding-top">
      <div class="container">
        <div class="info_top">
          <div class="info_logo navbar-brand">
            <img  class="logo "
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
  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="module" src="js/custom.js"></script>
</body>

</html>