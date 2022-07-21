<?php
session_start();
$id=$_SESSION['id'];
if (! empty($_SESSION['logged_in'])) {
include '../connection.php';
$q="select * from register where loginid=$id";
$res=mysqli_query($con,$q);
$row=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Freshers World</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/icon.jpg" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Pickadate CSS -->
    <link rel="stylesheet" href="css/classic.css">    
    <link rel="stylesheet" href="css/classic.date.css">    
    <link rel="stylesheet" href="css/classic.time.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    

</head>

<body>
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                     <li class="nav-item"><a class="nav-link" href="viewhiring.php">Hiring</a></li>
                     <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Search Jobs</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="searchbyjobtitle.php">Search
                          By Job Title</a>
                                <a class="dropdown-item" href="searchbyQualifi.php">Search
                          By Job Qualification</a>
                          <a class="dropdown-item" href="searchbylocation.php">Search
                          By Job Location</a>
                                
                            </div>
                        </li>
                     <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Applied Jobs</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="viewapplyedjobs.php">View
                    Applied Jobs</a>
                                <a class="dropdown-item" href="applyedjobstatus.php">Applied Jobs Status</a>
                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">My Account</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="userprofile.php">Profile</a>
                                <a class="dropdown-item" href="updatecareer.php"> Update Details</a>
                                <a class="dropdown-item" href="viewcareerdetails.php"> View Career Details</a>
                                <a class="dropdown-item" href="change-password.php">Change Password</a>
                                <a class="dropdown-item" href="../logout.php">Logout</a>
                            </div>
                        </li>
                        
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>






    
    

    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Apply job !!!!</h1>
                </div>
            </div>
        </div>
    </div>
<!-- .............. -->
    
    <?php
include '../connection.php';
$id1=$_GET['id'];
$sql="select * from tbljob where jobid='$id1'";

$result = mysqli_query($con,$sql);

while($r=mysqli_fetch_array($result))
{?>
        
     

    <div class="col-sm-12">
                   
                         
                         <center>
                         <div class="panel-footer">
                              Date Posted :<?php echo $r['dateofpost'];?>
                         </div>
                     </div>
        </center>
        <center>
             <form class="form-horizontal span6 " action="jobsubmision.php" onsubmit="Checkfilesupload();" method="POST" enctype="multipart/form-data">
            <div class="col-sm-12">
                 <?php
                                             $comid=$_GET['comid'];
                                             ?>
                <div class="row">
                    <div class="panel panel-default"> 
                        <div class="panel-header">
                            <!-- <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;">Attach your Resume here. -->
                                <input name="apid" type="hidden" value="<?php echo $row['id']; ?>">
                                <input name="jid" type="hidden" value="<?php echo $id1; ?>">
                                <input name="comid" type="hidden" value="<?php echo $comid; ?>">
                            <!-- </div> -->
                            </div>
                        </div>
                    </div>

                            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                            
                        </div>

                        <div class="panel-body"> 
                            <label class="col-md-2" for="picture" style="padding: 100;margin: 0;"><b>Attachtment Resume Here:</b></label> 
                            <div class="col-md-10" style="padding: 100;margin: 0;">
                            <input  name="resum" id="resum" type="file"  required accept="application/pdf" onchange="Checkfilesupload();"  >

                                
                            </div>
                            <script>
                function Checkfilesupload() {
                    var fup = document.getElementById('resum');
                    var fileName = fup.value;
                    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
                    if (ext == "pdf") {
                        return true;
                    } else {

                        document.getElementById("resum").value = "";
                        alert("pdf only");
                        fup.focus();
                        return false;
                    }
                }
            </script>
                            






                            
                        </div>
                        
                    </div> 
                </div> 
            </div>
            

           <div class="form-group">
            <div class="col-md-12"> 
                <!-- <button> <a href="viewhiring.php"></a>back</button> -->
                 <button  name="submit" type="submit" >Submit</button>
               
            </div>
           </div> 
        </form>
 </center>

        <?php
}
?>

</div>


   <footer class="footer-area bg-f">


        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="company-name">Freshers World</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    </footer>
    <!-- End Footer -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->

    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/jquery.mapify.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
    <script>
    
    </script>
</body>

</html>
<?php
}
else
header('location:../login.php');
?>