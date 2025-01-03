<?php
include("./Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.card{
	padding: 20px;
    box-shadow: 0 0 10px #d7d7d7;
    width: fit-content;
    border-radius: 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.card-main {
	    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: stretch;
    gap: 2rem;
	margin-top:50px;
}
</style>
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
  <title>Turfzy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="Assets/Template/Main/fonts/icomoon/style.css">

  <link rel="stylesheet" href="Assets/Template/Main/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="Assets/Template/Main/css/jquery-ui.css">
  <link rel="stylesheet" href="Assets/Template/Main/css/owl.carousel.min.css">
  <link rel="stylesheet" href="Assets/Template/Main/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="Assets/Template/Main/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="Assets/Template/Main/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="Assets/Template/Main/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="Assets/Template/Main/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="Assets/Template/Main/css/aos.css">

  <link rel="stylesheet" href="Assets/Template/Main/css/style.css">





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
              <img src="Assets/Template/Main/images/Turfweblogo (2).png" alt="Logo">
            </a>
          </div>
          
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="Guest\Login.php" class="nav-link">Login</a></li>
                <li><a href="Guest\UserSignUp.php" class="nav-link">User SignUp</a></li>
                <li><a href="Guest\Turf.php" class="nav-link">Turf Registration</a></li>
              </ul>
            </nav>

            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                class="icon-menu h3 text-white"></span></a>
          </div>
      
        </div>
      </div>
  </div>
    </header>
    <div class="hero overlay" style="background-image: url('Assets/Template/Main/images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
           
            <p>"It's not about the goals you score, but the friendships you build on the field."</p>
           
            <p>
          
             <a href="Guest\Login.php" class="green-button">Book Turf</a>
  
            </p>
          </div>
        </div>
      </div>
    </div>


 <div id="search" class="card-main">
  <?php 
		  $selQry="select * from tbl_turf b inner join tbl_type t on b.type_id=t.type_id";
		  $result1=$Con->query($selQry);
		  $i=0;
		  while($data=$result1->fetch_assoc())
		  {
			  $i++;
	?>
  <div class="card">
  <div><img src="./Assets/Files/Turf/Photo/<?php echo $data["turf_photo"]; ?>" alt="Photo" width="100" height="100" /></div>
  <div>Name :<?php echo $data["turf_name"]; ?></div>
  <div>Email :<?php echo $data["turf_email"]; ?></div>
  <div style="display:flex;">Address :<div style="width:139px;"><?php echo $data["turf_address"]; ?></div></div>
  <div><?php echo $data["type_name"]; ?></div>
  <div>
  <?php
										
											
						$average_rating = 0;
						$total_review = 0;
						$five_star_review = 0;
						$four_star_review = 0;
						$three_star_review = 0;
						$two_star_review = 0;
						$one_star_review = 0;
						$total_rating_value = 0;
						$review_content = array();
					
						$query = "SELECT * FROM tbl_rating where turf_id = '".$data["turf_id"]."' ORDER BY rating_id  DESC";
					
						$result = $Con->query($query);
					
						while($row = $result->fetch_assoc())
						{
							
					
							if($row["rating_value"] == '5')
							{
								$five_star_review++;
							}
					
							if($row["rating_value"] == '4')
							{
								$four_star_review++;
							}
					
							if($row["rating_value"] == '3')
							{
								$three_star_review++;
							}
					
							if($row["rating_value"] == '2')
							{
								$two_star_review++;
							}
					
							if($row["rating_value"] == '1')
							{
								$one_star_review++;
							}
					
							$total_review++;
					
							$total_rating_value = $total_rating_value + $row["rating_value"];
					
						}
						
						
						if($total_review==0 || $total_rating_value==0 )
						{
							$average_rating = 0 ; 			
						}
						else
						{
							$average_rating = $total_rating_value / $total_review;
						}
						
						?>
						<p align="center" style="color:#F96;font-size:20px">
					   <?php
					   if($average_rating==5 || $average_rating==4.5)
					   {
						   ?>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
						   <?php
					   }
					   if($average_rating==4 || $average_rating==3.5)
					   {
						   ?>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
						   <?php
					   }
					   if($average_rating==3 || $average_rating==2.5)
					   {
						   ?>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
						   <?php
					   }
					   if($average_rating==2 || $average_rating==1.5)
					   {
						   ?>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
						   <?php
					   }
					   if($average_rating==1)
					   {
						   ?>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
						   <?php
					   }
					   if($average_rating==0)
					   {
						   ?>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
							<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
						   <?php
					   }
					   ?>
					   
					</p>
						<?php
					
						$output = array(
							'average_rating'	=>	number_format($average_rating, 1),
							'total_review'		=>	$total_review,
							'five_star_review'	=>	$five_star_review,
							'four_star_review'	=>	$four_star_review,
							'three_star_review'	=>	$three_star_review,
							'two_star_review'	=>	$two_star_review,
							'one_star_review'	=>	$one_star_review,
							'review_data'		=>	$review_content
						);
						?></div>
  <div><a href="BookTurf.php?did=<?php echo $data["turf_id"]; ?>"></a></div>
  </div>
     <?php
		  }
	?>
  </div>

    <footer class="footer-section">
      <script type="text/javascript">
var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
(function() {
    var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/YOUR-UNIQUE-ID/default';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();
</script>

      

        <div class="row text-center">
          <div class="col-md-12">
            <div class=" pt-5">
              <p>
                
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved  
                   
                
              </p>
            </div>
          </div>

        </div>
      </div>
    </footer>



  </div>
  <!-- .site-wrap -->

  <script src="Assets/Template/Main/js/jquery-3.3.1.min.js"></script>
  <script src="Assets/Template/Main/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="Assets/Template/Main/js/jquery-ui.js"></script>
  <script src="Assets/Template/Main/js/popper.min.js"></script>
  <script src="Assets/Template/Main/js/bootstrap.min.js"></script>
  <script src="Assets/Template/Main/js/owl.carousel.min.js"></script>
  <script src="Assets/Template/Main/js/jquery.stellar.min.js"></script>
  <script src="Assets/Template/Main/js/jquery.countdown.min.js"></script>
  <script src="Assets/Template/Main/js/bootstrap-datepicker.min.js"></script>
  <script src="Assets/Template/Main/js/jquery.easing.1.3.js"></script>
  <script src="Assets/Template/Main/js/aos.js"></script>
  <script src="Assets/Template/Main/js/jquery.fancybox.min.js"></script>
  <script src="Assets/Template/Main/js/jquery.sticky.js"></script>
  <script src="Assets/Template/Main/js/jquery.mb.YTPlayer.min.js"></script>


  <script src="Assets/Template/Main/js/main.js"></script>

</body>

</html>