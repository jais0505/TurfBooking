<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
//session_start();
if(isset($_POST["btn_submit"]))
{
	$start=$_POST["txt_start"];
	$end=$_POST["txt_end"];
	$amount=$_POST["txt_amount"];
	$selTime="select * from tbl_time where time_start='".$start."' and time_end='".$end."'";
	$resTime=$Con->query($selTime);
	if($data=$resTime->fetch_assoc())
	{
		?>
		<script>
        alert("Time slot already exist...")
		window.location = "Time.php"
        </script>
		<?php
	}
	else
	{
	if($start!=$end)
	{
	$insQry="insert into tbl_time(time_start,time_end,time_amount,turf_id) values('".$start."','".$end."','".$amount."','".$_SESSION["tid"]."')";
	if($Con->query($insQry))
	{
		?>
		<script>
        alert("Data Inserted...")
		window.location = "Time.php"
        </script>
		<?php
	}
	}
	else
	{
		
		?>
		<script>
        alert("Starting and Ending time should not be same...")
		window.location = "Time.php"
        </script>
		<?php
		
	}
	}
}
if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_time where time_id=".$did;
	if($Con->query($delQry))
	{
		?>
		<script>
        alert("Data Deleted...")
		window.location = "Time.php"
        </script>
		<?php
	}
}
?>
<!DOCtime html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-time" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    <div style="margin: 20px;">
        <form id="form1" name="form1" method="post" action="">
            <div style="border: 1px solid #ccc; border-radius: 5px; padding: 20px; margin-bottom: 20px;">
                <h3>Add Time</h3>
                <div style="margin-bottom: 15px;">
                    <label for="txt_start">Start Time</label>
                    <input type="time" name="txt_start" id="txt_start" style="width: 100%; padding: 10px;" />
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="txt_end">End Time</label>
                    <input type="time" name="txt_end" id="txt_end" style="width: 100%; padding: 10px;" />
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="txt_amount">Amount</label>
                    <input type="text" name="txt_amount" id="txt_amount" style="width: 100%; padding: 10px;" />
                </div>
                <div style="text-align: center;">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" style="padding: 10px 20px;" />
                </div>
            </div>
        </form>

        <form id="form2" name="form2" method="post" action="">
            <div style="border: 1px solid #ccc; border-radius: 5px; padding: 20px;">
                <h3>Time Records</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ccc; padding: 8px;">SLNO</th>
                            <th style="border: 1px solid #ccc; padding: 8px;">Start Time</th>
                            <th style="border: 1px solid #ccc; padding: 8px;">End Time</th>
                            <th style="border: 1px solid #ccc; padding: 8px;">Amount</th>
                            <th style="border: 1px solid #ccc; padding: 8px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $selQry = "SELECT * FROM tbl_time where turf_id = ".$_SESSION['tid'];
                        $result = $Con->query($selQry);
                        $i = 0;
                        while ($data = $result->fetch_assoc()) {
                            $i++;
                        ?>
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 8px;"><?php echo $i; ?></td>
                            <td style="border: 1px solid #ccc; padding: 8px;"><?php echo $data["time_start"]; ?></td>
                            <td style="border: 1px solid #ccc; padding: 8px;"><?php echo $data["time_end"]; ?></td>
                            <td style="border: 1px solid #ccc; padding: 8px;"><?php echo $data["time_amount"]; ?></td>
                            <td style="border: 1px solid #ccc; padding: 8px;">
                                <a href="Time.php?did=<?php echo $data["time_id"]; ?>" style="color: red;">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include("Foot.php");
?>