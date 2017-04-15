<?php
	$page = get_page ( $id );
	if ( !empty ( $page ['title'] ) )
	{
		echo "<h1 class='title orange'>".$page ['title']."</h1>";
	} // end if

	if ( $id == 2 ) // Σελίδα φόρμας επικοινωνίας
	{
		include ( 'contact.php' );
	} // end if
	
	if ($id == 3 )
	{
	   include ('labs.php');	
	}
	if ($id == 7 )
	{
	   include ('cms/main.php');	
	}
	if ($id==1) // Οποιαδήποτε άλλη σελίδα
	{
		//echo $page ['content'];
		include('main.php');
	} // end else
?>