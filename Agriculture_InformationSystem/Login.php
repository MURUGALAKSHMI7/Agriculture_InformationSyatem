Login.php:
<?php
include('conf.php');
session_start();
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


</style>
</head>

<body class="lgn">

   <!-- <button class="btn btn-warning pull-right"><a style="color:black;" href="javascript:history.go(-1)">Go Back</a></button>-->
    
    <?php
    include('nav.php');
    ?>
    
<div class="container" style="margin-top:10%;text-align:center;"> 
    <h1 style="text-align:left;"><u>LOGIN</u></h1>
  <div class="row">
      
    <div class="col-sm-6">
      <div class="panel-primary" style="background-color:#00000047;">
        <div class="panel-heading">
            <span onclick="document.getElementById('id01').style.display='block'" style="width:auto;">ADMIN</span>
          </div>
      </div>
    </div>
      
    
      
    <div class="col-sm-6">
      <div class="panel-primary" style="background-color:#00000047;">
        <div class="panel-heading">
            <span onclick="document.getElementById('id02').style.display='block'" style="width:auto;">USER</span>
          </div>
      </div>
    </div>

  </div>
</div>

    
    
    
    <div id="id01" class="modal">
  <form class="modal-content container animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/image_admin.png" alt="Avatar" class="avatar">
    </div>

      <label for="uname"><b>Username</b></label>
      <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
        <br>
      <input class="btn btn-primary" name="adm" type="submit" value="Login">
      <button onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger">Cancel</button>
      <br>
      <br>
  </form>
</div>
    
<div id="id02" class="modal">
  <form class="modal-content container animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/images.png" alt="Avatar" class="avatar">
    </div>

    <div class="">
      <label for="uname"><b>Username</b></label>
      <input type="text" class="form-control" placeholder="Enter Username" name="uuname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" class="form-control" placeholder="Enter Password" name="upsw" required><br>
        
      <input type="submit" name="usr" class="btn btn-primary" value="Login">
   
      <a href="registration.php"><span class="btn btn-success">Register</span></a>

      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="btn btn-danger">Cancel</button>
        <br><br>
         </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>



<?php

if(isset($_POST['adm']))
{
    $uname=$_POST['uname'];
    $password=$_POST['psw'];
    if($uname == 'admin' && $password == 'admin')
    {
        $_SESSION['admin']='admin';
		echo "<script> window.location.href='admin/';</script>";
    }
    else
    {
        echo '<script>alert("Try Again")</script>';
    }
}

if(isset($_POST['usr']))
{
    $uname=$_POST['uuname'];
    $password=$_POST['upsw'];
    $query1="SELECT * FROM `registration` WHERE `uname` = '".$uname."' && `password` = '".$password."'";
    $res1=mysqli_query($con,$query1)or die(mysqli_query($con));
    $fet=mysqli_num_rows($res1);
    if($fet == 1)
    {
		$_SESSION['user'] = $uname;
	   echo "<script> window.location.href='user/';</script>";
    }
    else
    {
        echo '<script>alert("Try Again User")</script>';
    }
}
?>
