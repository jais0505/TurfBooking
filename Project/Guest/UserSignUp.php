<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$contact=$_POST["txt_contact"];
	$password=$_POST["txt_password"];
	$confirm=$_POST["txt_confirm"];
	
	$insQry="insert into tbl_user(user_name,user_email,user_password,user_contact) values('".$name."','".$email."','".$password."','".$contact."')";
	
	if($password==$confirm)
	{
		if($Con->query($insQry))
		{
			?>
			<script>
			alert("Successfully SignUp...")
            window.location="Login.php";
            </script>
            <?php
		}
		else{
			echo "Failed";
		}
	}
	else
	{
		echo "Password missmatch";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>
</head>

<body>
    <div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <div class="mb-3">
                <label for="txt_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Enter your name">
            </div>

            <div class="mb-3">
                <label for="txt_email" class="form-label">Email</label>
                <input type="email" class="form-control" required name="txt_email" placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label for="txt_contact" class="form-label">Contact No</label>
                <input type="text" class="form-control" name="txt_contact" id="txt_contact" placeholder="Enter your contact number">
            </div>

            <div class="mb-3">
                <label for="txt_password" class="form-label">Password</label>
                <input type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase, and lowercase letter, and at least 8 or more characters" required name="txt_password" placeholder="Enter a strong password">
            </div>

            <div class="mb-3">
                <label for="txt_confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="txt_confirm" id="txt_confirm" placeholder="Confirm your password">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Register">
            </div>
        </form>
    </div>

</body>
</html>
<?php
include("Foot.php");
?>