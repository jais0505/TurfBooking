<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$type=$_POST["txt_type"];
	$insQry="insert into tbl_type(type_name) values('".$type."')";
	if($Con->query($insQry))
	{
		?>
		<script>
		alert('Type Added')
		window.location="Type.php";
		</script>
        <?php
	}
}
if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_type where type_id=".$did;
	if($Con->query($delQry))
	{
		?>
		<script>
		alert('Type Removed')
		window.location="Type.php";
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

<body>
<div class="container mt-5">
  <!-- First Form: Add Type -->
  <form id="form1" name="form1" method="post" action="">
    <div class="mb-3">
      <label for="txt_type" class="form-label">Type</label>
      <input type="text" class="form-control" name="txt_type" id="txt_type" placeholder="Enter type" />
    </div>

    <div class="d-grid gap-2">
      <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
    </div>
  </form>

  <!-- Second Form: Display Types -->
  <form id="form2" name="form2" method="post" action="" class="mt-4">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>SLNO</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $selQry="select * from tbl_type";
            $result=$Con->query($selQry);
            $i=0;
            while($data=$result->fetch_assoc()) {
              $i++;
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["type_name"]; ?></td>
            <td>
              <a href="type.php?did=<?php echo $data["type_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </form>
</div>
</body>
</html>
<?php
include("Foot.php");
?>
