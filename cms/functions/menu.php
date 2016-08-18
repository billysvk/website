<?php

	// Τραβάει από τη βάση όλες τις εγγραφές του πίνακα menu και επιστρέφει ένα πίνακα που τις περιέχει
	function get_items ()
	{
		global $con;

		$sql = "SELECT id, name, position FROM menu ORDER BY position";
		$result = mysql_query ( $sql, $con );

		$rows = array ();
		while ( $row = mysql_fetch_array ( $result ) )
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
		$result = mysql_query ( $sql, $con );

		if ( mysql_num_rows ( $result ) > 0 )
		{
			$row = mysql_fetch_array ( $result );
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
		$sql = "INSERT INTO menu (name, position, title, content) VALUES ('".$data ['name']."', ".$data ['position'].", '".$data ['title']."', '".$data ['content']."')";

		mysql_query ( $sql, $con );
	} // end function add_menu_item

	// Ενημερώνει μία νέα εγγραφή τα δεδομένα της οποίας είναι στον πίνακα $data
	function update_item ( $data )
	{
		global $con;

		$sql = "UPDATE menu set name = '".$data ['name']."', position = ".$data ['position'].", title = '".$data ['title']."', content = '".$data ['content']."' WHERE id = ".$data ['id'];
		mysql_query ( $sql, $con );
	} // end function update_menu_item

	// Διαγράφει την εγγραφή με συγκεκριμένο $id
	function delete_item ( $id )
	{
		global $con;

		$sql = "DELETE FROM menu WHERE id = ".$id;
		mysql_query ( $sql, $con );
	} // end function delete_menu_item
?>