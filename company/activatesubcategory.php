 
 <?php
 session_start();
  $vv=$_SESSION['id'];
 include('../connection.php');  

              $id=$_GET['id'];
              $sel_query="UPDATE sub_category SET sstatus = '1' WHERE subid ='$id' and comid='$vv'";
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
  die('<script type="text/javascript">window.location.href="viewsubcategory.php"</script>');
  }
  
   
}
              
            ?>