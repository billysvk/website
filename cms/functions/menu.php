<?php
$serverName = 'DESKTOP-IQAL01N';
$connectionInfo=array('Database' => 'calendar');

global $con;
$con = sqlsrv_connect($serverName, $connectionInfo);
	// Τραβάει από τη βάση όλες τις εγγραφές του πίνακα menu και επιστρέφει ένα πίνακα που τις περιέχει
	function get_labs()
	{
		global $con;

		$sql = "SELECT id, name, position FROM labs ORDER BY position";
		$result = sqlsrv_query ( $con,$sql);

		$rows = array ();
		while ( $row = sqlsrv_fetch_array ( $result ) )
		{
			$rows [] = $row;
		} // end whille

		return $rows;
	}
	function get_lab ( $id )
	{
		global $con;

		$id = (int) $id; // Το μετατρέπουμε σε ακέραια τιμή για λόγους ασφαλείας

		$sql = "SELECT id, name, position, title, content FROM labs WHERE id = ".$id;
		$result = sqlsrv_query ( $con, $sql );

		if ( sqlsrv_has_rows ( $result ) > 0 )
		{
			$row = sqlsrv_fetch_array ( $result );
		} // end if
		else
		{
			$row = 0;
		} // end else

		return $row;
	} // end function get_menu_item

	function add_lab  ( $data )
	{
	    global $con;

		$sql = "INSERT INTO labs (name,position,title) VALUES (?,?,?)";
        //TODO: ta pedio content prokalei provlhma... me tropo poy den epitrepei to post sth vash.
		$params = array($data ['name'],$data ['position'],$data ['title']);
		$stmt = sqlsrv_query( $con, $sql, $params);
    }

    function update_lab ( $data )
	{
		global $con;

		$sql = "UPDATE lab set name = '".$data ['name']."', position = ".$data ['position'].", title = '".$data ['title']."', content = '".$data ['content']."' WHERE id = ".$data ['id'];
		sqlsrv_query ( $con, $sql );
	} // end function update_menu_item

	// Διαγράφει την εγγραφή με συγκεκριμένο $id
	function delete_lab ( $id )
	{
		global $con;

		$sql = "DELETE FROM labs WHERE id = ".$id;
		sqlsrv_query ( $con, $sql );
	} // end function delete_menu_item

	/////////////////////////////

	function get_items ()
	{
		global $con;

		$sql = "SELECT id, name, position FROM menu ORDER BY position";
		$result = sqlsrv_query ( $con,$sql);

		$rows = array ();
		while ( $row = sqlsrv_fetch_array ( $result ) )
		{
			$rows [] = $row;
		} // end whille

		return $rows;
	} // end function get_menu

	// Τραβάει μία εγγραφή με συγκεκριμένο id
	function get_item ( $id )
	{
		global $con;

		$id = (int) $id; // Το μετατρέπουμε σε ακέραια τιμή για λόγους ασφαλείας

		$sql = "SELECT id, name, position, title, content FROM menu WHERE id = ".$id;
		$result = sqlsrv_query ( $con, $sql );

		if ( sqlsrv_has_rows ( $result ) > 0 )
		{
			$row = sqlsrv_fetch_array ( $result );
		} // end if
		else
		{
			$row = 0;
		} // end else

		return $row;
	} // end function get_menu_item

	// Προσθέτει μία νέα εγγραφή τα δεδομένα της οποίας είναι στον πίνακα $data
	function add_item  ( $data )
	{
	    global $con;

		$sql = "INSERT INTO menu (name,position,title) VALUES (?,?,?)";
        //TODO: ta pedio content prokalei provlhma... me tropo poy den epitrepei to post sth vash.
		$params = array($data ['name'],$data ['position'],$data ['title']);
		$stmt = sqlsrv_query( $con, $sql, $params);
    }
	// Ενημερώνει μία νέα εγγραφή τα δεδομένα της οποίας είναι στον πίνακα $data
	function update_item ( $data )
	{
		global $con;

		$sql = "UPDATE menu set name = '".$data ['name']."', position = ".$data ['position'].", title = '".$data ['title']."', content = '".$data ['content']."' WHERE id = ".$data ['id'];
		sqlsrv_query ( $con, $sql );
	} // end function update_menu_item

	// Διαγράφει την εγγραφή με συγκεκριμένο $id
	function delete_item ( $id )
	{
		global $con;

		$sql = "DELETE FROM menu WHERE id = ".$id;
		sqlsrv_query ( $con, $sql );
	} // end function delete_menu_item
?>