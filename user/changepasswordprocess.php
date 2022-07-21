
<?php
session_start();
include'../connection.php';
if (! empty($_SESSION['logged_in'])) {
if(isset($_POST['b']))
{

$cpass=$_POST['cpass'];
$npass=$_POST['pass'];
$id=$_SESSION['id'];
$q1="update login set password='$npass' where loginid=$id";
$res1=mysqli_query($con,$q1);
}
?>
<script>
alert("Your password is changed");
window.location='change-password.php';
</script>
<?php
}
else
header('location:../login.php');
?>


