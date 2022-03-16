<!DOCTYPE html>
<html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>


<script type="text/javascript">
jQuery(document).ready(function(){
	function autorefresh1(){
		$("#loadindex").load("index.php");
	}
autorefresh1();
setInterval(autorefresh1,2000);
});
</script>

<style>
.loader {
  position:fixed;
  left: 50%;
  margin-left: -4em;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>


<body>
     <div id="loadindex"> 
     
     
      </div>
     
</body>


<?php
include('sql.php');
$values = array();
if(isset($_POST["upload"]))
{
$count=0;
	if($_FILES['import_csv']['name'])
	{
		$filename = explode(".",$_FILES['import_csv']['name']);
		if(end($filename) == "csv")
		{
		$handle = fopen($_FILES['import_csv']['tmp_name'],"r");
		while($data = fgetcsv($handle))
		{
		if($count > 0)
		{
			$fieldVal1 = mysqli_real_escape_string($con,strtoupper($data[0]));
			$query = "INSERT INTO test2 (plate,verified) VALUES ( '".$fieldVal1. "', 1)";
			mysqli_query($con,$query);
		}
		$count++;
		}
		
		
		}
		else
		{
			$message = '<label class ="text-danger">Please Select CSV File only.</label>';
		}
	}
	else
	{
		$message = '<label class ="text-danger">Please Select File</label>';
	}
fclose($handle);
}



?>




<div id="forms"> 
	    <div style="text-align:center;">
	<form method = "POST" enctype="multipart/form-data">
	<input type="file" name="import_csv">
    <input type="submit" name="upload" id="upload" value="Upload">
</div>
</html>

