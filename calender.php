<?php
//header('Content-type: text/html; charset=utf-8'); // Το χρησιμοποιούμε για να φαίνονται σωστά τα ελληνικά

$server = 'DESKTOP-IQAL01N';
$connectionInfo = array ("Database"=>"calendar");
$test = sqlsrv_connect($server, $connectionInfo)or die('die!');
//echo"Connected to Database<br/><hr>";
?>

<html>
<head>

</head>

<!--highlight an event-->
 <style>
.today{
background-color: #00ff00;
}
.event{
background-color: #FF8080;
}
</style>

<body>

<?php
 include ( 'calendar/main.php' );
?>
</body>
</html>

</body>

</html>