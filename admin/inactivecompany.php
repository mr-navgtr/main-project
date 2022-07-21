 
 <?php
 include('../connection.php');  

              $id=$_GET['id'];
              $sel_query="UPDATE login SET status = 'inactive' WHERE loginid ='$id'";
              $result = mysqli_query($con,$sel_query);
              if(mysqli_query($con,$sel_query))
{ 
  if(headers_sent())
  {
    echo'<script>alert("INACTIVATED");</script>';
    header("location:viewcompany.php");
  }else
  {
         echo'<script>alert("INACTIVATED");</script>';
  die('<script type="text/javascript">window.location.href="viewcompany.php"</script>');
  }
  
   
}
              
            ?>