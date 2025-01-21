<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
//session_start();
$selQry="select * from tbl_user where user_id=".$_SESSION["uid"];
$result=$Con->query($selQry);
$data=$result->fetch_assoc();
if(isset($_POST["btn_update"]))
{
    $oldpassword=$_POST["txt_oldpassword"];
	$newpassword=$_POST["txt_newpassword"];
	$confirmpassword=$_POST["txt_confirmpassword"];
	
    $dbpassword=$data['user_password'];

if($dbpassword==$oldpassword)
{
	if($newpassword==$confirmpassword)
	{
		$upQry="update tbl_user set user_password='".$confirmpassword."' where user_id=".$_SESSION["uid"];
	if($Con->query($upQry))
	{
	
		
		?>
        
        <script>
		alert('Password Updated')
		window.location="MyProfile.php";
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
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
            <div class="card">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="txt_oldpassword">Old Password</label>
                        <input type="password" name="txt_oldpassword" id="txt_oldpassword" required />
                    </div>
                    <div class="form-group">
                        <label for="txt_newpassword">New Password</label>
                        <input type="password" name="txt_newpassword" id="txt_newpassword" required />
                    </div>
                    <div class="form-group">
                        <label for="txt_confirmpassword">Confirm Password</label>
                        <input type="password" name="txt_confirmpassword" id="txt_confirmpassword" required />
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn" name="btn_update" id="btn_update" value="Update" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include("Foot.php");
?>