<?php
	ob_start();
	//session_start();
	require_once 'dbconnect.php';
	global $emailError, $passError, $email,$con;

	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			//$password = hash('sha256', $pass); // password hashing using SHA256
		$password = $pass;
			$sql= "SELECT userName, userPass FROM users WHERE userEmail='$email'";
			$stmt = sqlsrv_query($con,$sql);

			if($stmt == false){
				echo 'error';
				die(print_r(sqlsrv_errors(),TRUE));
			}

			if ( sqlsrv_has_rows ( $stmt ) > 0 )
			{
				//$row = sqlsrv_fetch_array ( $stmt );

				$row = array ();
				while ( $temp = sqlsrv_fetch_array ( $stmt ) )
				{
					$row  = $temp;
				}
			} 
			else
			{
				$row = 0;
			} 

			$count = sqlsrv_has_rows($stmt);
			// if ($count > 0) // Ελέγχουμε τον αριθμό των εγγραφών που θα επιστρέψει το query
	 	// 	{
			// 	//echo 'ok!';// Επιστρέφει 1 αν βρεθεί εγγραφή
			// 	$row=sqlsrv_fetch_array($stmt);
	 	// 	} // end if
	 	// 	else
	 	// 	{
	 	// 		//echo 'not ok!'; // Επιστρέφει 0 αν δε βρεθεί εγγραφή
			// } 
			
			if( $count > 0 && $row['userPass']==$password ) {
				//after login redirect me to userPage
				$passUserId = $row['userName'];
				$_SESSION['user'] = $passUserId;
				//pass username
				session_start();
				$message1 = $row ['userName'];
				$_SESSION['firstMessage'] = $message1;
				header("Location: ../index.php");
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}
				
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UNIPI - Login & Registration System</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Sign In.</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="register.php">Sign Up Here...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>