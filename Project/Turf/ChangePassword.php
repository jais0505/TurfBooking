<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
//session_start();
$selQry="select * from tbl_turf where turf_id=".$_SESSION["tid"];
$result=$Con->query($selQry);
$data=$result->fetch_assoc();
if(isset($_POST["btn_update"]))
{
    $oldpassword=$_POST["txt_oldpassword"];
	$newpassword=$_POST["txt_newpassword"];
	$confirmpassword=$_POST["txt_confirmpassword"];
	
    $dbpassword=$data['turf_password'];

if($dbpassword==$oldpassword)
{
	if($newpassword==$confirmpassword)
	{
		$upQry="update tbl_turf set turf_password='".$newpassword."' where turf_id=".$_SESSION["tid"];
	if($Con->query($upQry))
	{
	
		
		?>
        
        <script>
		alert('Password Updated')
		window.location="TurfProfile.php";
		</script>
        <?php
	}
	}
	else
	{
		?>
        <script>
		alert("Password MisMatch");
		window.location="Changepassword.php";
		</script>
        <?php
		}
	}
	else
	{
		?>	
        <script>
		alert("Password Inncorect");
		window.location="Changepassword.php";
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
    <div style="margin: 20px;">
        <form id="form1" name="form1" method="post" action="">
            <div style="border: 1px solid #ccc; border-radius: 5px; padding: 20px;">
                <h3>Change Password</h3>
                <div style="margin-bottom: 15px;">
                    <label for="txt_oldpassword">Old Password</label>
                    <input type="password" name="txt_oldpassword" id="txt_oldpassword" required style="width: 100%; padding: 10px;" />
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="txt_newpassword">New Password</label>
                    <input type="password" name="txt_newpassword" id="txt_newpassword" required style="width: 100%; padding: 10px;" />
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="txt_confirmpassword">Confirm Password</label>
                    <input type="password" name="txt_confirmpassword" id="txt_confirmpassword" required style="width: 100%; padding: 10px;" />
                </div>
                <div style="text-align: center;">
                    <input type="submit" name="btn_update" id="btn_update" value="Update" style="padding: 10px 20px;" />
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include("Foot.php");
?>