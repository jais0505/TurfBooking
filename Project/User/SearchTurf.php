<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SearchTurf</title>
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
</head>
<body>
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
            <div class="card">
                <div class="card-header">Select District and Place</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="sel_district">District</label>
                        <select name="sel_district" id="sel_district" onchange="getPlace(this.value)">
                            <option value="">----------select-----------</option>
                            <?php 
                                $seloptionQry = "SELECT * FROM tbl_district";
                                $optionResult = $Con->query($seloptionQry);
                                while ($optiondata = $optionResult->fetch_assoc()) {
                            ?>	
                            <option value="<?php echo $optiondata['district_id']; ?>">
                                <?php echo htmlspecialchars($optiondata['district_name']); ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel_place">Place</label>
                        <select name="sel_place" id="sel_place" onchange="getTurf(this.value)">
                            <option value="">----------select-----------</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div>

                                         </div>

        <div id="search" class="row">
            <?php 
                $selQry = "SELECT * FROM tbl_turf b INNER JOIN tbl_type t ON b.type_id = t.type_id where turf_vstatus = 1";
                $result1 = $Con->query($selQry);
                while ($data = $result1->fetch_assoc()) {
            ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="../Assets/Files/Turf/Photo/<?php echo htmlspecialchars($data['turf_photo']); ?>" class="card-img-top" alt="Photo" />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($data['turf_name']); ?></h5>
                        <p class="card-text">Email: <?php echo htmlspecialchars($data['turf_email']); ?></p>
                        <p class="card-text">Address: <?php echo htmlspecialchars($data['turf_address']); ?></p>
                        <p class="card-text">Type: <?php echo htmlspecialchars($data['type_name']); ?></p>

                        <?php
                            // Calculate average rating
                            $average_rating = 0;
                            $total_review = 0;
                            $query = "SELECT rating_value FROM tbl_rating WHERE turf_id = '".$data["turf_id"]."'";
                            $ratingResult = $Con->query($query);
                            while ($row = $ratingResult->fetch_assoc()) {
                                $total_review++;
                                $average_rating += $row["rating_value"];
                            }
                            if ($total_review > 0) {
                                $average_rating /= $total_review;
                            }
                        ?>

                        <div class="text-center">
                            <?php for ($star = 1; $star <= 5; $star++): ?>
                                <i class="fa-star <?php echo ($star <= round($average_rating)) ? '' : 'unfilled'; ?>"></i>
                            <?php endfor; ?>
                        </div>

                        <a href="BookTurf.php?did=<?php echo $data['turf_id']; ?>" class="btn">Book Now</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }


  function getTurf(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxTurf.php?did=" + did,
      success: function (result) {

        $("#search").html(result);
      }
    });
  }

</script>
</html>
<?php
include("Foot.php");
?>