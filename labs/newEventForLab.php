<?php
	include ( "functions/menu.php" );

	if ( isset ( $_POST ['action'] ) )
	{
		switch ( $_POST ['action'] )
		{
			case "add": // Περίπτωση προσθήκης εγγραφής
				
				$data ['name'] =  $_POST ['name'] ; // Αν πρόκειται για αλφαριθμητικό, χρησιμοποιούμε την mysql_real_escape_string
				$data ['position'] = (int) $_POST ['position']; // Αν θέλουμε ακέραια τιμή, χρησιμοποιούμε την (int)
				$data ['title'] =  $_POST ['title'] ;
				$data ['comment'] =  $_POST ['comment'] ;

				add_lab ( $data );
			break;

			

		} // end switch

		header ( "location:AddLabs.php" ); // Ο χρήστης κατευθύνεται πάλι στη λίστα με τις εγγραφές
	} // end if
?>