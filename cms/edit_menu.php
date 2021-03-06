<?php
	include ( "init.php" );
	include ( "check_login.php" );
	include ( "functions/menu.php" );

	isset ( $_GET ['id'] ) ? $id = $_GET ['id']: $id = 0; // Ελέγχουμε αν επεξεργαζόμαστε εγγραφή με συγκεκριμένο id ή αν προσθέτουμε καινούρια
	$menu = get_item ( $id );
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
        	<form method="post" action="update_menu.php">
            	<table cellpadding="3" cellspacing="0" border="0">
                	<tr>
                    	<td>Όνομα:</td>
                        <td><input type="text" value="<?php echo $menu ['name']; ?>" name="name" size="50" /></td>
                    </tr>
                    <tr>
                    	<td>Σειρά εμφάνισης:</td>
                        <td><input type="text" size="2" maxlength="2" value="<?php echo $menu ['position']; ?>" name="position" /></td>
                    </tr>
                    <tr>
                    	<td valign="top">Τίτλος:</td>
                        <td><textarea name="title" rows="3" cols="50"><?php echo $menu ['title']; ?></textarea></td>
                    </tr>
                    <tr>
                    	<td valign="top">Περιεχόμενο:</td>
                        <td><textarea name="content" rows="15" cols="70"><?php echo $menu ['content']; ?></textarea></td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                <input type="submit" class="btn-warning" value="Αποθήκευση" />
                <input type="hidden" name="id" value="<?php echo $menu ['id']; ?>" />
                <input type="hidden" name="action" value="<?php $id == 0 ? print "add": print "update"; ?>" />
            </form>
        	<p><a href='menu.php'>Πίσω στο μενού</a></p>
        </div>
	</div>
</body>
</html>
<?php
	sqlsrv_close ( $con );
?>