<?php
	include ( 'functions/menu.php' );

	$menu_items = get_menu ();

	if ( !empty ( $menu_items ) )
	{
		echo "<ul class='sidebar_menu'>";

		foreach ( $menu_items as $menu )
		{
			echo "<li><a href='?id=".$menu ['id']."' target='_self'>".$menu ['name']."</a></li>";
		} // end foreach

		echo "</ul>";
	} // end if
?>