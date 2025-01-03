<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
//session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <div class="table-responsive">
        <table border="1" cellpadding="10" class="table table-striped">
            <thead>
                <tr>
                    <th>Sl NO</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Turf</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $selQry = "SELECT * FROM tbl_booking b 
                                INNER JOIN tbl_time t ON b.time_id = t.time_id 
                                INNER JOIN tbl_turf f ON b.turf_id = f.turf_id where b.user_id = ".$_SESSION['uid'];
                    $result = $Con->query($selQry);
                    if ($result->num_rows > 0) {
                        $i = 0;
                        while ($data = $result->fetch_assoc()) {
                            $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo htmlspecialchars($data["booking_date"]); ?></td>
                    <td><?php echo htmlspecialchars($data["time_start"]) . ' - ' . htmlspecialchars($data["time_end"]); ?></td>
                    <td><?php echo htmlspecialchars($data["turf_name"]); ?></td>
                    <td>
                        <?php 
                        if ($data["booking_status"] == '1') {
                            echo '<span style="color: orange;">Booked</span>';
                        } elseif ($data["booking_status"] == '2') {
                            ?>
                            <span style="color: green;">Completed</span> |
                            <?php
                            $selqry1="select * from tbl_rating where turf_id=".$data["turf_id"];


                            $resultOne = $Con->query($selqry1);
                    if ($resultOne->num_rows <= 0) {
                        ?>
                                  <a href="Rating.php?tid=<?php echo $data["turf_id"] ?>">Rate</a> 
                    <?php
                                }
                                ?>
                                  
                                  | 
                                  <a href="PostComplaint.php?tid=<?php echo  $data["turf_id"] ?>">Post Complaint</a>
                                  <?php
                        } else {
                            echo '<span style="color: red;">Booking not completed</span>';
                        }
                        ?>
                    </td>
                </tr>
                <?php 
                        }
                    } else {
                        echo '<tr><td colspan="5" style="text-align: center;">No bookings found.</td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</form>


</body>
</html>
<?php
include("Foot.php");
?>