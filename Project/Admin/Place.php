<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$district=$_POST["sel_district"];
	$place=$_POST["txt_place"];
	$pincode=$_POST["txt_pincode"];
	$insQry="insert into tbl_place(place_name,district_id,place_pincode) values('".$place."','".$district."','".$pincode."')";
	if($Con->query($insQry))
	{
		?>
		<script>
		alert('Place Added')
		window.location="Place.php";
		</script>
        <?php
	}
}
if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_place where place_id=".$did;
	if($Con->query($delQry))
	{
		?>
		<script>
		alert('Place Removed')
		window.location="Place.php";
		</script>
        <?php
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>
<div class="container mt-5">
  <form id="form1" name="form1" method="post" action="">
    <div class="mb-3">
      <label for="sel_district" class="form-label">District</label>
      <select class="form-select" name="sel_district" id="sel_district">
        <option>----------select-----------</option>
        <?php 
          $seloptionQry = "select * from tbl_district";
          $optionResult = $Con->query($seloptionQry);
          while($optiondata = $optionResult->fetch_assoc()) {
        ?>
        <option value="<?php echo $optiondata["district_id"]; ?>">
          <?php echo $optiondata["district_name"]; ?>
        </option>
        <?php
          }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="txt_place" class="form-label">Place</label>
      <input type="text" class="form-control" name="txt_place" id="txt_place" placeholder="Enter place" />
    </div>

    <div class="mb-3">
      <label for="txt_pincode" class="form-label">Pincode</label>
      <input type="text" class="form-control" name="txt_pincode" id="txt_pincode" placeholder="Enter pincode" />
    </div>

    <div class="d-grid gap-2">
      <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" class="btn btn-secondary" name="btn_cancel" id="btn_cancel" value="Cancel" />
    </div>
  </form>
</div>
<br>
<br>
          
<div>
<?php 
    $selQry = "select * from tbl_place";
    $result = $Con->query($selQry);
    $i = 0;
?>
<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>SINo</th>
            <th>Place Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($data = $result->fetch_assoc()) { 
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($data["place_name"], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <a href="Place.php?did=<?php echo $data['place_id']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                   
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>

</body>
</html>
<?php
include("Foot.php");
?>