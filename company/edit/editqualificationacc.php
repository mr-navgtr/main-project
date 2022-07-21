  <?php
   include 'connection.php';
   session_start();
    $vv=$_SESSION['id'];
  if(isset($_POST['s']))
    {
    $qid=$_POST['qid'];
	$qname = $_POST['qname'];
    
  // UPDATE `tbl_qualification` SET `qname`='new' WHERE qid='3';
   
if(mysqli_query($con,"UPDATE tbl_qualification SET qname='$qname' where qid='$qid' and comid='$vv'")){
    
            header("location:../viewqualification.php?qid=.$qid");
       }
     }

   ?>