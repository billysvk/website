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
		$newRow = array ();
		$found = 0;
        $intLabId = (int)$labId;
        //$d = new DateTime($dateSelected);
		//$timestamp = $d->getTimestamp(); // Unix timestamp
		//$formatted_date = $d->format('Y-d-m'); // 2003-10-16
		//$d = new DateTime($dateSelected, new DateTimeZone('Europe/Athens'));
		//var_dump($d->getTimestamp()); // 1457690400

		$sql = "SELECT * FROM event_calendar WHERE labId = $intLabId AND event_date = '$dateSelected'";
		$result = sqlsrv_query ( $con, $sql);
	    $row = sqlsrv_fetch_array ( $result );
		
	// 	if ($row) {

	// 		foreach ($row as $value) {
    //    $s = new DateTime($value ['event_date'], new DateTimeZone('Europe/Athens'));
	// 	var_dump($d->getTimestamp()); // 1457690400
	// 			 if($found == 1)
    //      		  	break;
	// 			if ($value ['event_date'] == $formatted_date) {
	// 				$found = 1;
	// 				$newRow = $value;
	// 			}
	// 		}
			
	// 	}

		return $row;
	}
?>