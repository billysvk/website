<?php
	header('Content-type: text/html; charset=utf-8'); // Το χρησιμοποιούμε για να φαίνονται σωστά τα ελληνικά
	session_start ();

	$con = mysql_connect ( "localhost", "my_usr", "my_password" ); // Σύνδεση με τη βάση
	if ( !$con )
	{
		die ( "Δεν ήταν δυνατή η σύνδεση με τη βάση δεδομένων: ".mysql_error () );
	} // end if
	else
	{
		$db = mysql_select_db ( "calendar", $con ); // Επιλογή βάσης

		if ( !$db )
		{
			die ( "Δεν ήταν δυνατή η επιλογή της βάσης: ".mysql_error () );
		} // end if
	} // end else

	mysql_query ( "SET NAMES 'utf8';", $con ); // Αυτό χρησιμοποιείται για να αποφύγονται τυχόν προβλήματα με την εμφάνιση των ελληνικών

	isset ( $_GET ['id'] ) ? $id = (int) $_GET ['id']: $id = 1;
?>