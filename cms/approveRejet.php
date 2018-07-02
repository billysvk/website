<?php
	include ( "init.php" );
	include ( "functions/menu.php" );

	isset ( $_GET ['id'] ) ? $id = $_GET ['id']: $id = 0; // Ελέγχουμε αν επεξεργαζόμαστε εγγραφή με συγκεκριμένο id ή αν προσθέτουμε καινούρια
	
	$registerRequests = get_request($id);
?>
 <?php
function writeMsg() {
    echo "Hello world!";
}

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
        ?>
	<div class="container">
        <div id="main">
        	<form method="post" action="update_request.php">
            	<table cellpadding="3" cellspacing="0" border="0">
                	<tr>
                    	<td>Όνομα:</td>
                        <td><input type="text" 
                        	value="<?php echo $registerRequests ['userName']; ?>" name="userName" size="50" /></td>
                    </tr>
                    <tr>
                    	<td>Email:</td>
                        <td><input type="text" size="50" maxlength="2" 
                        	value="<?php echo $registerRequests ['userEmail']; ?>" name="userEmail" /></td>
                    </tr>
                    
                </table>
                <p>&nbsp;</p>
            <input type="hidden" name="id" value="<?php echo $registerRequests ['id']; ?>" />
          	<input value="Approve" type="submit" class="btn-success" name='Approve'/>
			<input value="Reject" type="submit"  class="btn-danger" name='Reject'/>
		    </form>
        	<p><a href='menu.php'>Πίσω στο μενού</a></p>
        </div>
	</div>
</body>
</html>
<?php
	sqlsrv_close ( $con );
?>