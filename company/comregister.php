<!DOCTYPE html>
<html>
  <head>
    <title>Company Registration Form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #eee;
      }
      body {
      background: url("img/log.jpg") no-repeat center;
      background-size: cover;
      }
      h1, h2 {
      text-transform: uppercase;
      font-weight: 400;
      }
      h2 {
      margin: 0 0 0 8px;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
      padding: 25px;
      background: rgba(0, 0, 0, 0.5); 
      }
      .left-part, form {
      padding: 25px;
      }
      .left-part {
      text-align: center;
      }
      .fa-graduation-cap {
      font-size: 72px;
      }
      form {
      background: rgba(0, 0, 0, 0.7); 
      }
      .title {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      }
      .info {
      display: flex;
      flex-direction: column;
      }
      input, select {
      padding: 5px;
      margin-bottom: 30px;
      background: transparent;
      border: none;
      border-bottom: 1px solid #eee;
      }
      input::placeholder {
      color: #eee;
      }
      option:focus {
      border: none;
      }
      option {
      background: black; 
      border: none;
      }
      .checkbox input {
      margin: 0 10px 0 0;
      vertical-align: middle;
      }
      .checkbox a {
      color: #26a9e0;
      }
      .checkbox a:hover {
      color: #85d6de;
      }
      .btn-item, button {
      padding: 10px 5px;
      margin-top: 20px;
      border-radius: 5px; 
      border: none;
      background: #26a9e0; 
      text-decoration: none;
      font-size: 15px;
      font-weight: 400;
      color: #fff;
      }
      .btn-item {
      display: inline-block;
      margin: 20px 5px 0;
      }
      button {
      width: 100%;
      }
      button:hover, .btn-item:hover {
      background: #85d6de;
      }
      @media (min-width: 568px) {
      html, body {
      height: 100%;
      }
      .main-block {
      flex-direction: row;
      height: calc(100% - 50px);
      }
      .left-part, form {
      flex: 1;
      height: auto;
      }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
      <div  class="left-part">
        <img src="images/3.jpg" width="800" height="600">
        

      </div>
      <form method="POST" enctype="multipart/form-data" action="regacc.php" onsubmit="registration();">  
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Register here</h2>
        </div>


<div class="info">
<input type="text" placeholder="Company Name" id="comname" name="comname" class="form-control" required onchange="Validate();">
           <span id="msg1" style="color:red;"></span>
                        <script>        
function Validate() 
{
    var val = document.getElementById('comname').value;

    if (!val.match(/^[A-Z][A-Za-z]{3,}$/)) 
    {
        document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets without space are allowed!!";
                    document.getElementById('comname').value = "";
        return false;
    }
document.getElementById('msg1').innerHTML=" ";
    return true;
}
</script>
</div>



<div class="info">
<input type="text" name="contactperson" id="contactperson" placeholder="Contact Person Name" class="form-control" required onchange="Validaddress1();">
<span id="msg12" style="color:red;"></span>
<script>        
function Validaddress1() 
{
    var val = document.getElementById('contactperson').value;

    if (!val.match(/^[A-Z][a-z" "   ]{3,}$/)) 
    {
        document.getElementById('msg12').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                    document.getElementById('contactperson').value = "";
        return false;
    }
document.getElementById('msg12').innerHTML=" ";
    return true;
}
</script>
</div>




<div class="info">
<input type="text" name="caddress" id="caddress" placeholder="Company Address" class="form-control" required onchange="Validaddress();">
<span id="msg2" style="color:red;"></span>
<script>        
function Validaddress() 
{
    var val = document.getElementById('address').value;

    if (!val.match(/^[A-Z][a-z" "   ]{3,}$/)) 
    {
        document.getElementById('msg2').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                    document.getElementById('address').value = "";
        return false;
    }
document.getElementById('msg2').innerHTML=" ";
    return true;
}
</script>
</div>


<div class="info">
<input type="text" name="mobile" id="mobile"placeholder="Mobile No" required onchange="Validmobile();">
<i class="zmdi zmdi-account"></i>
<span id="msg3" style="color:red;"></span>
<script>
function Validmobile() 
{
    var val = document.getElementById('phone').value;

    if (!val.match(/^[789][0-9]{9}$/))
    {
        document.getElementById('msg3').innerHTML="Only Numbers are allowed and must contain 10 number";
    
        
                    document.getElementById('phone').value = "";
        return false;
    }
document.getElementById('msg3').innerHTML=" ";
    return true;
}
</script>
</div>


<div class="info">
<input type="text" name="licenseno" id="licenseno" placeholder="License No">
</div>


<div class="info">
<div class="name">License Id Proof</div>                        
<input type="file" id="licenseproof" name="licenseproof" placeholder="License Proof" required onchange="fileValidation();">
<script>
        function fileValidation() {
            var fileInput = document.getElementById('file');
             
            var filePath = fileInput.value;
         
            // Allowing file type
            var allowedExtensions =
/(\.pdf|\.jpg|\.png|\.jpeg|\.wpd)$/i;
             
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            }
        }
    </script>
</div>


<div class="info">
<input type="text" name="email" id="email" placeholder="Email" required onchange="Validemail();">
<i class="zmdi zmdi-account"></i>
<span id="msg4" style="color:red;"></span>
<script>        
function Validemail() 
{
    var val = document.getElementById('email').value;

    if (!val.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) 
    {
        document.getElementById('msg4').innerHTML="Enter a Valid Email";
        
             document.getElementById('email').value = "";
        return false;
    }
document.getElementById('msg4').innerHTML=" ";
    return true;
}
</script>
</div>


<div class="info">
<input type="password" name="password" id="password" placeholder="Password" required onchange="Validpass();">
<i class="zmdi zmdi-account"></i>
<span id="msg5" style="color:red;"></span>
<script>        
function Validpass() 
{
    var val = document.getElementById('password').value;

    if (!val.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/)) 
    {
        document.getElementById('msg5').innerHTML="Upper case, Lower case, Special character and Numeric number are required in Password filed";
        
             document.getElementById('password').value = "";
        return false;
    }
document.getElementById('msg5').innerHTML=" ";
    return true;
}
</script>
</div>


<div class="info">
<input type="password" name="confpassword" placeholder="Confirm Password" required onchange="Validcpass();">
<i class="zmdi zmdi-account"></i>
<span id="msg6" style="color:red;"></span>
<script>
function Validcpass()
{
var pas1=document.getElementById("cpassword");
                              var pas2=document.getElementById("cpassword");
                            
                              if(pas1.value=="")
    {
        document.getElementById('msg6').innerHTML="Password can't be null!!";
        pas1.focus();
        return false;
    }
    if(pas2.value=="")
    {
        document.getElementById('msg6').innerHTML="Please confirm password!!";
        pass2.focus();
        return false;
    }
    if(pas1.value!=pas2.value)
    {
        document.getElementById('msg6').innerHTML="Passwords does not match!!";
        pas1.focus();
        return false;
    }
     document.getElementById('msg6').innerHTML=" "; 
    return true;
}
</script>
</div>


      

<button type="submit" name="submit">Register</button>
<div>
<a href="../index.php"><h3>Home</h3><i class="zmdi zmdi-arrow-right"></i></a> 
<a href="../login.php"><h3 style="align:center">Login</h3><i class="zmdi zmdi-arrow-right"></i>
</div>      
      </form>
    </div>
  </body>
</html>