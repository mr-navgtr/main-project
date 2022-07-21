<?php
session_start();
$id=$_GET["id"];
include '../connection.php';
$sql2="update `category` set status='inactive' where cid=$id";
 mysqli_query($con, $sql2);
header("location:viewcategory.php");
?>