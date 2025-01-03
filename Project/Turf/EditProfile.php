<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
//session_start();
$selQry="select * from tbl_turf where turf_id=".$_SESSION["tid"];
$result=$Con->query($selQry);
$data=$result->fetch_assoc();
if(isset($_POST["btn_update"]))
{
	
    $name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$address=$_POST["txt_address"];
	echo $upQry="update tbl_turf set  turf_name='".$name."',turf_email='".$email."',turf_address='".$address."' where turf_id=".$_SESSION["tid"];
	if($Con->query($upQry))
	{
	
		echo "updated";
		$aid=0;
		?>
        <script>
		window.location="TurfProfile.php";
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
                <h3>Update Profile</h3>
                <div style="margin-bottom: 15px;">
                    <label for="txt_name">Name</label>
                    <input type="text" name="txt_name" value="<?php echo htmlspecialchars($data['turf_name']); ?>" id="txt_name" style="width: 100%; padding: 10px;"/>
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="txt_email">Email</label>
                    <input type="email" name="txt_email" value="<?php echo htmlspecialchars($data['turf_email']); ?>" id="txt_email" style="width: 100%; padding: 10px;"/>
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="txt_address">Address</label>
                    <input type="text" name="txt_address" value="<?php echo htmlspecialchars($data['turf_address']); ?>" id="txt_address" style="width: 100%; padding: 10px;"/>
                </div>
                <div style="text-align: center;">
                    <input type="submit" name="btn_update" id="btn_update" value="Update" style="padding: 10px 20px;"/>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include("Foot.php");
?>