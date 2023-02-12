Nav.php
<!DOCTYPE html>
<?php
session_start();
if(empty($_SESSION['admin'])){
	header('location: ../index.php');
}
?>
<html lang="en">
     <head>
  <title>AGRICULTURE</title>
   <link rel="icon" href="../images/agriculture/logo.png" type="image/gif">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
         <link href="../style.css" rel="stylesheet">
         <style>
             a {color:white;}
         </style>
</head>
<body class="adm">
<div id="topheader" class="bg-primary">
  <nav class="navbar">
		<div class="container-fluid">
			 <div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" style="background-color:black;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span style="background-color:white;" class="icon-bar"></span>
<span style="background-color:white;" class="icon-bar"></span>
<span style="background-color:white;" class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="index.php"><img src="../images/agriculture/logo%201.png" style="width: 50px;"></a>
			 </div><br>
			 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
<li><a href="index.php">Home</a></li>
<li><a href="crop_details.php">Crop</a></li>
<li><a href="technology.php">New Technology</a></li>
<li><a href="price.php">Statistical Details</a></li>
<li><a href="event.php">Events</a></li>
<li><a href="scheme.php">Scheme</a></li>
<li><a href="logout.php">Logout</a></li>
                 </ul>
			 </div>
		</div>
  </nav>
</div>

<script>
for (var i = 1; i < document.links.length; i++) {
    if (document.links[i].href == document.URL) {
        document.links[i].className = 'active';
    }
}
</script>
