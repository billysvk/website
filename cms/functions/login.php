
<?php
function check_login ( $username, $password )
	{
$serverName = 'DESKTOP-CR2KAPT';
$connectionInfo=array('Database' => 'calendar');

$con = sqlsrv_connect($serverName, $connectionInfo);
if($con) {
	echo 'connected<br/>';
}else{
	echo 'failed<br />';
	die(print_r(sqlsrv_errors(),TRUE));
}

$sql="SELECT * FROM admin WHERE username = '$username'";
$stmt=sqlsrv_query($con,$sql);
if($stmt == false){
	echo 'error';
	die(print_r(sqlsrv_errors(),TRUE));
}

$count = sqlsrv_has_rows($stmt);
if ($count > 0) // Ελέγχουμε τον αριθμό των εγγραφών που θα επιστρέψει το query
	 	{
			return 1; // Επιστρέφει 1 αν βρεθεί εγγραφή
	 	} // end if
	 	else
	 	{
	 		return 0; // Επιστρέφει 0 αν δε βρεθεί εγγραφή
		} // end else
}
?>