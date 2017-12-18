<?php

session_start();

$passcode = '1234567';
 
$servername = "lrgs.ftsm.ukm.my";
$username = "a163495";
$password = "0Iy$9Xc";
$dbname = "a163495";

if(!isset($_SESSION['errors'])){
	$_SESSION['errors'] = [];
}

include_once "eloquent.php";
?>