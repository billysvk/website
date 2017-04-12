<?php

	function get_menu ()
	{
		global $con;

		$sql = "SELECT id, name FROM menu ORDER BY position";
		$result = sqlsrv_query ( $con,$sql );

		$rows = array ();
		while ( $row = sqlsrv_fetch_array ( $result ) )
		{
			$rows [] = $row;
		} // end while

		return $rows;
	} // end function get_menu

	function get_page ( $id )
	{
		global $con;

		$sql = "SELECT title, content FROM menu WHERE id = ".$id;
		$result = sqlsrv_query ( $con, $sql);

		$row = array ();
		if ( sqlsrv_num_rows ( $result ) > 0 )
		{
			$row = sqlsrv_fetch_array ( $result );
		} // end if

		return $row;
	} // end function get_page

?>