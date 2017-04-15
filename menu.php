<?php
	include ( 'functions/menu.php' );

	$menu_items = get_menu ();

	if ( !empty ( $menu_items ) )
	{
		echo "<ul class='sidebar_menu'>";

		foreach ( $menu_items as $menu )
		{
			if ($menu ['name'] == "Login/Register"){
             echo "<div style=\"float:right;\"> <a href='./LoginRegistration/index.php' target='_self'>".$menu ['name']."</a> </div>"; 
			}else{
			echo "<li><a href='?id=".$menu ['id']."' target='_self'>".$menu ['name']."</a></li>";
		    }
		} 

		echo "</ul>";
	} // end if
?>
