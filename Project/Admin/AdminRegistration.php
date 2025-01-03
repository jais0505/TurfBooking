<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	$insQry="insert into tbl_admin(admin_name,admin_email,admin_password) values('".$name."','".$email."','".$password."')";
	if($Con->query($insQry))
	{
		?>
		<script>
		alert('Admin Registration Completed')
		window.location="AdminRegistration.php";
		</script>
        <?php
	}
}
if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_admin where admin_id=".$did;
	if($Con->query($delQry))
	{
		header("location:AdminRegistration.php");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
</head>

<body>
<div class="container">
  <form id="form1" name="form1" method="post" action="" class="mt-5">
    <div class="mb-3">
      <label for="txt_name" class="form-label">Name</label>
      <input type="text" class="form-control" name="txt_name" id="txt_name">
    </div>
    <div class="mb-3">
      <label for="txt_email" class="form-label">Email</label>
      <input type="email" class="form-control" name="txt_email" id="txt_email">
    </div>
    <div class="mb-3">
      <label for="txt_password" class="form-label">Password</label>
      <input type="password" class="form-control" name="txt_password" id="txt_password">
    </div>
    <div class="text-center">
      <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit">
      <input type="submit" class="btn btn-secondary" name="btn_cancel" id="btn_cancel" value="Cancel">
    </div>
  </form>

  <!-- Table for displaying admin data -->
  <table class="table table-bordered table-striped mt-5">
    <thead>
      <tr>
        <th>SlNo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $selQry="select * from tbl_admin";
        $result=$Con->query($selQry);
        $i=0;
        while($data=$result->fetch_assoc()) {
          $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data["admin_name"]; ?></td>
        <td><?php echo $data["admin_email"]; ?></td>
        <td><?php echo $data["admin_password"]; ?></td>
        <td><a href="AdminRegistration.php?did=<?php echo $data["admin_id"]; ?>" class="btn btn-danger btn-sm">Delete</a></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
</body>

</html>
<?php
include("Foot.php");
?>