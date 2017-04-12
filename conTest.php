<?php 
$server = 'DESKTOP-CR2KAPT';
$connectionInfo = array ("Database"=>"calendar");
$test = sqlsrv_connect($server, $connectionInfo)or die('die!');
if ($test) echo "asd";
else echo "dsfsdf";
?>