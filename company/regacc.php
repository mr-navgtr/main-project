<?php
include '../connection.php';
session_start();

    $comname=$_POST['comname'];
    $contactperson=$_POST['contactperson'];
    $caddress=$_POST['caddress'];
    

    $mobile=$_POST['mobile'];
    $licenseno=$_POST['licenseno'];

    $licenseproof=$_FILES['licenseproof']['name'];
    $targdir="doc/";
    
    $targetpath=$targdir.$licenseproof;
    move_uploaded_file($_FILES['licenseproof']['tmp_name'],$targetpath);
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    

    $aa = "INSERT INTO `login`(`username`,`password`,`type1`,`status`) VALUES ('$email','$password','company','inactive')";
    $sql = mysqli_query($con,$aa);
    $id = mysqli_insert_id($con);
    $sql1 = "INSERT INTO `tbl_company`(`comname`,`contactperson`,`caddress`,`mobile`,`email`,`licenseno`,`licenseproof`,`loginid`) VALUES ('$comname','$contactperson','$caddress','$mobile','$email','$licenseno','$licenseproof','$id')";
    $qry = mysqli_query($con,$sql1);
    echo "<script>alert('Successfully Registered')</script>";
    header("Location:../login.php");

?>
