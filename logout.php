<?php
session_start();
if (! empty($_SESSION['logged_in'])) {
session_destroy();
session_unset();
header("location:login.php");
?>

<?php
}
else
header('location:../login.php');
?>