<?php
	function check_login ( $username, $password )
	{
		global $con; // Η καθολική μεταβλητή της σύνδεσης με τη βάση δεδομένων

		/* H mysql_real_escape_string χρησιμοποιείται σε αλφαριθμητικά για την ασφάλεια από κακόβουλες επιθέσεις.*/
		$username = mysql_real_escape_string ( $username );
		$password = mysql_real_escape_string ( $password );

		$sql = "SELECT username FROM admin WHERE username = '".$username."' AND password = SHA1('".$password."')";
		$result = mysql_query ( $sql, $con );

		if ( mysql_num_rows ( $result ) > 0 ) // Ελέγχουμε τον αριθμό των εγγραφών που θα επιστρέψει το query
		{
			return 1; // Επιστρέφει 1 αν βρεθεί εγγραφή
		} // end if
		else
		{
			return 0; // Επιστρέφει 0 αν δε βρεθεί εγγραφή
		} // end else

	} // end function check_login
?>