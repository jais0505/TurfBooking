<?php
$name="";
$eid=0;
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	$address=$_POST["txt_address"];
	$district=$_POST["sel_district"];
	$place=$_POST["sel_place"];
	$proof=$_FILES["file_proof"]["name"];
	$temp=$_FILES["file_proof"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Files/Turf/Proof/".$proof);
	$photo=$_FILES["file_photo"]["name"];
	$temp=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Files/Turf/Photo/".$photo);
	$type=$_POST["sel_type"];
	$insQry="insert into tbl_turf(turf_name,turf_email,turf_password,turf_address,place_id,turf_proof,turf_photo,type_id) values('".$name."','".$email."','".$password."','".$address."','".$place."','".$proof."','".$photo."','".$type."')";
	if($Con->query($insQry))
	{
		?>
		<script>
		alert('Turf Registration Completed')
		window.location="Turf.php";
		</script>
        <?php
	}
}
if(isset($_GET["eid"]))
{
	$eid=$_GET["eid"];
	$seldistrict="select * from tbl_turf where turf_id=".$eid;
	$selresult=$Con->query($seldistrict);
	$seldata=$selresult->fetch_assoc();
	$name=$seldata["turf_name"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Turf Registration</title>
</head>

<body>
    <div class="container mt-5">
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txt_name" class="form-label">Name</label>
                <input type="text" class="form-control" required name="txt_name" id="txt_name" title="Name Allows Only Alphabets, Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" placeholder="Enter turf name">
            </div>

            <div class="mb-3">
                <label for="txt_email" class="form-label">Email</label>
                <input type="email" class="form-control" required name="txt_email" id="txt_email" placeholder="Enter email">
            </div>

            <div class="mb-3">
                <label for="txt_password" class="form-label">Password</label>
                <input type="password" class="form-control" name="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Enter a strong password">
            </div>

            <div class="mb-3">
                <label for="txt_conpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="txt_conpassword" required placeholder="Confirm your password">
            </div>

            <div class="mb-3">
                <label for="txt_address" class="form-label">Address</label>
                <textarea class="form-control" name="txt_address" required placeholder="Enter your address"></textarea>
            </div>

            <div class="mb-3">
                <label for="sel_district" class="form-label">District</label>
                <select class="form-select" name="sel_district" id="sel_district" onChange="getPlace(this.value)">
                    <option value="">----------select-----------</option>
                    <?php 
                        $seloptionQry = "select * from tbl_district";
                        $optionResult = $Con->query($seloptionQry);
                        while($optiondata = $optionResult->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $optiondata['district_id']?>">
                        <?php echo $optiondata['district_name']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="sel_place" class="form-label">Place</label>
                <select class="form-select" name="sel_place" id="sel_place">
                    <option value="">----------select-----------</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="file_proof" class="form-label">Proof</label>
                <input type="file" class="form-control" name="file_proof" id="file_proof">
            </div>

            <div class="mb-3">
                <label for="file_photo" class="form-label">Photo</label>
                <input type="file" class="form-control" name="file_photo" id="file_photo">
            </div>

            <div class="mb-3">
                <label for="sel_type" class="form-label">Type</label>
                <select class="form-select" name="sel_type" id="sel_type">
                    <option value="">----------select-----------</option>
                    <?php 
                        $seloptionQry = "select * from tbl_type";
                        $optionResult = $Con->query($seloptionQry);
                        while($optiondata = $optionResult->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $optiondata['type_id']?>">
                        <?php echo $optiondata['type_name']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
            </div>
        </form>
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

</script>
</html>
<?php
include("Foot.php");
?>