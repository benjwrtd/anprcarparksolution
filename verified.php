<head>
<link rel="stylesheet" href="style.css">
</head>
<?php
include('sql.php');
$timestamp = date("Y-m-d H:i:s");
$id = $_GET['id'];
if($id!=""){
mysqli_query($con,"UPDATE test2 SET verified='1' WHERE plate='$id'");
$result = "$id Updated Successfully";
}
else
{
$result = 'Error, Try again';
}
?>
<body>
<p><?= $result ?></p>
<div class="wrapper">
	<form action="./">
	<button class="button" type="submit">Continue</button>
</div>
<script>
setTimeout(function(){
window.location.href = 'http://192.168.1.13/main.php';}, 1000);
</script>
</body>


