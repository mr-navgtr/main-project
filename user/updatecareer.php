<?php
session_start();
include '../connection.php';
if (! empty($_SESSION['logged_in'])) {
	$log=$_SESSION['id'];
    if (! empty($_SESSION['logged_in'])) {
	$reg=mysqli_query($con,"select * from register where loginid='$log'");
	$i=mysqli_fetch_assoc($reg);

	
	
?>


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

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
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
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
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">My
                                Account</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="userprofile.php">Profile</a>
                                <a class="dropdown-item" href="updatecareer.php"> Update Details</a>
                                <a class="dropdown-item" href="viewcareerdetails.php">View Career Details</a>
                                <a class="dropdown-item" href="change-password.php">Change Password</a>
                                <a class="dropdown-item" href="../logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Update Career Details</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Contact -->

    <div class="contact-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <!-- <h2>Update Career Details</h2> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="updatecareer.php" enctype="multipart/form-data">
                        <div class="row">
                          
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Nationality:</b></label>
                                    <input type="text" placeholder="Please Enter Your Nationality" class="form-control"
                                        name="nation"required onchange="Validate0();">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $i['id']; ?>" name="vp" />
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Skills:</b></label>
                                    <input type="text" placeholder="Please Enter Your Skills" class="form-control"
                                        name="skill" required onchange="Validate0();">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Certifications:</b></label>
                                    <textarea type="text" class="form-control" name="crt"
                                        placeholder="Please Enter Your Certifications Courses Names"required onchange="Validate0();"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Work Experence:</b></label>
                                    <textarea type="text" class="form-control" name="wrkexp"
                                        placeholder="Enter your Work Experence"required onchange="Validate0();"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>SSLC Certificate:</b></label>
                                    <input type="file" class="form-control" name="sslc" id="sslc" required onchange="Validate01();">
                                </div>
                                <script>
                                    function Validate01() {
                                        var fileInput = document.getElementById('sslc');
                                        var filePath = fileInput.value;
                                        var allowedExtensions = /(\.pdf|\.wpd)$/i;
                                        if (!allowedExtensions.exec(filePath)) {
                                            alert('Invalid file type');
                                            fileInput.value = '';
                                            return false;
                                        }
                                    }
                                </script>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>PlusTwo Certificate:</b></label>
                                    <input type="file" class="form-control" name="plustwo" id="plustwo" required onchange="Validate03();">
                                </div>
                                  <script>
                                    function Validate02() {
                                        var fileInput = document.getElementById('plustwo');
                                        var filePath = fileInput.value;
                                        var allowedExtensions = /(\.pdf|\.wpd)$/i;
                                        if (!allowedExtensions.exec(filePath)) {
                                            alert('Invalid file type');
                                            fileInput.value = '';
                                            return false;
                                        }
                                    }
                                </script>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Degree Certificate:</b></label>
                                    <input type="file" class="form-control" name="degree" id="degree" required onchange="Validate02();">
                                </div>
                                    <script>
                                    function Validate02() {
                                        var fileInput = document.getElementById('degree');
                                        var filePath = fileInput.value;
                                        var allowedExtensions = /(\.pdf|\.wpd)$/i;
                                        if (!allowedExtensions.exec(filePath)) {
                                            alert('Invalid file type');
                                            fileInput.value = '';
                                            return false;
                                        }
                                    }
                                </script>
                            </div>





                            <div class="submit-button text-center">
                                <input type="submit" class="btn btn-common" id="submit" name="submit" />
                            </div>
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- End Contact -->

    <!-- Start Contact info -->

    <!-- End Contact info -->

    <!-- Start Footer -->
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
    $('.map-full').mapify({
        points: [{
            lat: 40.7143528,
            lng: -74.0059731,
            marker: true,
            title: 'Marker title',
            infoWindow: 'Yamifood Restaurant'
        }]
    });
    </script>
</body>

</html>

<?php
}
else
header('location:../login.php');
?>





<?php
}
else
header('location:../login.php');
?>
<?php
// session_start();
include('../connection.php');	

if(isset($_POST['submit']))
{
	
	
  $nation=$_POST['nation'];
  $skill=$_POST['skill'];
 $crt=$_POST['crt'];
   $wrk=$_POST['wrkexp'];
   $id=$_POST['vp'];
 
   $tempname = $_FILES["sslc"]["tmp_name"];
   $filename = $_FILES["sslc"]["name"];
   $tempname1 = $_FILES["plustwo"]["tmp_name"];
   $filename1 = $_FILES["plustwo"]["name"];

   $tempname2 = $_FILES["degree"]["tmp_name"];
   $filename2 = $_FILES["degree"]["name"];


   $folder="../uploads/".$filename;
  $folder1="../uploads/".$filename1;
  $folder2="../uploads/".$filename2;
  
 
  $s=mysqli_query($con,"select * from tbl_careerupdate where id=$id");
  if(mysqli_num_rows($s) <= 0)
  {
	
if(mysqli_query($con,"INSERT INTO tbl_careerupdate(nationality,skill,certifications,workexp,10th,plustwo,degree,id) VALUES ('$nation','$skill','$crt','$wrk','$filename','$filename1','$filename2','$id')"))
{
	move_uploaded_file($tempname, $folder);
	move_uploaded_file($tempname1, $folder1);
    move_uploaded_file($tempname2, $folder2);

echo "<script>alert('Career Deatils added');</script>";
}else
{
	echo "<script>alert('failed to add');</script>";
}
}

else
{
    if(mysqli_query($con,"UPDATE `tbl_careerupdate` SET `nationality`='$nation',`skill`='$skill',`certifications`='$crt',`workexp`='$wrk',`10th`='$filename',`plustwo`='$filename1',`degree`='$filename2' WHERE id='$id'"))
     {
    echo "<script>alert('Career ');</script>";
    move_uploaded_file($tempname, $folder);
    move_uploaded_file($tempname1, $folder1);
    move_uploaded_file($tempname2, $folder2);

echo "<script>alert('Career Deatils updated');</script>";
}
else
{
    echo "<script>alert('failed to updated');</script>";
}
}


}

?>