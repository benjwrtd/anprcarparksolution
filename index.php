<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<html>
<head>
<title>ANPR Car Parks</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="page">
<table>
<?php
include('sql.php');
$result = mysqli_query($con,"SELECT * FROM test2 WHERE verified != 1 AND staff != 1 AND cashpurchase != 1 AND notentered != 1 ORDER BY time_entered DESC");
$count1 = mysqli_query($con,"SELECT count(1) FROM test2");
$count2 = mysqli_query($con,"SELECT * FROM test2 WHERE entered != 0");
$count3 = mysqli_query($con,"SELECT * FROM test2 WHERE verified = 1");
$count4 = mysqli_query($con,"SELECT * FROM test2 WHERE cashpurchase = 1");
$row1 = mysqli_fetch_array($count1);
$total1 = $row1[0];
$total2 = mysqli_num_rows ($count2);
$total3 = mysqli_num_rows ($count3);
$total4 = mysqli_num_rows ($count4);
$total5 = $total2+$total3+$total4;
?>
<h1>ANPR Entry System</h1>
<table class="table" border="1" cellpadding="5px" cellspacing="2px" align="center" id="update">
<th>Registration</th>
<th>Verified</th>
<th>Cash Sale</th>
<th>Staff</th>
<th>Not Entered</th>


<?php while ($res = mysqli_fetch_array($result)) { ?>
    <tr>
    <td><plate><?php echo $res['plate']; ?></plate></td>
    <td><a href="verified.php?id=<?php echo $res['plate']; ?>">Verified</a></td>
    <td><a href="cash.php?id=<?php echo $res['plate']; ?>">Cash Sale</a></td>
    <td><a href="staff.php?id=<?php echo $res['plate']; ?>">Staff</a></td>
    <td><a href="notentered.php?id=<?php echo $res['plate']; ?>">Not Entered</a></td>
    </tr>
<?php } ?>
</table>


<?php











?>
</br>
<p>Total Prepaid in Database: <?= $total1 ?></p>
<p>Total Prepaid via ANPR: <?= $total2 ?></p>
<p>Total Prepaid Verified: <?= $total3 ?></p>
<p>Total Cash Purchase: <?= $total4 ?></p>
<p>Total Via This Gate: <?= $total5 ?></p>


   
</div>
</body>
</div>
</html>
