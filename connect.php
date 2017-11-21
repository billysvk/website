<?php

$serverName = 'DESKTOP-IQAL01N';
$connectionInfo = array('Database' => 'calendar');

$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn) {
    echo 'connected<br/>';
} else {
    echo 'failed<br />';
    die(print_r(sqlsrv_errors(), TRUE));
}
?>