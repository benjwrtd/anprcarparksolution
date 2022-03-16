<style>
tr:hover {background-color: #D6EEEE;}
h1	{color: #15233C;
	font-family: verdana;
	text-align: center;
	font-size:200%;
	}
p	{color: #15233C;
	font-family: verdana;
	text-align: center;
	font-size:120%;
	}
.wrapper {
    	text-align: center;
	}

.button {
    	padding:5px 15px; 
    	background:#ccc; 
    	border:0 none;
    	cursor:pointer;
    	-webkit-border-radius: 5px;
    	border-radius: 5px;
    	font-family: verdana;
    	font-size:120%;
	}
table {
	font-family:"Courier New", Courier, monospace; 
	font-size:120%; 
	border: 1px solid black
	}
body 	{
	background-color: #DBF9FC;
	}
td {
  height: 25px;
  text-align: center;
}
</style>
<?php
include('sql.php');
$timestamp = date("Y-m-d H:i:s");
$id = $_GET['id'];
if($id!=""){
mysqli_query($con,"UPDATE test2 SET verified='1' WHERE plate='$id'");
echo 'record updated successfully';
}
else
{
echo 'Error, Try again';
}
?>

