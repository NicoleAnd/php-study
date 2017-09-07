<?php 

$mysqli = new mysqli('localhost','root','root','php105');
if ($mysqli->connect_errno) {
	echo "error";
	echo $mysqli->connect_error;
	exit;
}
$mysqli->query("SET NAMES UTF8");


 ?>