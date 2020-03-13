<?php
$host = '3210jr44339.ipagemysql.com';
$loginUser = 'joeeverest';
$loginPassword = 'nGf2PKPThV*9';
$dbName = 'regtest';
$connect = mysqli_connect($host, $loginUser, $loginPassword, $dbName);//Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}