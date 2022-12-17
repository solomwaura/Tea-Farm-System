<?php
include "../db.php";
$tm=$_GET['tm'];
$time=$_GET['time'];
$email=$_GET['email'];
$message=$_GET['message'];
$sql="UPDATE messages SET status='1' WHERE message='$message' AND time='$time'";
$res=mysqli_query($conn,$sql);
header("Location:chart.php?email=$email&&message=$message&&tm=$tm");
?>