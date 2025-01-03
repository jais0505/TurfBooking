<?php
$eid=0;
include("../Assets/Connection/Connection.php");
include("Head.php");
//session_start();
if(isset($_POST["btn_book"]))
{
	$turf = $_GET["did"];
	$date=$_POST["txt_date"];
	$time=$_POST["sel_time"];
	$selAmount="select * from tbl_time where time_id=".$_POST["sel_time"];
	$selresult2=$Con->query($selAmount);
	$seldata=$selresult2->fetch_assoc();
	$amount=$seldata["time_amount"];
	
	$select = "select * from tbl_booking where booking_date='".$date."' and time_id=".$time;
	$result = $Con->query($select);
	if($data = $result->fetch_assoc())
	{
		?>
		<script>
        alert("Slot Already Booked..")
        </script>
		<?php
	}
	else
	{
		$insQry="insert into tbl_booking(turf_id,booking_date,time_id,user_id,booking_amount) values(?,?,?,?,?)";
		if($stmt = $Con->prepare($insQry))
		{
			$stmt->bind_param('sssss',$turf,$date,$time,$_SESSION["uid"],$amount);
			if($stmt->execute())
			{
				$bookingid = $Con->insert_id;
				?>
				<script>
				window.location="Payment.php?bid=<?php echo $bookingid?>";
				</script>
				<?php
			}
		}
	}
}
if(isset($_GET["eid"]))
{
	$eid=$_GET["eid"];
	$seldistrict="select * from tbl_booking where turf_id=".$eid;
	$selresult=$Con->query($seldistrict);
	$seldata=$selresult->fetch_assoc();
	$name=$seldata["turf_name"];
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
                <div class="card-header">
                    <h5  style="color: black;">Book Turf</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="txt_date">Date</label>
                        <input type="date" name="txt_date" id="txt_date" min="<?php echo date('Y-m-d')?>" required>
                    </div>

                    <div class="form-group">
                        <label for="sel_time">Time Slot</label>
                        <select name="sel_time" id="sel_time" required>
                            <option value="">----------select-----------</option>
                            <?php 
                                $seloptionQry="select * from tbl_time where turf_id=".$_GET["did"];
                                $optionResult=$Con->query($seloptionQry);
                                while($optiondata=$optionResult->fetch_assoc()) {
                            ?>	
                            <option value="<?php echo $optiondata["time_id"]?>">
                                <?php echo $optiondata["time_start"]; ?> - 
                                <?php echo $optiondata["time_end"]; ?> 
                                Amount - ₹<?php echo $optiondata["time_amount"]; ?>
                            </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn" name="btn_book" id="btn_book" value="Book">
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