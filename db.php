<?php 
 error_reporting(0);
 
$server_name = "localhost";
$username = "root";
$password = "";
$database = "nmrc_game";


// Create connection
$con = mysqli_connect($server_name, $username, $password, $database);
$con->query("SET SESSION sql_mode=''");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>