<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
//session_start();
$selQry="select * from tbl_user where user_id=".$_SESSION["uid"];
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
<div class="container mt-4">
    <form id="form1" name="form1" method="post" action="">
        <div class="card">
            <div class="card-header">User Profile</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td><?php echo htmlspecialchars($data["user_name"]); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td><?php echo htmlspecialchars($data["user_email"]); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Contact</strong></td>
                            <td><?php echo htmlspecialchars($data["user_contact"]); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <a href="Editprofile.php" class="btn btn-primary">Edit Profile</a>
                                <a href="Changepassword.php" class="btn btn-secondary">Change Password</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>

</body>
</html>
<?php
include("Foot.php");
?>