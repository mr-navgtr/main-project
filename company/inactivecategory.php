 
 <?php
 session_start();
  $vv=$_SESSION['id'];
 include('../connection.php');  

              $id=$_GET['id'];
              $sel_query="UPDATE category SET cstatus = '0' WHERE cid ='$id' and comid='$vv'";
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
  die('<script type="text/javascript">window.location.href="viewcategory.php"</script>');
  }
  
   
}
              
            ?>