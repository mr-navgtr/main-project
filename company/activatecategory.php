 
 <?php
 session_start();
  $vv=$_SESSION['id'];
 include('../connection.php');  

              $id=$_GET['id'];
              $sel_query="UPDATE category SET cstatus = '1' WHERE cid ='$id' AND comid='$vv'";
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
  die('<script type="text/javascript">window.location.href="viewcategory.php"</script>');
  }
  
   
}
              
            ?>