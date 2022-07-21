<?php
session_start();
$id=$_SESSION['id'];

include '../connection.php';
$job=$_POST['jid'];
$ap=$_POST['apid'];
$comid=$_POST['comid'];
 $tempname = $_FILES["resum"]["tmp_name"];
 $filename = $_FILES["resum"]["name"];
 $folder="../uploads/".$filename;
 $h="select * from applicants where id='$ap' and jobid='$job'";
 $result=mysqli_query($con,$h);
 if($result->num_rows>0)
 {




echo"<script>
window.location.href='viewhiring.php';
alert('already applied');
</script>";

 }
else
{
$q="INSERT INTO applicants(resume,id,jobid,comid) VALUES ('$filename','$ap','$job','$comid')";
if(mysqli_query($con,$q))
{
move_uploaded_file($tempname, $folder);
echo'<script>alert("applied succesfully")</script>';
header('location:index.php');

}
}
?>