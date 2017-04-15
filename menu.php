<?php
	include ( 'functions/menu.php' );
	//global $uName;
$menu_items = get_menu ();


if( isset($_SESSION['firstMessage']) ) {
	      $uName = $_SESSION['firstMessage'];
    
    }

if( !isset($_SESSION['firstMessage']) ) {

	foreach ( $menu_items as $menu )
		{
			if ($menu ['name'] == "Login/Register"){
	      $uName = $menu ['name'];
   
             }
        }
}
	
	if ( !empty ( $menu_items ) )
	{
		echo "<ul class='sidebar_menu'>";

		foreach ( $menu_items as $menu )
		{
			if ($menu ['name'] == "Login/Register"){
			echo "<li><a href='./LoginRegistration/index.php' target='_self'></span>&nbsp;$uName</a></li>";
			}else{
			echo "<li><a href='?id=".$menu ['id']."' target='_self'>".$menu ['name']."</a></li>";
		    }
		} 

		echo "</ul>";
	} // end if
?>
