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
  <div class="container mt-4">
    <form id="form2" name="form2" method="post" action="">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact</th>
            <!-- <th scope="col">Action</th> -->
          </tr>
        </thead>
        <tbody>
        <?php 
          $selQry="select * from tbl_user";
          $result=$Con->query($selQry);
          $i=0;
          while($data=$result->fetch_assoc())
          {
            $i++;
        ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $data["user_name"]; ?></td>
            <td><?php echo $data["user_email"]; ?></td>
            <td><?php echo $data["user_contact"]; ?></td>
            <!-- <td><a href="UserList.php?did=<?php echo $data["user_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>  
            <a href="UserList.php?eid=<?php echo $data["user_id"]; ?>" class="btn btn-warning btn-sm">Edit</a></td> -->
          </tr>
        <?php
          }
        ?>
        </tbody>
      </table>
    </form>
  </div>
        </body>
</html>
<?php
include("Foot.php");
?>