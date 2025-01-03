<?php
//session_start();
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

<div class="container mt-5">
<body>
    <div class="container">
       
   
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