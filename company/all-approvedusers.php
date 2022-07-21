<?php
session_start();
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
	  <link rel="stylesheet" href="css/shared/components/_table.scss">
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
              <h3 class="page-title"> Total Approvals </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Approval</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Total User-Approvals</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"></a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                          
                            <th class="font-weight-bold">User Details</th>
                            <th class="font-weight-bold">Medical Details</th>
                            <th class="font-weight-bold">Id-Proof</th>
                            <!-- <th class="font-weight-bold">Status</th> -->
                            
                          </tr>
                        </thead>
                        <tbody>
                           <?php
                          include '../connection.php';
$sql="select * from plandetails where  status='Approved' & 'Rejected'";
$res=mysqli_query($con,$sql);

while($r=mysqli_fetch_array($res))
{
$id=$r['logid'];
$sql1="select R.*,C.detailid from register R,plandetails C where  loginid=$id";
$res1=mysqli_query($con,$sql1);

$r1=mysqli_fetch_array($res1);
?>
		<tr><td>
    <b>Full Name:</b><?php echo $r1['fname'];?>
		<?php echo $r1['lname'];?><br/></br>
    <b>E-Mail:</b><?php echo $r1['email'];?></br></br>
		<b>Address:</b><?php echo $r1['adress'];?><br/></br>
		<b>Phone:</b><?php echo $r1['phone'];?><br/></br>
		<b>Gender:</b><?php echo $r1['gender'];?><br />
    </td>
		<td><b>Age:</b> <?php echo $r['age'];?></br><br/>
		<b>Height:</b> <?php echo $r['height'];?></br><br/>
        <b>Weight:</b> <?php echo $r['weight'];?></br><br/>
		<b>Current Food Habits:</b> <?php echo $r['habits'];?></br><br/>
		<b>Diet Required For:</b> <?php echo $r['dietrequired'];?></br><br/>
		<b>Disease:</b> <?php echo $r['disease'];?></br><br/>
		<b>Description:</b> <?php echo $r['discription'];?></br></td>
		<td><img src="../uploads/<?php echo $r['idproof'];?>" width="150px" height="150px" /></td>
		
		
		
		<!-- <td><?php echo $r['status']; ?></td> -->
                <!--<td><a href="reject.php?id=<?php echo $r[0];?>">Reject</a></td>-->
				</tr>
                      <?php
}
?>
                        </tbody>
                      </table>
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