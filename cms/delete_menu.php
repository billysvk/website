<?php
	include ( "init.php" );
	include ( "check_login.php" );
	include ( "functions/menu.php" );

	isset ( $_GET ['id'] ) ? $id = $_GET ['id']: $id = 0; // Παίρνουμε το id με τη μέθοδο GET
	delete_item ( $id ); // Καλούμε τη συνάρτηση delete_item για να διαγράψουμε την εγγραφή

	header ( "location:menu.php" ); // Κατευθύνουμε το χρήστη στη λίστα με τις εγγραφές
?>