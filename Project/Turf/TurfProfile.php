<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
//session_start();
$selQry="select * from tbl_turf where turf_id=".$_SESSION["tid"];
$result=$Con->query($selQry);
$data=$result->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="container mt-4">
    <div class="card">
      <div class="card-body">
        <div class="text-center">
          <img src="../Assets/Files/Turf/Photo/<?php echo $data["turf_photo"] ?>" class="img-fluid rounded-circle" alt="Turf Photo" style="width:200px; height:200px" />
        </div>
        <table class="table table-bordered mt-3">
          <tbody>
            <tr>
              <td><strong>Name</strong></td>
              <td><?php echo $data["turf_name"] ?></td>
            </tr>
            <tr>
              <td><strong>Email</strong></td>
              <td><?php echo $data["turf_email"] ?></td>
            </tr>
            <tr>
              <td><strong>Address</strong></td>
              <td><?php echo $data["turf_address"] ?></td>
            </tr>
          </tbody>
        </table>
        <div class="text-center mt-4">
          <a href="Editprofile.php" class="btn btn-primary">Edit Profile</a>
          <a href="Changepassword.php" class="btn btn-secondary">Change Password</a>
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