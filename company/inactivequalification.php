 
 <?php
 session_start();
  $vv=$_SESSION['id'];
 include('../connection.php');  

              $id=$_GET['id'];
              $sel_query="UPDATE tbl_qualification SET qstatus = '0' WHERE qid ='$id' and comid='$vv'";
              $result = mysqli_query($con,$sel_query);
              if(mysqli_query($con,$sel_query))
{ 
  if(headers_sent())
  {
    echo'<script>alert("INACTIVATED");</script>';
    
  }else
  {
         echo'<script>alert("INACTIVATED");</script>';
  die('<script type="text/javascript">window.location.href="viewqualification.php"</script>');
  }
  
   
}
              
            ?>