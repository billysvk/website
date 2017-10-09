<?php
	header('Content-type: text/html; charset=utf-8'); // Το χρησιμοποιούμε για να φαίνονται σωστά τα ελληνικά
	session_start ();

	!isset ( $_SESSION ['login'] ) ? $_SESSION['login'] = 0: NULL; // Ελέγχουμε αν υπάρχει η μεταβλητή login στα session
	$login = $_SESSION ['login'];

	$connectionInfo = array ("Database"=>"calendar");
	$con = sqlsrv_connect ( "DESKTOP-IQAL01N", $connectionInfo ); // Σύνδεση με τη βάση
	if ( !$con )
	{
		die ( "Δεν ήταν δυνατή η σύνδεση με τη βάση δεδομένων: ".sqlsrv_error () );
	} // end if
	else
	{
		//echo "conneted!";
		/*$db = sqlsrv_select_db ( $connectionInfo, $con ); // Επιλογή βάσης

		if ( !$db )
		{
			die ( "Δεν ήταν δυνατή η επιλογή της βάσης: ".sqlsrv_error () );
		} */
		// end if
	} // end else


	sqlsrv_query ( $con,"SET NAMES 'utf8';" ); // Αυτό χρησιμοποιείται για να αποφύγονται τυχόν προβλήματα με την εμφάνιση των ελληνικών
?>
