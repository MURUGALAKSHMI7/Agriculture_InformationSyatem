Register.php:
<?php
include('conf.php');
?>
<!DOCTYPE html>
<html lang="en">
     <head>
  <title>AGRICULTURE</title>
   <link rel="icon" href="images/agriculture/logo.png" type="image/gif">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
         <link href="style.css" rel="stylesheet">
         <style>
             a{color: white;text-decoration:none }
             a:hover{color: white;}
             a:active{color: red;}
             .requ 
             {
                background-color: #00000040;
             }
             .requ:hover
             {
                background-color: white;
                color:black;
             }
             .requ:focus
             {
                background-color: white;
                color:black;
             }
             .requ::placeholder
             {
                color:white;
             }
             label {background-color: #00000024}
             
input:checked {
  height: 50px;
  width: 50px;
}
     </style>
</head>

<body class="reg">
<?php
    include('nav.php');
    ?>
       <div style="margin-top:200px;" class="container">
   
<form class="form-horizontal" method="post" autocomplete="off"  enctype="multipart/form-data">
          <h1 style="font-family: castellar;color:black;"><b><u>Register</u></b></h1><br>
    <div class="form-group"><!--ADD IMAGE-->
      <label class="control-label col-sm-2">Add Profile Image :</label>
      <div class="col-sm-5">
       <input  type="file" class="form-control requ" required name="file">
      </div>
    </div>
    <div class="form-group"><!--ADD NAME-->
     <label class="control-label col-sm-2">Name :</label>
     <div class="col-sm-5">
     <input type="text" class="form-control requ" placeholder="Enter Your Name" name="name" required>
     </div>
    </div>
    <div class="form-group"><!--ADD CONTACT NUMBER-->
     <label class="control-label col-sm-2">Phone :</label>
     <div class="col-sm-5">
     <input type="tel" class="form-control requ" placeholder="Enter Your Contact Number" name="cts" required>
     </div>
    </div>
    <div class="form-group"><!--ADD EMAIL-->
     <label class="control-label col-sm-2">E-Mail :</label>
     <div class="col-sm-5">
     <input type="email" class="form-control requ" placeholder="Enter Your E-Mail Address" name="mail" required>
     </div>
    </div>
    <div class="form-group"><!--ADD EMAIL-->
     <label class="control-label col-sm-2">Gender :</label>
     <div class="col-sm-5">
     Male <input type="radio" value="male" required name="gender"> 
  <input style="margin-left:50px;" type="radio" value="female" required name="gender"> Female
     </div>
    </div>
    <div class="form-group"><!--ADD STATE-->
     <label class="control-label col-sm-2">State :</label>
     <div class="col-sm-5">
     <input type="text" class="form-control requ" placeholder="Enter Your State" name="state" required>
     </div>
    </div>
    
    <div class="form-group"><!--ADD COUNTRY-->
     <label class="control-label col-sm-2">City :</label>
     <div class="col-sm-5">
     <input type="text" class="form-control requ" placeholder="Enter Your City" name="city" required>
     </div>
    </div>
    <div class="form-group"><!--ADD FULL ADDRESS-->
     <label class="control-label col-sm-2">Full Address :</label>
     <div class="col-sm-5">
     <textarea class="form-control requ" placeholder="Enter Your Full Address" name="addrs"></textarea>
     </div>
    </div>
        <div class="form-group"><!--ADD USERNAME-->
      <label class="control-label col-sm-2">UserName :</label>
      <div class="col-sm-5">
        <input type="text" class="form-control requ" placeholder="Enter your username" name="uname" required>
      </div>
    </div>
    <div class="form-group"><!--ADD PASSWORD-->
      <label class="control-label col-sm-2" for="pwd">Password :</label>
      <div class="col-sm-5">          
        <input type="password" class="form-control requ" placeholder="Enter your password" name="pwd" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-4">
        <input type="submit" name="sb" class="btn btn-primary form-control" value="Register Now">
         
      </div>
    </div>
              
  </form>
    </div>
    </body>
<script>
          $(function () {
    $('input,textarea').focus(function () {
        $(this).data('placeholder', $(this).attr('placeholder'))
               .attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).data('placeholder'));
    });
});
        </script>
</body>
</html>
<?php

if(isset($_POST['sb']))
{
   $filee = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

       
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       
        $extensions_arr = array("jpg","jpeg","png","gif");

       
        if( in_array($imageFileType,$extensions_arr) ){
            
           
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$filee);
    
    $name=$_POST['name'];
    $phone=$_POST['cts'];
    $email=$_POST['mail'];
    $gender=$_POST['gender'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $addrs=$_POST['addrs'];
    $username=$_POST['uname'];
    $password=$_POST['pwd'];
    
    $query="INSERT INTO `registration`(`profile_img`, `name`, `phone`, `email`, `gender`, `state`, `city`, `address`, `uname`, `password`) VALUES ('$filee','$name','$phone','$email','$gender','$state','$city','$addrs','$username','$password')";
    $res=mysqli_query($con,$query);
    if(!empty($res))
    {
        echo '<script>window.location.href="login.php";</script>';
    }
    else
    {
        echo '<script>alert("Try Again");</script>';
    }
   
}
    else
    {
        echo '<script>alert("Please Select Valid Formate Of Image");</script>';
        echo '<script>alert("JPG,JPEG,PNG,GIF Are The Only Valid Formate");</script>';
    }

}

?>
