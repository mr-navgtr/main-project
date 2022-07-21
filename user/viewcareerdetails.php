<?php
session_start();
$id=$_SESSION['id'];
if (! empty($_SESSION['logged_in'])) {
include '../connection.php';
$q="select * from register where loginid=$id";
$res=mysqli_query($con,$q);
$row=mysqli_fetch_array($res);
$name = $row['fname'];
$dob = $row['dob'];
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
					<p class="contact-action"><i class=""></i><b><h3>WELCOME</h3></b><b><h3><?php echo $name; ?></h2></b></strong></p>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
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
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>View Career Details</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="contactForm" method="post" action="requestdetailsprocess.php">
                        <section class="grids-section bd-content">

                <!-- Grids Info -->
                <div class="outer-w3-agile mt-2">
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                  <th>Date Of Birth</th>
								  <th>Nationality</th>
                                <th>Skills</th>
                                <th>Certifications</th>
                                <th>Work Experence</th>
                                <th>SSLC Certificate</th>
                                <th>PlusTwo Certificate</th>
                                <th>Degree Certificate</th>

								 
                            </tr>
                        </thead>
                        <tbody>
<?php
include '../connection.php';
$sql=" SELECT register.*,tbl_careerupdate.* from register,tbl_careerupdate where register.id=tbl_careerupdate.id and register.loginid='$id' ";
$result = mysqli_query($con, $sql);
while($r=mysqli_fetch_array($result))
{?>
		<tr>
			<td><?php echo $r['dob'];?></td>
		   <td><?php echo $r['nationality'];?></td>
        <td><?php echo $r['skill'];?></td>
        <td><?php echo $r['certifications'];?></td>
        <td><?php echo $r['workexp'];?></td>
         <td><embed src="../uploads/<?php echo $r['10th'];?>" width="150" height="100"/></td>
     <td><embed src="../uploads/<?php echo $r['plustwo'];?>" width="150" height="100"/></td>
     <td><embed src="../uploads/<?php echo $r['degree'];?>" width="150" height="100"/></td>
     



         <!-- <td><a href="viewjob.php?id=<?php echo $r['jobid'] ?>">view job</a></td></tr> --> 
                      <?php
}
?></tbody>
                    </table>
	

			</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Freshers World is a global online employment solution for people seeking jobs.</p>
				</div> 
				
				</div>
			</div>
		</div>
		
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
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script src="js/picker.time.js"></script>
	<script src="js/legacy.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
<?php
}
else
header('location:../login.php');
?>