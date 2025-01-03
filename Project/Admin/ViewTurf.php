<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_GET['did']))
{
	$update="update tbl_turf set turf_vstatus='1' where turf_id =".$_GET['did'];
	if($Con->query($update))
	{
		?>
        <script>
		alert('Verified');
		window.location="ViewTurf.php";
		</script>
        <?php
	}
}
if(isset($_GET['eid']))
{
	$update="update tbl_turf set turf_vstatus='2' where turf_id =".$_GET['eid'];
	if($Con->query($update))
	{
		?>
        <script>
		alert('Rejected');
		window.location="ViewTurf.php";
		</script>
        <?php
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turf Management</title>
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <!-- New Turfs Section -->
    <h3>New Turfs</h3>
    <table class="table table-responsive table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">SLNO</th>
          <th scope="col">Turf Name</th>
          <th scope="col">Email</th>
          <th scope="col">Address</th>
          <th scope="col">District</th>
          <th scope="col">Place</th>
          <th scope="col">Proof</th>
          <th scope="col">Photo</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $selQry = "select * from tbl_turf t inner join tbl_place p on t.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where turf_vstatus=0";
        $result = $Con->query($selQry);
        $i = 0;
        while($data = $result->fetch_assoc()) {
          $i++;
      ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $data["turf_name"]; ?></td>
          <td><?php echo $data["turf_email"]; ?></td>
          <td><?php echo $data["turf_address"]; ?></td>
          <td><?php echo $data["district_name"]; ?></td>
          <td><?php echo $data["place_name"]; ?></td>
          <td><a href="../Assets/Files/Turf/Photo/<?php echo $data["turf_proof"]; ?>" class="btn btn-link">View Proof</a></td>
          <td><img src="../Assets/Files/Turf/Photo/<?php echo $data["turf_photo"]; ?>" width="150" height="150" class="img-fluid" /></td>
          <td>
            <a href="ViewTurf.php?did=<?php echo $data['turf_id']; ?>" class="btn btn-success btn-sm">Accept</a>
            <a href="ViewTurf.php?eid=<?php echo $data['turf_id']; ?>" class="btn btn-danger btn-sm">Reject</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

    <!-- Verified Turfs Section -->
    <h3>Verified Turfs</h3>
    <table class="table table-responsive table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">SLNO</th>
          <th scope="col">Turf Name</th>
          <th scope="col">Email</th>
          <th scope="col">Address</th>
          <th scope="col">District</th>
          <th scope="col">Place</th>
          <th scope="col">Proof</th>
          <th scope="col">Photo</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $selQry = "select * from tbl_turf t inner join tbl_place p on t.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where turf_vstatus=1";
        $result = $Con->query($selQry);
        $i = 0;
        while($data = $result->fetch_assoc()) {
          $i++;
      ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $data["turf_name"]; ?></td>
          <td><?php echo $data["turf_email"]; ?></td>
          <td><?php echo $data["turf_address"]; ?></td>
          <td><?php echo $data["district_name"]; ?></td>
          <td><?php echo $data["place_name"]; ?></td>
          <td><a href="<?php echo $data["turf_proof"]; ?>" class="btn btn-link">View Proof</a></td>
          <td><img src="../Assets/Files/Turf/Photo/<?php echo $data["turf_photo"]; ?>" width="150" height="150" class="img-fluid" /></td>
          <td><a href="ViewTurf.php?eid=<?php echo $data['turf_id']; ?>" class="btn btn-danger btn-sm">Reject</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

    <!-- Rejected Turfs Section -->
    <h3>Rejected Turfs</h3>
    <table class="table table-responsive table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">SLNO</th>
          <th scope="col">Turf Name</th>
          <th scope="col">Email</th>
          <th scope="col">Address</th>
          <th scope="col">District</th>
          <th scope="col">Place</th>
          <th scope="col">Proof</th>
          <th scope="col">Photo</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $selQry = "select * from tbl_turf t inner join tbl_place p on t.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where turf_vstatus=2";
        $result = $Con->query($selQry);
        $i = 0;
        while($data = $result->fetch_assoc()) {
          $i++;
      ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $data["turf_name"]; ?></td>
          <td><?php echo $data["turf_email"]; ?></td>
          <td><?php echo $data["turf_address"]; ?></td>
          <td><?php echo $data["district_name"]; ?></td>
          <td><?php echo $data["place_name"]; ?></td>
          <td><a href="<?php echo $data["turf_proof"]; ?>" class="btn btn-link">View Proof</a></td>
          <td><img src="../Assets/Files/Turf/Photo/<?php echo $data["turf_photo"]; ?>" width="150" height="150" class="img-fluid" /></td>
          <td><a href="ViewTurf.php?did=<?php echo $data['turf_id']; ?>" class="btn btn-success btn-sm">Accept</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS CDN (Optional but recommended for Bootstrap components) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        </body>

</html>
<?php
include("Foot.php");
?>