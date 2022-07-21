 
 <?php
 include('../connection.php');  

              $id=$_GET['id'];
              $sel_query="UPDATE login SET status = 'Active' WHERE loginid ='$id'";
              $result = mysqli_query($con,$sel_query);
              if(mysqli_query($con,$sel_query))
{ 
  if(headers_sent())
  {
    echo'<script>alert("ACTIVATED");</script>';
    header("location:viewregusers.php");
  }else
  {
         echo'<script>alert("ACTIVATED");</script>';
  die('<script type="text/javascript">window.location.href="viewregusers.php"</script>');
  }
  
   
}
              
            ?>