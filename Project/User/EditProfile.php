<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
//session_start();
$selQry="select * from tbl_user where user_id=".$_SESSION["uid"];
$result=$Con->query($selQry);
$data=$result->fetch_assoc();
if(isset($_POST["btn_update"]))
{
    $name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$contact=$_POST["txt_contact"];
	$upQry="update tbl_user set user_name='".$name."',user_email='".$email."',user_contact='".$contact."' where user_id=".$_SESSION["uid"];
	if($Con->query($upQry))
	{
	
		echo "updated";
		$aid=0;
		?>
        <script>
		window.location="MyProfile.php";
		</script>
        <?php
	}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>

<body>
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="txt_name">Name</label>
                        <input type="text" name="txt_name" value="<?php echo htmlspecialchars($data['user_name']); ?>" id="txt_name" required />
                    </div>
                    <div class="form-group">
                        <label for="txt_email">Email</label>
                        <input type="email" name="txt_email" value="<?php echo htmlspecialchars($data['user_email']); ?>" id="txt_email" required />
                    </div>
                    <div class="form-group">
                        <label for="txt_contact">Contact</label>
                        <input type="text" name="txt_contact" value="<?php echo htmlspecialchars($data['user_contact']); ?>" id="txt_contact" required />
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