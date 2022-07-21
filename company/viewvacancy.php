<?php
session_start();
include('../connection.php'); 

if (! empty($_SESSION['logged_in'])) {
	 $vv=$_SESSION['id'];
 $d=mysqli_query($con,"select * from tbl_company where loginid=$vv");
 $tr=mysqli_fetch_assoc($d);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Company Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
              <h3 class="page-title"> View Job Vacancys</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> View Vacancys</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">View Job Details</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0">View Job</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Job Category Name</th>
                            <th class="font-weight-bold">Job Sub Category Name</th>
                            <th class="font-weight-bold">Req_num_emp</th>
                            <th class="font-weight-bold">Salary</th>
                            <th class="font-weight-bold">Duration</th>
                            <th class="font-weight-bold">Work Experience </th>
                            <th class="font-weight-bold">Qualification </th>
                            <th class="font-weight-bold">Job Location</th>
                            <th class="font-weight-bold">Job Description</th>

                           
                            <th class="font-weight-bold">Date</th>
                            <th class="font-weight-bold">Status</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                           
                        <?php
include '../connection.php';
$sql="select * from tbljob j,category c,sub_category s where j.cid=c.cid and s.subid=j.subid and s.cid=c.cid and j.comid='$tr[comid]'  ";

$result = mysqli_query($con, $sql);

while($r=mysqli_fetch_array($result))
{?>
		<tr><td><?php echo $r['cname'];?></td>
		 <td><?php echo $r['sname'];?></td>
     <td><?php echo $r['req_num_emp'];?></td>
     <td><?php echo $r['salary'];?></td>
     <td><?php echo $r['duration'];?></td>
     <td><?php echo $r['workexp'];?></td>
     <td><?php echo $r['qualifi'];?></td>
     <td><?php echo $r['location'];?></td>
     <td><?php echo $r['jobdiscription'];?></td>
     
     <td><?php echo $r['dateofpost'];?></td>
     <td><?php echo $r['jstatus'];?></td>
     
        
      </td>

		<td><a style="color:blue" href="edit/editvacancy.php?jid=<?php echo $r['jobid'];?>"><b>Edit</a></td>
		<td><a style="color:#F63" href="inactivevacancy.php?id=<?php echo $r['jobid'];?>"><b>Inactive</a></td>
      <td><a style="color:#F63" href="activatevacancy.php?id=<?php echo $r['jobid'];?>"><b>Active</a></td>
                </tr>
                      <?php
}
?>
                        </tbody>
                      </table>
                    </div>
                    <div align="left">
    <ul class="pagination" >
        <li><a href="?pageno=1"><strong>First></strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
<?php
}
else
header('location:../login.php');
?>
