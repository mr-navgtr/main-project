<?php 
session_start();
 $vv=$_SESSION['id'];     
    include 'connection.php';
    $qid=$_GET['qid'];
    $sql="SELECT * from tbl_qualification where qid='$qid'and comid='$vv'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $qname=$row['qname'];
   
    

  
  
      
    
 ?>
 



<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
 <title>Admin Panel</title>
<link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

</head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
     

   

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                
                    <!-- Register Forms -->
                    <h2 class="content-heading">UPDATE Qualification Details</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bootstrap Register -->
                            <div class="block block-themed">
                                <div class="block-header bg-gd-emerald">
                                    <h3 class="block-title">Update Qualification Details</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    
                                    <form method="POST" action="editqualificationacc.php">
                                        <div class="form-group row">
                                            <label class="col-12" for="register1-username">Enter Job Qualification Details</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" name="qname" id="qname" onfocusout="f1()" value="<?php echo $qname ?>" required onChange="Validate();">
                                            </div>
                                            <span id="msg1" style="color:red;"></span>

                      <script>
function Validate()
{
    var val = document.getElementById('qname').value;

    if (!val.match(/^[A-Za-z   ]{3,}$/))
    {
        document.getElementById('msg1').innerHTML="Only alphabets are allowed!!";
           document.getElementById('qname').value = "";
        return false;
    }
document.getElementById('msg1').innerHTML=" ";
    return true;
}
</script>
                                                        
                                      <input type="hidden" class="form-control" name="qid" id="qid" onfocusout="f1()" value="<?php echo $qid ?>" required onChange="Valr();">
                                         
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-success" name="s">
                                                    <i class=""></i> Update
                                                </button>
												<button type="submit" class="btn btn-alt-success" >
                                                    <a href="../viewqualification.php"><i class=""></i> Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- END Bootstrap Register -->
                        </div>
                        
                       </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

          
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/codebase.js"></script>
    </body>
</html>
