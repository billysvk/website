<?php
	include ( "../functions/menu.php" );

	if ( isset ( $_REQUEST['submit'] ) )
	{
		        $data ['labId'] =  (int)$_REQUEST ['labId'] ;
		        $data ['userId'] =  (int)$_REQUEST ['uid'] ;
				$data ['email'] =  (string)$_REQUEST ['email'] ;
				$data ['name'] =  (string)$_REQUEST ['name'] ;
				$data ['unic'] =  (string)$_REQUEST ['unic'] ;
				subscribeToThisEvent ( $data );

		header ( "location:labpage.php?id=".$data ['labId']."" );
	} // end if
	if ( isset ( $_REQUEST['submit'] ) )
	{
		header ( "location:labpage.php?id=".$data ['labId']."" );
	} // end if
?>
