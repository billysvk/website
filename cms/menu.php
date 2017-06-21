<?php
	include ( "init.php" );
	include ( "check_login.php" );
	include ( "functions/menu.php" );

	$menu_records = get_items (); // Τραβάμε τις εγγραφές από τον πίνακα menu της βάσης δεδομένων
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>My site - Σύστημα Διαχείρισης</title>
<link href="css/main.css" rel="stylesheet" type="text/css"  />
</head>

<body>
	<div class="container">
    	<?php
        	include ( "header.php" );
			include ( "sidebar.php" );
		?>
        <div id="main">
        <?php
			if ( !empty ( $menu_records ) ) // Αν υπάρχουν εγγραφές
			{
				$i = 0;

				// Φτιάξε έναν html πίνακα
				echo "<table cellpadding='3' cellspacing='0' border='1' width='100%'>";
				echo "<tr>";
				echo "<td>Α/Α</td>";
				echo "<td>Όνομα</td>";
				echo "<td>Σειρά εμφάνισης</td>";
				echo "<td>Ενέργεια</td>";
				echo "</tr>";

				// Και εμφάνισε τις εγγραφές
				foreach ( $menu_records as $menu )
				{
					$i++;
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".stripslashes ( $menu ['name'] )."</td>";
					echo "<td>".$menu ['position']."</td>";
					echo "<td>";
					echo "<a href='edit_menu.php?id=".$menu ['id']."'>Επεξεργασία</a> | ";
					echo "<a href='delete_menu.php?id=".$menu ['id']."'>Διαγραφή</a>";
					echo "</td>";
					echo "</tr>";
				} // end foreach
				
				echo "</table>";
			} // end if
			else
			{
				echo "Δε βρέθηκαν εγγραφές.";
			} // end else
		?>
        	<p><a href='edit_menu.php'>Προσθήκη νέας εγγραφής</a></p>
        </div>
	</div>
</body>
</html>
<?php

	sqlsrv_close ( $con );
?>