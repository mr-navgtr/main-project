<?php

 include('../connection.php');  
$id=$_GET['id'];
             $sel_query = "UPDATE `tbljob` SET `jstatus` = 'inactive' WHERE jobid =$id";
              $result = mysqli_query($con,$sel_query);
              if(mysqli_query($con,$sel_query))
{ 
  if(headers_sent())
  {
    echo'<script>alert("INACTIVATED");</script>';
    header("location:viewcategory.php");
  }else
  {
         echo'<script>alert("INACTIVATED");</script>';
  die('<script type="text/javascript">window.location.href="viewvacancy.php"</script>');
  }
  
   

}
              
            ?>
