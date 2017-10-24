 <?php
	include ( "init.php" );
	include ( "functions/menu.php" );

	isset ( $_GET ['id'] ) ? $id = $_GET ['id']: $id = 0; // Ελέγχουμε αν επεξεργαζόμαστε εγγραφή με συγκεκριμένο id ή αν προσθέτουμε καινούρια
	$item = get_event ( $id );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>My site - Σύστημα Διαχείρισης</title>
<link href="css/main.css" rel="stylesheet" type="text/css"  />
<link href="../css/customCss.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
    <?php
            include ( "sidebar.php" );
        ?>
	<div class="container" class="col-sm-12">
        <div id="main">
        	<form method="post" action="update_application.php">
            	<table cellpadding="3" cellspacing="0" border="0">
                	<tr>
                    	<td>Title:</td>
                        <td><input type="text" value="<?php echo $item ['Title']; ?>" name="Title" size="50" readonly/></td>
                    </tr>
                    <tr>
                    	<td>Event Date:</td>
                        <td>
                        <input type="text" 
                         size="2" 
                         maxlength="2" 
                         value="<?php echo $item ['event_date']; ?>" name="event_date" readonly />
                         </td>
                    </tr>
                    <tr>
                    	<td >Περιεχόμενο:</td>
                        <td>
                        <input type="textarea"
                        rows="15"
                        cols="70" 
                        value="<?php echo $item ['description']; ?>" name="description" readonly />
                        </td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                <input type="hidden" name="id" value="<?php echo $item ['id']; ?>" />
                <input value="Approve" type="submit" class="btn-success" name='Approve'/>
                <input value="Reject" type="submit"  class="btn-danger" name='Reject'/>
            </form>
        	<p><a href='applications.php'>Πίσω στο μενού</a></p>
        </div>

	</div>

</body>
</html>
<?php
	sqlsrv_close ( $con );
?>