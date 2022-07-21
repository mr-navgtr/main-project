<?php
session_start();
 $vv=$_SESSION['id'];
include('connection.php');
$country = $_POST['country'];
$sql = "select * from sub_category where cid='$country'and sstatus=1 and comid='$vv'";
$query = $con->query($sql);
echo '<option value="">Select sub category</option>';
while ($res = $query->fetch_assoc()) {
    echo '<option value="' . $res['subid'] . '">' . $res['sname'] . '</option>';
}
?>