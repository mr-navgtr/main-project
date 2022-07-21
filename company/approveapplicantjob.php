 
 <?php
 include('../connection.php');  
$jid=$_GET['jid'];
$email=$_GET['email'];
              $id=$_GET['id'];
              $sel_query="UPDATE applicants SET astatus = 'APPROVED' WHERE id ='$id' and jobid='$jid'";
              $result = mysqli_query($con,$sel_query);
              if(mysqli_query($con,$sel_query))
{ 
  
    
    header("location:../src/verifymail.php?email=$email");
    echo'<script>alert("APPROVED");</script>';
  
         
   
}
              
            ?>