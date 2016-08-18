<?php
	include ( "init.php" );
	include ( "check_login.php" );
	include ( "functions/menu.php" );

	if ( isset ( $_POST ['action'] ) )
	{
		switch ( $_POST ['action'] )
		{
			case "add": // Περίπτωση προσθήκης εγγραφής
				$data ['name'] = mysql_real_escape_string ( $_POST ['name'] ); // Αν πρόκειται για αλφαριθμητικό, χρησιμοποιούμε την mysql_real_escape_string
				$data ['position'] = (int) $_POST ['position']; // Αν θέλουμε ακέραια τιμή, χρησιμοποιούμε την (int)
				$data ['title'] = mysql_real_escape_string ( $_POST ['title'] );
				$data ['content'] = mysql_real_escape_string ( $_POST ['content'] );

				add_item ( $data );
			break;

			case "update": // Περίπτωση επεξεργασίας εγγραφής
				$data ['id'] = (int) $_POST ['id'];
				$data ['name'] = mysql_real_escape_string ( $_POST ['name'] );
				$data ['position'] = (int) $_POST ['position'];
				$data ['title'] = mysql_real_escape_string ( $_POST ['title'] );
				$data ['content'] = mysql_real_escape_string ( $_POST ['content'] );

				update_item ( $data );
			break;

		} // end switch

		header ( "location:menu.php" ); // Ο χρήστης κατευθύνεται πάλι στη λίστα με τις εγγραφές
	} // end if
?>