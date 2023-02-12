Add_price.php:
<?php  
include('nav.php');
require('../conf.php');
if(isset($_POST['addprice'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
	
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
		$file = $_FILES['file']['name'];
        //$aa = mysqli_query($dbh,'CREATE TABLE '.$file.'(Day varchar(255),Date varchar(255),Time varchar(255),Subject varchar(255));');
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                
                $price=$line[1];
				$name=$line[0];
				$date = date('d/m/Y');
				
				$sql="INSERT INTO `price`(`name`, `date`, `price`) VALUES ('$name','$date','$price')";
				$re = mysqli_query($con ,$sql) or die(mysqli_error($dbh));
            }
            		
            // Close opened CSV file
            fclose($csvFile);
            
           echo "<script>alert('Successfully Updated Price');</script>";
        }else{
           echo "<script>alert('Something Wrong');</script>";
        }
    }else{
       echo "<script>alert('Invaild File Format');</script>";
    }
}

 ?>
    
    <div class="col-md-4">
    </div>
<div class="container col-md-6" style="margin-top:100px;">
    <form method="POST" enctype="multipart/form-data">
    <label>Upload Price Details</label>
    <input type="file" name="file" class="form-control ll">
   
    <br>
   <input type="submit" value="Add Price" name="addprice" class="btn btn-primary">
    </form>
</div>
</body>
</html>
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
