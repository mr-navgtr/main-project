<?php
    include 'connection.php';
  //$cno = $_REQUEST['con_no'];
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
	$adress = $_POST['adress'];
    $phone = $_POST['phone'];
	$gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $s = "SELECT * FROM login WHERE username = '$email'";
    $result1 = mysqli_query($con, $s);
    $row1=mysqli_fetch_assoc($result1);
    $uname= isset($row1['username']) ? $row1['username'] : '';
	
    if($uname=="")
    {
            if($password===$confirm_password)
            {
            $sq = "INSERT INTO login (username,password,type1,status) VALUES ('$email','$password','user','inactive')";
            
             mysqli_query($con, $sq);

              $sqll = "SELECT * FROM login WHERE username = '$email' and password = '$password' and type1 = 'user'";
             $result = mysqli_query($con, $sqll);
            $no=mysqli_num_rows($result);
        
            if($no > 0)
            {
             $row=mysqli_fetch_assoc($result);
             $loid=$row['loginid'];
             echo $sql = "INSERT INTO register (loginid,fname,lname,email,dob,adress,phone,gender) VALUES ('$loid','$fname','$lname','$email','$dob','$adress','$phone','$gender')";
             mysqli_query($con, $sql);
               echo "<script> alert('Registration successfull'); window.location.href='login.php';</script>";
             }
         }
         else
            echo "<script> alert('please enter password correctly'); window.location.href='register.php';</script>";
}
else
echo "<script> alert('You are already registered'); window.location.href='index.php';</script>"

?>