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

	function get_all_data_for_this_lab($labId, $dateSelected)
	{
		global $con;
		$row = array ();
        $intLabId = (int)$labId;

		$sql = "SELECT * FROM event_calendar WHERE labId = $intLabId AND event_date = '$dateSelected'";
		$result = sqlsrv_query ( $con, $sql);
	    $row = sqlsrv_fetch_array ( $result );

		return $row;
	}

	function add_event_for_this_lab($data)
	{
		global $con;
		$row = array ();
        $intLabId = (int)$data ['labId'];

        $sql = "INSERT INTO event_calendar (labId,event_date,Title,Description,h_1,h_2,h_3,h_4,h_5,h_6,status) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$params = array($intLabId, $data ['event_date'],$data ['Title'],$data ['description'], $data ['h_1'],$data ['h_2'],$data ['h_3'],$data ['h_4'],$data ['h_5'],$data ['h_6'],$data ['Status']);
		$stmt = sqlsrv_query( $con, $sql, $params);
	}
?>