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
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="../css/stylish.css" type="text/css" />
<link rel="stylesheet" href="../css/customCss.css" type="text/css" />
<title>My site</title>
</head>

<body>
<h2>CMS - Login Form</h2>
<form action="" method="post">
<div class="imgcontainer">
  <img src="../images/UNIPI-logo.jpg" alt="Logo" class="avatar">
</div>

<div class="container">
  <label><b>Username</b></label>
  <input type="text" placeholder="Enter Username" name="username" required>

  <label><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="password" required>

  <button type="submit" value="Αποστολή">Login</button>
	  <input type="hidden" name="submit" value="1" />
</div>
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
sqlsrv_close ( $con ); 
?>
