<?php
include("../Assets/Connection/Connection.php");
//session_start();
include("Head.php");
if(isset($_GET["sid"]))
{
	$sid=$_GET["sid"];
	$upQry="update tbl_booking set booking_status='2' where booking_id=".$sid;
	if($Con->query($upQry))
	{
		header("location:ViewUserBooking.php");
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
<div class="container mt-4">
    <form id="form1" name="form1" method="post" action="">
        <div class="card">
            <div class="card-header">Booking Details</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SI NO</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>User Name</th>
                            <th>Contact</th>
                            <th>Play Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $selQry = "SELECT * FROM tbl_booking b 
                                    INNER JOIN tbl_time t ON b.time_id = t.time_id 
                                    INNER JOIN tbl_user f ON b.user_id = f.user_id where b.turf_id = ".$_SESSION['tid'];
                        $result = $Con->query($selQry);
                        $i = 0;
                        
                        if ($result->num_rows === 0) {
                            echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                        } else {
                            while ($data = $result->fetch_assoc()) {
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data["booking_date"]; ?></td>
                            <td><?php echo $data["time_start"] . ' - ' . $data["time_end"]; ?></td>
                            <td><?php echo $data["user_name"]; ?></td>
                            <td><?php echo $data["user_contact"]; ?></td>
                            <td>
                                <?php
                                if ($data["booking_status"] == 1) {
                                    echo "<span class='text-success'>Payed</span> | <a href='ViewUserBooking.php?sid={$data["booking_id"]}' class='btn btn-link'>Played</a>";
                                } elseif ($data["booking_status"] == 2) {
                                    echo "<span class='text-info'>Completed</span>";
                                } else {
                                    echo "<span class='text-danger'>Not Payed</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        <?php 
                            }
                        } 
                        ?>
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