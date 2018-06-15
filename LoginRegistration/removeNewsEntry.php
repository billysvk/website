<?php
	include ( "../cms/init.php" );
	include ( "../cms/check_login.php" );
	include ( "../cms/functions/menu.php" );

	 remove_news_entry( (int)$_REQUEST ['id'] );

	 //$whereToGo = (int) $_POST['eventId'];
     header ( "location:home.php");
     //header ('Location: ' .$_SERVER['REQUEST_URL']);
?>
