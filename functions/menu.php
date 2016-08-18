<?php

	function get_menu ()
	{
		global $con;

		$sql = "SELECT id, name FROM menu ORDER BY position";
		$result = mysql_query ( $sql, $con );

		$rows = array ();
		while ( $row = mysql_fetch_array ( $result ) )
		{
			$rows [] = $row;
		} // end while

		return $rows;
	} // end function get_menu

	function get_page ( $id )
	{
		global $con;

		$sql = "SELECT title, content FROM menu WHERE id = ".$id;
		$result = mysql_query ( $sql, $con );

		$row = array ();
		if ( mysql_num_rows ( $result ) > 0 )
		{
			$row = mysql_fetch_array ( $result );
		} // end if

		return $row;
	} // end function get_page

?>