<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_login"]))
{
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$resAdmin=$Con->query($selAdmin);
	$selUser="select * from tbl_user where user_email='".$email."' and user_password='".$password."'";
	$resUser=$Con->query($selUser);
	$selTurf="select * from tbl_turf where turf_email='".$email."' and turf_password='".$password."'";
	$resTurf=$Con->query($selTurf);
	
	if($data=$resAdmin->fetch_assoc())
	{
		$_SESSION['aid']=$data["admin_id"];
		$_SESSION['aname']=$data["admin_name"];
		header("location:../Admin/AdminHome.php");	
	}
	else if($data=$resUser->fetch_assoc())
	{
		$_SESSION['uid']=$data["user_id"];
		$_SESSION['uname']=$data["user_name"];
		header("location:../User/UserHome.php");
	}
	else if($data=$resTurf->fetch_assoc())
	{
        if($data['turf_vstatus']==1){
		$_SESSION['tid']=$data["turf_id"];
		$_SESSION['tname']=$data["turf_name"];
		header("location:../Turf/TurfHome.php");
        }
        else if($data['turf_vstatus']==2){
            ?>
			<script>
			alert("Verfication rejected, Can't Login");
            //window.location="PostComplaint.php"
            </script>
			<?php

        }
        else{
            ?>
			<script>
			alert("Verification Pending, Can't Login");
            //window.location="PostComplaint.php"
            </script>
			<?php

        }
	}
	else
	{
		?>
			<script>
			alert("Invalid email or password");
            //window.location="PostComplaint.php"
            </script>
			<?php
	}	
	
}

?>



<!-- <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
  <link rel="stylesheet" href="../Assets/Template/Login/style.css">

</head>
<body>
 partial:index.partial.html 
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="txt_email" placeholder="Email" required="">
					<input type="password" name="txt_password" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>

			<div class="login">
				<form method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="txt_email" placeholder="Email" required="">
					<input type="password" name="txt_password" placeholder="Password" required="">
					<button type="submit" name="btn_login">Submit</button>
				</form>
			</div>
	</div>
</body>
</html>
 partial
</body>
</html> -->



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  


  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post">
        <h3>Login</h3>

        <label for="username">Email</label>
		<input type="email" name="txt_email" placeholder="Email id" required="">
        <label for="password">Password</label>
		<input type="password" name="txt_password" placeholder="Password" required="">
		<button type="submit" name="btn_login">Log In</button>
        
    </form>
</body>
</html>
<!-- partial -->
  
</body>
</html>
