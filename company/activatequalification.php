 
 <?php
 session_start();
  $vv=$_SESSION['id'];
 include('../connection.php');  

              $id=$_GET['id'];
              $sel_query="UPDATE tbl_qualification SET qstatus = '1' WHERE qid ='$id' and comid='$vv'";
              $result = mysqli_query($con,$sel_query);
              if(mysqli_query($con,$sel_query))
{ 
  if(headers_sent())
  {
    echo'<script>alert("ACTIVATED");</script>';
    header("location:viewqualification.php");
  }else
  {
         echo'<script>alert("ACTIVATED");</script>';
  die('<script type="text/javascript">window.location.href="viewqualification.php"</script>');
  }
  
   
}
              
            ?>