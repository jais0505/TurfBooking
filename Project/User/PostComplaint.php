<?php
//session_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
$id="";
$title="";
$content="";
$eid=0;
if(isset($_POST["btn_submit"]))
{
	$eid=$_POST["txt_eid"];
	$id=$_SESSION["uid"];
	$title=$_POST["txt_title"];
	$content=$_POST["txt_content"];
	if($eid==0){
		$insQry="insert into tbl_complaint(complaint_title,complaint_content,user_id,turf_id) values('".$title."','".$content."','".$id."','".$_GET["tid"]."')";
		if($Con->query($insQry))
		{
			?>
			<script>
			alert("Inserted")
            window.location="PostComplaint.php"
            </script>
			<?php
		}
	}
	else {
		$upQry="update tbl_complaint set complaint_title='".$title."',complaint_content='".$content."' where complaint_id=".$eid;

		if($Con->query($upQry))
		{
			header("location:PostComplaint.php");
			echo "UPDATED";
		}

	}
}

if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_complaint where complaint_id=".$did;
	if($Con->query($delQry))
	{
		header("location:PostComplaint.php");
	}
}
if(isset($_GET["eid"]))
{
	$eid=$_GET["eid"];
	$selcomplaint="select * from tbl_complaint where complaint_id=".$eid;
	$selresult=$Con->query($selcomplaint); 
	$seldata=$selresult->fetch_assoc();
	$title=$seldata["complaint_title"];
	$content=$seldata["complaint_content"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<div class="container mt-5">
<body>
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
            <div class="card">
                <div class="card-header">
                    <h5 style="color: black;">Form Submission</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="txt_title">Title:</label>
                        <input type="text" name="txt_title" id="txt_title" value="<?php echo htmlspecialchars($title); ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="txt_content">Content:</label>
                        <textarea name="txt_content" id="txt_content" cols="45" rows="5" required><?php echo htmlspecialchars($content); ?></textarea>
                        <input type="hidden" value="<?php echo htmlspecialchars($eid); ?>" name="txt_eid" id="txt_eid" />
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn" name="btn_submit" id="btn_submit" value="Submit" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

    <div class="card">
        <div class="card-header">
            <h5 style="color: black;">Complaints List</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>SlNo.</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Reply</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $selQry = "SELECT * FROM tbl_complaint where user_id=".$_SESSION['uid'];
                        $result = $Con->query($selQry);
                        $i = 0;
                        while ($data = $result->fetch_assoc()) {
                            $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo htmlspecialchars($data["complaint_title"]); ?></td>
                            <td><?php echo htmlspecialchars($data["complaint_content"]); ?></td>
                            <td><?php echo htmlspecialchars($data["complaint_replay"]); ?></td>
                            <td>
                                <a href="PostComplaint.php?did=<?php echo $data["complaint_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div> </body>
</html>
<?php
include("Foot.php");
?>