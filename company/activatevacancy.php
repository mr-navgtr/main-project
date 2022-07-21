<?php

 include('../connection.php');  
$id=$_GET['id'];
             $sel_query = "UPDATE `tbljob` SET `jstatus` = 'Active' WHERE jobid =$id";
              $result = mysqli_query($con,$sel_query);
              if(mysqli_query($con,$sel_query))
{ 
  if(headers_sent())
  {
    echo'<script>alert("ACTIVATED");</script>';
    header("location:viewcategory.php");
  }else
  {
         echo'<script>alert("ACTIVATED");</script>';
  die('<script type="text/javascript">window.location.href="viewvacancy.php"</script>');
  }
  
   

}
              
            ?>
