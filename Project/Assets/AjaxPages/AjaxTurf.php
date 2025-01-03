<?php
include("../Connection/Connection.php");
		   $selQry="select * from tbl_turf tu inner join tbl_type t on t.type_id = tu.type_id where place_id=".$_GET['did']." and turf_vstatus = 1"	;
		  $result = $Con -> query($selQry);
		  $i=0;
		  while($data = $result->fetch_assoc())
		  {
			  $i++;
	?>
    <div class="card">
  <div><img src="../Assets/Files/Turf/Photo/<?php echo $data["turf_photo"]; ?>" alt="Photo" width="100" height="100" /></div>
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
					
						$resultR = $Con->query($query);
					
						while($row = $resultR->fetch_assoc())
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
  <div><a href="BookTurf.php?did=<?php echo $data["turf_id"]; ?>">Book Now</a></div>
  </div>
     <?php
		  }
	?>
    