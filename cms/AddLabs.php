<?php
	include ( "init.php" );
	//include ( "check_login.php" );
	include ( "functions/menu.php" );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>My site - Σύστημα Διαχείρισης</title>
<link href="css/main.css" rel="stylesheet" type="text/css"  />
<link href="../css/customCss.css" rel="stylesheet" type="text/css"  />
</head>

<body>
	<?php
		include ("sidebar.php");
		$menu_records = get_labs (); 
	?>
	<div class="container">
        <div id="main">
        <?php
			if ( !empty ( $menu_records ) ) 
			{
				$i = 0;

				echo "<table cellpadding='3' cellspacing='0' border='1' width='100%'>";
				echo "<tr>";
				echo "<td>Α/Α</td>";
				echo "<td>Όνομα</td>";
				echo "<td>Σειρά εμφάνισης</td>";
				echo "<td>Ενέργεια</td>";
				echo "</tr>";

				foreach ( $menu_records as $menu )
				{
					$i++;

					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".stripslashes ( $menu ['name'] )."</td>";
					echo "<td>".$menu ['position']."</td>";
					echo "<td>";
					echo "<a href='edit_labs_menu.php?id=".$menu ['id']."'>Επεξεργασία</a> | ";
					echo "<a href='delete_lab.php?id=".$menu ['id']."'>Διαγραφή</a>";
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
        	<p><a href='edit_labs_menu.php'>Προσθήκη νέας εγγραφής</a></p>
        </div>
	</div>
</body>
</html>
<?php

	sqlsrv_close ( $con );
?>