<?php
$host = 'localhost';
$loginUser = 'root';
$loginPassword = '';
$dbName = 'niuzie';
$connect = mysqli_connect($host, $loginUser, $loginPassword, $dbName);//Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}
date_default_timezone_set("Africa/Dar_es_Salaam");
?>