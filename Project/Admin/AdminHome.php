<?php
include("../Assets/Connection/Connection.php");
include('SessionValidator.php');
?>
<!--<?php
//session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h2 align="center">Welcome</h2>
<h1 align="center">
	<?php echo $_SESSION['aname']; ?>
</h1>
<br />
<a href="ViewTurf.php">View Turfs</a>
<a href="UserList.php">Users</a>
<a href="District.php">District</a>
<a href="Place.php">Place</a>
<a href="Type.php">Type</a>
<a href="Time.php">Time</a>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../Assets/Template/Admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="AdminHome.php">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Home</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="UserList.php">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">User List</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ViewTurf.php">
              <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Turfs</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="District.php">
                <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                <span class="menu-title">Districts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Place.php">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Place</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Type.php">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Type</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AdminRegistration.php">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Admin Registration</span>
              </a>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="d-flex align-items-center">
                      
                      <div class="sidebar-profile-text">
                        <p class="mb-1"> <?php echo $_SESSION['aname']; ?></p>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </li>
            
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="../Guest/Logout.php" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">Log Out</span></a>
              </div>
            </li>
          </ul>
        </nav>
		<div class="main-panel">
          <div class="content-wrapper">
            <div>
            <h3>Turfs</h3>
    <table class="table table-responsive table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">SLNO</th>
          <th scope="col">Turf Name</th>
          <th scope="col">Email</th>
          <th scope="col">Address</th>
          <th scope="col">District</th>
          <th scope="col">Place</th>
          <th scope="col">Proof</th>
          <th scope="col">Photo</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $selQry = "select * from tbl_turf t inner join tbl_place p on t.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where turf_vstatus=1";
        $result = $Con->query($selQry);
        $i = 0;
        while($data = $result->fetch_assoc()) {
          $i++;
      ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $data["turf_name"]; ?></td>
          <td><?php echo $data["turf_email"]; ?></td>
          <td><?php echo $data["turf_address"]; ?></td>
          <td><?php echo $data["district_name"]; ?></td>
          <td><?php echo $data["place_name"]; ?></td>
          <td><a href="<?php echo $data["turf_proof"]; ?>" class="btn btn-link">View Proof</a></td>
          <td><img src="../Assets/Files/Turf/Photo/<?php echo $data["turf_photo"]; ?>" width="150" height="150" class="img-fluid" /></td>
          <td><a href="ViewTurf.php?eid=<?php echo $data['turf_id']; ?>" class="btn btn-danger btn-sm">Reject</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

</div>

		<footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../Assets/Template/Admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../Assets/Template/Admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../Assets/Template/Admin/assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../Assets/Template/Admin/assets/js/off-canvas.js"></script>
    <script src="../Assets/Template/Admin/assets/js/hoverable-collapse.js"></script>
    <script src="../Assets/Template/Admin/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../Assets/Template/Admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>