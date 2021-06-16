<?php 
include('db.php');
date_default_timezone_set("Asia/Kolkata");   
$game_date=date('Y-m-d');
$game_time=date('h:i A');

$in=mysqli_query($con,"INSERT INTO `test`(`test`, `added_date`, `added_time`) VALUES ('2','".$game_date."','".$game_time."')");
?>

