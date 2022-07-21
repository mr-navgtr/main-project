<?php
session_start();
include('../connection.php');
if (! empty($_SESSION['logged_in'])) {
   
 $vv=$_SESSION['id'];
 $d=mysqli_query($con,"select * from tbl_company where loginid=$vv");
 $tr=mysqli_fetch_assoc($d);
if(isset($_POST['submit']))
{
    
    $cname=$_POST['cat'];
  $sname=$_POST['spec'];
  $req_emp=$_POST['req_emp'];
  $salary=$_POST['salary'];
  $duration=$_POST['duration'];
  $workexp=$_POST['workexp'];
  $qualifi=$_POST['qualifi'];
  $location=$_POST['location'];
  $jobdis=$_POST['jobdis'];
  
 
  
 
  

   



    
if(mysqli_query($con,"insert into tbljob(cid,subid,req_num_emp,salary, duration,workexp,qualifi,location,jobdiscription,jstatus,comid) values('$cname','$sname','$req_emp','$salary','$duration','$workexp','$qualifi','$location','$jobdis','Active','$tr[comid]')"))
{

echo "<script>alert('vacancy added');</script>";
}}

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
              <h3 class="page-title"> Add Job Vacancy </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Category</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: left;">Add New Job Vacancy</h4>
                    <br>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <?php
                
                      $sel1=mysqli_query($con,"select * from category where cstatus=1 and comid='$vv'"); 
                      ?>
                      <div class="form-group">
                        <label for="exampleInputName1">Category Name</label>
                        <select class="form-control"name="cat" id="cat" required onchange="change_country();">
                              <option value="">Open this select menu</option>
                              <?php
                              while($r1=mysqli_fetch_array($sel1))
                              {
                                ?>
                          <option value="<?php echo $r1['cid']; ?>"><?php echo $r1['cname']; ?></option>
                         <?php  } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Sub category name</label>
                
                                            <select id="spec" class="custom-select" name="spec" required>
                                                <option value="">Open this select menu</option>
                                            </select>
                      </div>
                           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                      <div class="form-group">
                        <label for="exampleInputName1">Required No. of Employee's</label>
                       <input type="text" name="req_emp" id="req_emp" placeholder="Add req_num_emp" class="form-control"required onchange="Validate8();">
                       </div>
                       <span id="msg8" style="color:red;"></span>
                           <script>
                                            function change_country() {
                                                var country = $("#cat").val();

                                                $.ajax({
                                                    type: "POST",
                                                    url: "spec.php",
                                                    data: "country=" + country,
                                                    cache: false,
                                                    success: function(response) {
                                                        //alert(response);return false;
                                                        $("#spec").html(response);
                                                    }
                                                });

                                            }
                                        </script>
                       <script>    
function Validate8() 
{
    var val = document.getElementById('req_emp').value;

    if (!val.match(/[0-9]/)) 
    {
        document.getElementById('msg8').innerHTML=" Only Numbers are allowed";
                document.getElementById('req_emp').value = "";
        return false;
    }
document.getElementById('msg8').innerHTML=" ";
    return true;
}
</script>


                      
                      <div class="form-group">
                        <label for="exampleInputName1">Salary:</label>
                       <input type="text" name="salary" id="salary" placeholder="Add Salary" class="form-control" required onchange="Validate9();">
                       <span id="msg9" style="color:red;"></span>
<script>    
function Validate9() 
{
    var val = document.getElementById('salary').value;

    if (!val.match(/[0-9]/)) 
    {
        document.getElementById('msg9').innerHTML=" Only Numbers are allowed";
                document.getElementById('salary').value = "";
        return false;
    }
document.getElementById('msg9').innerHTML=" ";
    return true;
}
</script>





                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Job Vacancy Duration:</label>
                       <input type="date" name="duration" id="duration" placeholder="Add Duration of Vacancy" class="form-control" min="<?= date('Y-m-d');?>" value=""required onchange="Validate00();">
                                  

                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Work Experience :</label>
                       <input type="text" name="workexp" id="workexp" placeholder="Add Qualification/Work Experience" class="form-control" required onchange="Validate10();">


                       <span id="msg10" style="color:red;"></span>



                     <?php
                      $sell=mysqli_query($con,"select * from tbl_qualification where qstatus=1 and comid='$vv'"); 
                       
                      ?>

                      </div>
                      <div class="form-group">
                        <label for="exampleInputName12">Job Qualification</label>
                       <select class="form-control"name="qualifi" id="qualifi" required ><?php
                              while($r2=mysqli_fetch_array($sell))
                              {
                                ?>
                          <option value="<?php echo $r2['qname']; ?>"><?php echo $r2['qname']; ?></option>
                         <?php  } ?>

                        </select>
                    </div>

                     

             <?php
                      $sell=mysqli_query($con,"select * from tbl_location where lstatus=1 and comid='$vv'"); 
                       
                      ?>
                     <div class="form-group">
                        <label for="exampleInputName12">Job Location</label>
                       <select class="form-control"name="location" id="location" required ><?php
                              while($r2=mysqli_fetch_array($sell))
                              {
                                ?>
                          <option value="<?php echo $r2['lname']; ?>"><?php echo $r2['lname']; ?></option>
                         <?php  } ?>

                        </select>
                    
                      
                      <!-- </div>
                      <span id="msg0" style="color:red;"></span>
<script>    
function Validate0() 
{
    var val = document.getElementById('location').value;

    if (!val.match(/^[A-Z][a-z" "]{3,}$/)) 
    {
        document.getElementById('msg3').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                document.getElementById('location').value = "";
        return false;
    }
document.getElementById('msg0').innerHTML=" ";
    return true;
}
</script> -->


                      <div class="form-group">
                        <label for="exampleInputName1">Job Description</label>
                       <input type="text" name="jobdis" id="jobdis" placeholder="Add Job Description" class="form-control" required onchange="Validate1();">
                       <i class="zmdi zmdi-home"></i>
                      </div>
                      <span id="msg3" style="color:red;"></span>
<!-- <script>    
function Validate1() 
{
    var val = document.getElementById('jobdis').value;

    if (!val.match(/^[A-Z][a-z" "]{3,}$/)) 
    {
        document.getElementById('msg3').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                document.getElementById('jobdis').value = "";
        return false;
    }
document.getElementById('msg3').innerHTML=" ";
    return true;
}
</script> -->





                      
                      <!-- <?php
                      date_default_timezone_set('Asia/Kolkata');
                      $date = date('d-m-y');
                      ?>
                      <div class="form-group">
                        <label for="exampleInputName1"></label>
                       <input type="text" name="date" id="date" placeholder="Add date " class="form-control" value="">
                      </div> -->

                      
                      
                     
                    <div>
                      <button type="submit" class="btn btn-primary mr-2"  name="submit">Add New Job</button>
                      
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

