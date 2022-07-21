<?php
session_start();
$ids=$_GET['app_id'];
if (! empty($_SESSION['logged_in'])) {
	# code...
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
              <h3 class="page-title"> View Applyed Job Details</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View Applyed Job Details</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">View Job Details</h4>
                      
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Job Title</th>
                            <th class="font-weight-bold">Job Post</th>
                            <th class="font-weight-bold">Req_num_emp</th>
                            <th class="font-weight-bold">Salary</th>
                            <th class="font-weight-bold">Duration</th>
                            <th class="font-weight-bold">Work Experience </th>
                            <th class="font-weight-bold">Qualification </th>
                            <th class="font-weight-bold">Job Location</th>
                            <th class="font-weight-bold">Job Description</th>

                           
                            
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                           
                        <?php
include '../connection.php';
$sql="SELECT applicants.*,register.*,tbljob.*,sub_category.* ,category.*,tbl_careerupdate.* FROM applicants,register,tbljob ,sub_category,category,tbl_careerupdate where applicants.id=register.id and tbljob.jobid=applicants.jobid and tbljob.subid=sub_category.subid and sub_category.cid=category.cid and register.id=tbl_careerupdate.id and applicants.app_id='$ids' ";
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
