<?php
	include ( "../cms/init.php" );
	include ( "../cms/check_login.php" );
	include ( "../cms/functions/menu.php" );

	if ( isset ( $_POST ['Approve'] ) )
	{
		        $data ['eventId'] =  (int)$_POST ['eventId'] ;
		        $data ['labId'] =  (int)$_POST ['labId'] ;
				$data ['status'] =  "1" ;
				approve_subscription( $data );
	} // end if
	if ( isset ( $_POST ['Reject'] ) )
	{
		        $data ['eventId'] =  (int)$_POST ['eventId'] ;
		        $data ['labId'] =  (int)$_POST ['labId'] ;
				$data ['status'] =  "2" ;
				reject_subscription ( $data );
	} // end if
	 $whereToGo = (int) $_POST['eventId'];
     header ( "location:application_edit.php?id=$whereToGo" );
?>
