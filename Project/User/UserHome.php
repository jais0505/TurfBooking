
<?php
include("SessionValidator.php");
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
          .green-button {
            background-color: #28a745;
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin: 5px;
        }

  </style>
  <title>UserHome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../Assets/Template/Main/fonts/icomoon/style.css">

  <link rel="stylesheet" href="../Assets/Template/Main/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="../Assets/Template/Main/css/jquery-ui.css">
  <link rel="stylesheet" href="../Assets/Template/Main/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../Assets/Template/Main/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../Assets/Template/Main/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="../Assets/Template/Main/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="../Assets/Template/Main/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="../Assets/Template/Main/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="../Assets/Template/Main/css/aos.css">

  <link rel="stylesheet" href="../Assets/Template/Main/css/style.css">



</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    
    <header class="site-navbar py-4" role="banner">
    <div class="topnav">
      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.html">
              <img src="../Assets/Template/Main/images/Turfweblogo (2).png" alt="Logo">
            </a>
          </div>
          
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                     <li><a href="MyProfile.php">My Profile</a></li>
                     <li> <a href="SearchTurf.php">Search Turf</a></li>
                     <li><a href="MyBookings.php">My Bookings</a></li>
                     <li><a href="ViewComplaint.php">View complaints</a></li>
                     <li class="active"><a href="UserHome.php" class="nav-link">Home</a></li>
                     <li class="active"><a href="../Guest/Logout.php" class="nav-link">Logout</a></li>
               
              </ul>
            </nav>

            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                class="icon-menu h3 text-white"></span></a>
          </div>
      
        </div>
      </div>
  </div>
    </header>
    <div class="hero overlay" style="background-image: url('../Assets/Template/Main/images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
           
            <p>"It's not about the goals you score, but the friendships you build on the field."</p>
           
            <p>
          
             <a href="BookTurf.php" class="green-button">Book Turf</a>
  
            </p>
          </div>
        </div>
      </div>
    </div>

<!--
   <div class="container site-section">
      <div class="row">
        <div class="col-6 title-section">
          <h2 class="heading">Our Blog</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="custom-media d-flex">
            <div class="img mr-4">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <span class="meta">May 20, 2020</span>
              <h3 class="mb-4"><a href="#">Romolu to stay at Real Nadrid?</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
              <p><a href="#">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="custom-media d-flex">
            <div class="img mr-4">
              <img src="images/img_3.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <span class="meta">May 20, 2020</span>
              <h3 class="mb-4"><a href="#">Romolu to stay at Real Nadrid?</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
              <p><a href="#">Read more</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
 -->


    <footer class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>News</h3>
              <ul class="list-unstyled links">
                <li><a href="#">All</a></li>
                <li><a href="#">Club News</a></li>
                <li><a href="#">Media Center</a></li>
                <li><a href="#">Video</a></li>
                <li><a href="#">RSS</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>Tickets</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Online Ticket</a></li>
                <li><a href="#">Payment and Prices</a></li>
                <li><a href="#">Contact &amp; Booking</a></li>
                <li><a href="#">Tickets</a></li>
                <li><a href="#">Coupon</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>Matches</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Standings</a></li>
                <li><a href="#">World Cup</a></li>
                <li><a href="#">La Lega</a></li>
                <li><a href="#">Hyper Cup</a></li>
                <li><a href="#">World League</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>Social</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Youtube</a></li>
              </ul>
            </div>
          </div>

        </div>

        <div class="row text-center">
          <div class="col-md-12">
            <div class=" pt-5">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart"
                  aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>

        </div>
      </div>
    </footer>



  </div>
  <!-- .site-wrap -->

  <script src="../Assets/Template/Main/js/jquery-3.3.1.min.js"></script>
  <script src="../Assets/Template/Main/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../Assets/Template/Main/js/jquery-ui.js"></script>
  <script src="../Assets/Template/Main/js/popper.min.js"></script>
  <script src="../Assets/Template/Main/js/bootstrap.min.js"></script>
  <script src="../Assets/Template/Main/js/owl.carousel.min.js"></script>
  <script src="../Assets/Template/Main/js/jquery.stellar.min.js"></script>
  <script src="../Assets/Template/Main/js/jquery.countdown.min.js"></script>
  <script src="../Assets/Template/Main/js/bootstrap-datepicker.min.js"></script>
  <script src="../Assets/Template/Main/js/jquery.easing.1.3.js"></script>
  <script src="../Assets/Template/Main/js/aos.js"></script>
  <script src="../Assets/Template/Main/js/jquery.fancybox.min.js"></script>
  <script src="../Assets/Template/Main/js/jquery.sticky.js"></script>
  <script src="../Assets/Template/Main/js/jquery.mb.YTPlayer.min.js"></script>


  <script src="../Assets/Template/Main/js/main.js"></script>

</body>

</html>
<?php
include("Foot.php");
?>