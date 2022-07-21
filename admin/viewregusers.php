<?php
session_start();
if (! empty($_SESSION['logged_in'])) {

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Admin Panel</title>
   
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
   
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
   
    <link rel="stylesheet" href="./css/style.css">
  
   
  </head>
  <body>
    <div class="container-scroller">
    
     <?php include_once('includes/header.php');?>
     
      <div class="container-fluid page-body-wrapper">
       
        <?php include_once('includes/sidebar.php');?>
        
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
              <h3 class="page-title">View Registered Users Details</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="dashboard.php">Dashboard
                    </a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page"> View Users</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">View Users Details</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0">View Users</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Name </th>
                            <th class="font-weight-bold">Last Name </th>
                            <th class="font-weight-bold">Email </th>
                            <th class="font-weight-bold">Date Of Birth</th>
                            <th class="font-weight-bold">Address </th>
                            
                            
                            <th class="font-weight-bold">Phone Num </th>
                            <th class="font-weight-bold">Gender</th>
                            <th class="font-weight-bold">Status</th>
                            
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                           
 <?php
include 'connection.php';
  

$sql="SELECT * FROM `register` JOIN `login` on login.loginid=register.loginid";
$result = mysqli_query($con, $sql);
while($r=mysqli_fetch_array($result))
{?>
        <tr>
        <td><?php echo $r['fname'];?></td>
        <td><?php echo $r['lname'];?></td>
        <td><?php echo $r['email'];?></td>
        <td><?php echo $r['dob'];?></td>
        <td><?php echo $r['adress'];?></td>
        <td><?php echo $r['phone'];?></td>
        <td><?php echo $r['gender'];?></td>
        <td><?php echo $r['status'];?></td>
        <td><a style="color:#F63" href="activateuser.php?id=<?php echo $r['loginid'];?>"><b>Active</a></td>
        <td><a style="color:#F63" href="inactivateuser.php?id=<?php echo $r['loginid'];?>"><b>Inactive</a></td>
        




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
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">
              <strong style="padding-left: 10px">Next></strong>
            </a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
         <?php include_once('includes/footer.php');?>
          
        </div>
        
      </div>
      
    </div>
    
    <script src="vendors/js/vendor.bundle.base.js"></script>
    
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    
    <script src="./js/dashboard.js"></script>
    
  </body>
</html>
<?php
}
else
header('location:../login.php');
?>
