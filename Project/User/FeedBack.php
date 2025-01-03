<?php
include("../Assets/Connection/Connection.php");
$content="";
$eid=0;
if(isset($_POST["btn_submit"]))
{
	$eid=$_POST["txt_eid"];
	$content=$_POST["txt_content"];
	if($eid==0)
	{
		$insQry="insert into tbl_feedback(feedback_content) values('".$content."')";
		if($Con->query($insQry))
			
		{
			echo "INSERTED";
		}
	}
	else 
	{
		$upQry="update tbl_feedback set feedback_content='".$content."' where feedback_id=".$eid;

		if($Con->query($upQry))
		{
			header("location:Feedback.php");
			echo "UPDATED";
		}
	}
}
if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="delete from tbl_feedback where feedback_id=".$did;
	if($Con->query($delQry))
	{
		header("location:Feedback.php");
	}
}
if(isset($_GET["eid"]))
{
	$eid=$_GET["eid"];
	$selfeedback="select * from tbl_Feedback where feedback_id=".$eid;
	$selresult=$Con->query($selfeedback); 
	$seldata=$selresult->fetch_assoc();
	$content=$seldata["feedback_content"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="Feedback.php">
  <table width="200" border="1">
    <tr>
      <td>Content:</td>
      <td><label for="txt_content"></label>
      <textarea name="txt_content" value="<?php echo $content; ?>" id="txt_content" cols="45" rows="5"></textarea>
       <input type="hidden" value="<?php echo $eid;?>" name="txt_eid" id="txt_eid" />
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<br />
<table width="200" border="1">
  <tr>
    <td>SlNo.</td>
    <td>Content</td>
    <td>Action</td>
  </tr>
  <?php
	    $selQry="select * from tbl_feedback";
		$result=$Con->query($selQry);
		$i=0;
		while($data=$result->fetch_assoc())
		{
		$i++;	
	  ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data["feedback_content"]; ?></td>
         <td><a href="
         feedback.php?did=<?php echo $data["feedback_id"];?>">Delete</a>
        	<a href="Feedback.php?eid=<?php echo $data["feedback_id"];?>">Edit</a>
        </td>
      </tr>
      <?php
		}
	?>
</table>
</body>
</html>