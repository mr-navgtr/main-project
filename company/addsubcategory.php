<?php
session_start();
 $vv=$_SESSION['id'];
if (! empty($_SESSION['logged_in'])) {
include('../connection.php');	

if(isset($_POST['submit']))
{
	//$customizable=$_POST['custom'];
	$sname=$_POST['sname'];
$cat=$_POST['cat'];
	
  

   

     $valid=mysqli_query($con,"select * from sub_category where sname='$sname' and comid='$vv'");
if(mysqli_num_rows($valid)>0){
	echo"<script>alert(' already exists')</script>";
	echo"<script>location=addcategory.php</script>";
}else{


	
$sql=mysqli_query($con,"INSERT INTO `sub_category`(sname, cid,comid) values('$sname','$cat','$vv')");

echo "<script>alert('Sub category added');</script>";
}
}
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
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
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
              <h3 class="page-title"> Add Job Sub Category </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Sub Category</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: left;">Add Job Sub Category</h4>
					<br>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                       <?php
                      $sel=mysqli_query($con,"select * from category where cstatus=1 and comid='$vv'"); 
                      
                      ?>
                      <div class="form-group">
                        <label for="exampleInputName1">Category Name</label>
                        <select class="form-control"name="cat" required onchange="Validate();">
                              <?php
                              while($r=mysqli_fetch_array($sel))
                              {
                                ?>
                          <option value="<?php echo $r['cid']; ?>"><?php echo $r['cname']; ?></option>
                         <?php  } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Sub Category Name</label>
                        <input type="text" name="sname" id="cname" class="form-control"  placeholder="Enter Sub Category name" value="" required onchange="Validate();">

                        <span id="msg1" style="color:red;"></span>

                      <script>
function Validate()
{
    var val = document.getElementById('cname').value;

    if (!val.match(/^[A-Za-z   ]{3,}$/))
    {
        document.getElementById('msg1').innerHTML="Only alphabets are allowed!!";
           document.getElementById('cname').value = "";
        return false;
    }
document.getElementById('msg1').innerHTML=" ";
    return true;
}
</script>
                      
                      <!-- <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                       <input type="text" name="des" id="des" placeholder="Add Description" class="form-control" value="">
                      </div> -->
                      
					  
                     
                    <div>
                      <button type="submit" class="btn btn-primary mr-2"  name="submit">Add Category</button>
					  
                        </div>
                     
                    </form>
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
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
<?php
}
else
header('location:../login.php');
?>
