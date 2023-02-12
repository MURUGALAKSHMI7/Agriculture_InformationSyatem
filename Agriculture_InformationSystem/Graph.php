Graph.php:
<?php
 
 include('../conf.php');
	session_start();
	$name = $_GET['name'];
 $sql = mysqli_query($con ,"select * from price where name='$name'");
 $count = mysqli_num_rows($sql);
 $dataPoints = array();
 while($row = mysqli_fetch_array($sql)){
		
array_push($dataPoints,

	array("y" => $row['price'])
	
	
);
	
	
 }
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Price List"
	},
	axisY: {
		title: "Date",
		valueFormatString: "",
		
	},
	axisX:{
		title: "Price"
	},
	data: [{
		type: "spline",
		markerSize: 5,
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
 
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  
