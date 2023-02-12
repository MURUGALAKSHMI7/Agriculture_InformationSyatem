Add_crop.php:
<!DOCTYPE html>
<?php
require('../conf.php');
if(isset($_POST['addcrop'])){
	$soil = $_POST['soil'];
	$crop = $_POST['crop'];
	$nitro = $_POST['nitro'];
	$potas = $_POST['potas'];
	$phosp = $_POST['phosp'];
	$ferti = $_POST['ferti'];
	$tem = $_POST['tem'];
	$hum = $_POST['hum'];
	$mois = $_POST['mois'];
	$query = "INSERT INTO `crop`(`crop`, `soil`, `nitro`, `potasi`, `Phosphorous`, `Fertilizer`, `tem`, `humidity`, `mositure`)
			VALUES ('$crop','$soil','$nitro','$potas','$phosp','$ferti',$tem,$hum,$mois)";
	$sql = mysqli_query($con, $query)or die(mysqli_error($con));
	if($sql){
		echo "<script>alert('Crop added Successfully');window.location.href='crop_details.php';</script>";
	}else{
		echo "<script>alert('invaild Data');</script>";
	}
}
?>

<?php  include('nav.php'); ?>
    
    <div class="col-md-4">
    </div>
<div class="container col-md-6" style="margin-top:100px;">
    <form method="POST">
    <label>Crop Name</label>
        <input type="text" required name="crop" placeholder="Enter Crop Name" class="form-control ll">
	<label>Soil Type</label>
       <input type="text" name="soil" class="form-control ll" placeholder="Enter Soil Type">
	<label>Nitrogen</label>
       <input type="text" name="nitro" class="form-control ll" placeholder="Enter Nitrogen Level">
	<label>Potassium</label>
       <input type="text" name="potas" class="form-control ll" placeholder="Enter Potassium Level">
	<label>Phosphorous</label>
       <input type="text" name="phosp" class="form-control ll" placeholder="Enter Phosphorous Level">
    <label>Fertilizer</label>
          <input type="text" name="ferti" class="form-control ll" placeholder="Enter Fertilizer">
    <label>Temparature</label>
       <input type="text" name="tem" class="form-control ll" placeholder="Enter Temparature">
	<label>Humidity</label>
       <input type="text" name="hum" class="form-control ll" placeholder="Enter Humidity">
	<label>Moisture</label>
       <input type="text" name="mois" class="form-control ll" placeholder="Enter Moisture">	   
    <br>
   <input type="submit" value="Add Crop" name="addcrop" class="btn btn-primary">
    </form><br><br><br>
</div>
</body>
<script>
        
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>
</html>
Technology.php:
<?php
    include('nav.php');
	require('../conf.php');
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$action = $_GET['action'];
		if($action == 'delete'){
			$sql = mysqli_query($con, "DELETE FROM `techno` WHERE id=$id")or die(mysqli_error($con));
			if($sql){
			echo "<script>alert('Technologies Delete Successfully');window.location.href='technology.php';</script>";
			}else{
				echo "<script>alert('invaild Data');</script>";
			}
		}
	}
    ?>
<div class="container" style=" margin-top:100px;">
  <a href="add_techno.php"><button class="btn btn-success pull-right"> Add Technologies</button></a>
  <table class="table" style="background-color:gray">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
		<th>Video</th>
		
		<th>Delete</th>
	  </tr>
    </thead>
    <tbody>
	<?php
	
	if(isset($_POST['optt'])){
		$search = $_POST['opt'];
		$sql = mysqli_query($con,"select * from techno where crop='$search' or soil='$search'");
	}else{
		$sql = mysqli_query($con,"select * from techno");
	}
	while($row = mysqli_fetch_array($sql)){

	?>
      <tr>
	    <td><?php echo $row['name'];?></td>
        <td><?php echo $row['description'];?></td>
        <td><img src="<?php echo 'image/'.$row['image'];?>" width="75px" height="75px"></td>
		<td><a href="<?php echo $row['video'];?>"><?php echo $row['video'];?></a></td>
		
		<td><a href="technology.php?id=<?php echo $row['id'];?>&action=delete">Delete</a></td>
      </tr>
	<?php
	}
	?>
    </tbody>
  </table>
</div>
</body>
</html>
