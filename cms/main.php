<?php
	include ( "init.php" );
	include ( "check_login.php" );
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
        	Παρακαλώ επιλέξτε μία επιλογή από το μενού αριστερά.
        </div>
	</div>
</body>
</html>
<?php
	sqlsrv_close ( $con );
?>