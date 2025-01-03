<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
$reply="";
$eid=0;
if(isset($_POST["btn_submit"]))
{
	$eid=$_POST["txt_eid"];
	$reply=$_POST["txt_reply"];
	if($eid==0)
	{
		$insQry="insert into tbl_complaint(complaint_reply) values('".$reply."')";
		if($Con->query($insQry))
			
		{
			echo "INSERTED";
		}
	}
	else 
	{
		$upQry="update tbl_complaint set complaint_replay='".$reply."' where complaint_id=".$eid;

		if($Con->query($upQry))
		{
			header("location:ViewComplaints.php");
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
		header("location:ViewComplaints.php");
	}
}
if(isset($_GET["eid"]))
{
	$eid=$_GET["eid"];
	$selfeedback="select * from tbl_complaint where complaint_id=".$eid;
	$selresult=$Con->query($selfeedback); 
	$seldata=$selresult->fetch_assoc();
	$content=$seldata["complaint_replay"];
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Reply:</td>
      <td><label for="txt_reply"></label>
        
      <textarea name="txt_reply"  id="txt_reply" cols="45" rows="5"></textarea>
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
</body>
</html>
<?php
include("Foot.php");
?>