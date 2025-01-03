<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="387" border="1">
  <tr>
    <td width="46">SlNo.</td>
    <td width="71">Content</td>
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
      </tr>
      <?php
		}
	?>
  
</table>

</body>
</html>
<?php
include("Foot.php");
?>