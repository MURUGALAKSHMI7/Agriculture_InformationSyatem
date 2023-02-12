Crop_details.php:
<?php
    include('nav.php');
    ?>
<div class="container" style=" margin-top:100px;">
<div style="height:50px;">
    <form method="post" class="col-md-3 pull-right">
        <div class="input-group input-group-sm">
       <input type="text" class="form-control" name="opt" placeholder="Search">
            <div class="input-group-btn">
        <input type="submit" name="optt" class="btn btn-info">
                </div>
            </div>
        </form>
        </div>   
  <h3>CROP</h3> <a href="add_crop.php"><button class="btn btn-success pull-right" style="width:100px;">Add Crop</button></a>
	<table class="table table-hover" style="background-color:gray">
    <thead>
      <tr>
        <th>Crop</th>
        <th>Soil</th>
        <th>Nitrogen</th>
		<th>Potassium</th>
        <th>Phosphorous</th>
        <th>Fertilizer</th>
		<th>Temparature</th>
        <th>Humidity</th>
        <th>Moisture</th>
      </tr>
    </thead>
    <tbody>
	<?php
	require('../conf.php');
	if(isset($_POST['optt'])){
		$search = $_POST['opt'];
		$sql = mysqli_query($con,"select * from crop where crop='$search' or soil='$search'");
	}else{
		$sql = mysqli_query($con,"select * from crop");
	}
	while($row = mysqli_fetch_array($sql)){

	?>
      <tr>
	    <td><?php echo $row['crop'];?></td>
        <td><?php echo $row['soil'];?></td>
        <td><?php echo $row['nitro'];?></td>
		<td><?php echo $row['potasi'];?></td>
        <td><?php echo $row['Phosphorous'];?></td>
        <td><?php echo $row['Fertilizer'];?></td>
		<td><?php echo $row['tem'];?></td>
        <td><?php echo $row['humidity'];?></td>
        <td><?php echo $row['mositure'];?></td>
      </tr>
	<?php
	}
	?>
    </tbody>
  </table>
</div>
</body>
</html>
