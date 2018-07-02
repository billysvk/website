
<?php
	ob_start();
	//session_start();
	global $nameError, $nameError,$emailError, $passError, $roleError, $email, $name, $role;
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';
	global $con;
	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

	if(isset($_POST['role'])){
    //$stok is checked and value = 1
    $role = $_POST['role'];
	}
	else{
    //$stok is nog checked and value=0
    $role=0;
	}
		// na prostethei ena akoma pedio gia to role
		
		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		} else if(empty($role)){
			$error = true;
			$roleError = "Please select a role";
		}
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM registerRequests WHERE userEmail='$email'";
			$result = sqlsrv_query($con,$query);
			$count = sqlsrv_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
		
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		
		// if there's no error, continue to signup
		if( !$error ) {

		  $sql = "INSERT INTO registerRequests (userName,userEmail,userPass,userRole) 
		  VALUES ('$name','$email','$pass','$role')";
		  $res = sqlsrv_query( $con, $sql);

			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, pending admin approve";
				//header("Location: ../index.php");
				//unset($name);
				//unset($email);
				//unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login & Registration System</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Sign Up.</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            <div>
			<label>Select Role</label><br>
              <input  name="role" type="checkbox" value="1" onclick="toggleRadioCheckbox(this)" /> 
              <label for="mygroup1">Student</label>
   			  <input  name="role" type="checkbox" value="2" onclick="toggleRadioCheckbox(this)" /> 
   			  <label for="mygroup0">Professor</label>
			  </div>
			  <span class="text-danger"><?php echo $roleError; ?></span>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="index.php">Sign in Here...</a>
            </div>

             <div>
            	<a href="../index.php">Back to main page...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
<script type="text/javascript">
 function toggleRadioCheckbox(sender) {
        // RadioCheckbox: 0..1 enabled in a group 
        if (!sender.checked) return;
        var fields = document.getElementsByName(sender.name);
        for(var idx=0; idx<fields.length; idx++) {
            var field = fields[idx];
            if (field.checked && field!=sender)
                field.checked=false;
        }
    }
</script>
 
</html>
<?php ob_end_flush(); ?>