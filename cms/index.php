<?php
	include ( 'init.php' );
	include ( 'functions/login.php' );

	if ( $login == 1 ) // Αν έχουμε κάνει login, το σύστημα μας εισάγει κατευθείαν στην κεντρική οθόνη
	{
		header ( "location:main.php" );
	} // end if

	if ( isset ( $_POST ['submit'] ) ) // Αν ο χρήστης έχει συμπληρώσει στοιχεία της φόρμας
	{
		isset ( $_POST ['username'] ) ? $username = $_POST ['username']: $username = ''; // Ελέγχουμε αν πράγματι έχει στείλει στοιχεία
		isset ( $_POST ['password'] ) ? $password = $_POST ['password']: $password = '';
	
		$check_login = check_login ( $username, $password ); // Ελέγχουμε αν είναι σωστά τα στοιχεία
	
		if ( $check_login == 0 )
		{
			$message = "Τα στοιχεία που εισάγατε είναι λάθος."; // Μήνυμα εμφάνισης λάθους
		} // end if
		else
		{
			session_start();
			$_SESSION ['login'] = 1; // Δίνουμε την τιμή 1 στη μεταβλητή για να γνωρίζει κάθε σελίδα 
				$adminUname = $username;
				$_SESSION['adminName'] = $adminUname;//ότι ο χρήστης έχει κάνει login
			header ( "location:main.php" );
		} // end else
	} // end if
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>My site</title>
</head>

<body>
	<p>Παρακαλώ εισάγετε όνομα χρήστη και κωδικό</p>
    <form method="post" action="">
    <table cellpadding="3" cellspacing="0" width="300" border="0">
    	<tr>
        	<td>Όνομα χρήστη: </td>
            <td><input type="text" name="username" value="" /></td>
        </tr>
        <tr>
        	<td>Κωδικός:</td>
            <td><input type="password" name="password" value="" /></td>
        </tr>
        <tr>
        	<td colspan="2"><input type="submit" value="Αποστολή" /></td>
        </tr>
    </table>
    <input type="hidden" name="submit" value="1" />
    </form>
    <?php
		if ( isset ( $message ) )
		{
			echo $message;
		} 
	?>
</body>
</html>
<?php
	sqlsrv_close ( $con ); // Κλείνουμε τη σύνδεση με τη βάση. Καλό είναι να υπάρχει στο τέλος κάθε σελίδας.
?>