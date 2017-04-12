<?php

$serverName = 'DESKTOP-CR2KAPT';
$connectionInfo=array('Database' => 'calendar');

$conn = sqlsrv_connect($serverName, $connectionInfo);
if($conn) {
	echo 'connected<br/>';
}else{
	echo 'failed<br />';
	die(print_r(sqlsrv_errors(),TRUE));
}

$sql='SELECT * FROM admin';
$stmt=sqlsrv_query($conn,$sql);
if($stmt == false){
	echo 'error';
	die(print_r(sqlsrv_errors(),TRUE));
}
$row=sqlsrv_fetch_array($stmt);
echo 'h timh einai : ' .$row[0];
?>