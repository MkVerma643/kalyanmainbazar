<?php 
require_once("includes/db.php");
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

@ob_start();
if(!isset($_SESSION))
session_start();
if( empty($_SESSION['id'])){
    echo "<script>window.location='index.php'</script>";
}


?>
