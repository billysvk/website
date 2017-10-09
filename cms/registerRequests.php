 <?php
	include ( "init.php" );
	include ( "functions/menu.php" );
//TODO
	//$menu_records = get_labs (); // Τραβάμε τις εγγραφές από τον πίνακα menu της βάσης δεδομένων
	
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
			include ( "sidebar.php" );
			$registerRequests = get_register_requests();
		?>
	<div class="container">
        <div id="main">
        <?php
			if ( !empty ( $registerRequests ) ) // Αν υπάρχουν εγγραφές
			{
			$i = 0;

				// Φτιάξε έναν html πίνακα
				echo "<table cellpadding='3' cellspacing='0' border='1' width='100%'>";
				echo "<tr>";
				echo "<td>Α/Α</td>";
				echo "<td>Όνομα</td>";
				echo "<td>Email</td>";
				echo "<td>Ρόλος</td>";
				echo "<td>Ενέργεια</td>";
				echo "</tr>";

				// Και εμφάνισε τις εγγραφές
				foreach ( $registerRequests as $requests )
				{
					$i++;
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".stripslashes ( $requests ['userName'] )."</td>";
					echo "<td>".$requests ['userEmail']."</td>";
					echo "<td>";
						$role = "";
					if ($requests ['userRole'] === "1"){
            			$role = "Φοιτητής";
          			}    
          			if ($requests ['userRole'] === "2"){
            			$role = "Καθηγητής";
          			}  
          			echo "$role";
          		    echo "<td>";
					//molis anoigw thn selida h foreach dinei tis parakatw 2 times...
					//echo '<a href="'.update_register_request($requests['id'], "1").'">Approve </a>'; 
					//echo '<a href="'.update_register_request($requests['id'], "2").'">Reject </a>'; 
					echo "<a href='approveRejet.php?id=".$requests['id']."'>Επεξεργασία</a>";
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
        </div>
	</div>
</body>
</html>
<?php

	sqlsrv_close ( $con );
?>