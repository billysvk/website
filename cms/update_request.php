<?php
	include ( "init.php" );
	include ( "check_login.php" );
	include ( "functions/menu.php" );

	if ( isset ( $_POST ['Approve'] ) )
	{
		 $data ['id'] =  (int)$_POST ['id'] ;
				$data ['requestStatus'] =  "1" ;
				approve_request ( $data );

		header ( "location:registerRequests.php" ); // Ο χρήστης κατευθύνεται πάλι στη λίστα με τις εγγραφές
	} // end if
	if ( isset ( $_POST ['Reject'] ) )
	{
		 $data ['id'] =  (int)$_POST ['id'] ;
				$data ['requestStatus'] =  "2" ;
				approve_request ( $data );

		header ( "location:registerRequests.php" ); // Ο χρήστης κατευθύνεται πάλι στη λίστα με τις εγγραφές
	} // end if
?>
