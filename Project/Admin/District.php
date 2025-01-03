<?php
$name="";
$eid=0;
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_save"]))
{
	$name=$_POST["txt_name"];
	$eid=$_POST["txt_eid"];
	if($eid==0)
	{
		
		$insQry="insert into tbl_district(district_name) values('".$name."')";
		if($Con->query($insQry))
		{
      ?>
		<script>
		alert('District Added')
		window.location="District.php";
		</script>
        <?php
		}
	}
	else
	{
		$upQry="update tbl_district set district_name='".$name."' where district_id=".$eid;
		if($Con->query($upQry))
		{
			?>
		<script>
		alert('Updated!')
		window.location="District.php";
		</script>
        <?php
		}
	}
}	
if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_district where district_id=".$did;
	if($Con->query($delQry))
	{
		?>
		<script>
		alert('District Removed')
		window.location="District.php";
		</script>
        <?php
	}
}
if(isset($_GET["eid"]))
{
	$eid=$_GET["eid"];
	$seldistrict="select * from tbl_district where district_id=".$eid;
	$selresult=$Con->query($seldistrict);
	$seldata=$selresult->fetch_assoc();
	$name=$seldata["district_name"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>District</th>
                <th>
                  <input type="text" class="form-control" value="<?php echo $name; ?>" name="txt_name" id="txt_name" />
                  <input type="hidden" value="<?php echo $eid; ?>" name="txt_eid" id="txt_eid" />
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="2" class="text-center">
                  <input type="submit" name="btn_save" id="btn_save" value="Save" class="btn btn-primary" />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>

<form id="form2" name="form2" method="post" action="">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>SLNO</th>
                <th>District Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $selQry = "select * from tbl_district";
                $result = $Con->query($selQry);
                $i = 0;
                while ($data = $result->fetch_assoc()) {
                  $i++;
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data["district_name"]; ?></td>
                <td>
                  <a href="District.php?did=<?php echo $data['district_id']; ?>" class="btn btn-danger btn-sm">Delete</a> 
                  <a href="District.php?eid=<?php echo $data['district_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>
</body>

</html>
<?php
include("Foot.php");
?>