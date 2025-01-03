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
<div class="container mt-4">
    <form>
        <div class="card">
            <div class="card-header">Complaints</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SlNo.</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $selQry = "SELECT * FROM tbl_complaint WHERE turf_id = '" . $_SESSION['tid'] . "'";
                        $result = $Con->query($selQry);
                        $i = 0;

                        while ($data = $result->fetch_assoc()) {
                            $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo htmlspecialchars($data["complaint_title"]); ?></td>
                            <td><?php echo htmlspecialchars($data["complaint_content"]); ?></td>
                            <td>
                                <a href="Reply.php?eid=<?php echo $data["complaint_id"]; ?>" class="btn btn-primary btn-sm">Reply</a>
                            </td>
                        </tr>
                        <?php
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