 <?php
	include ( "init.php" );
	include ( "functions/menu.php" );

	isset ( $_GET ['id'] ) ? $id = $_GET ['id']: $id = 0; // Ελέγχουμε αν επεξεργαζόμαστε εγγραφή με συγκεκριμένο id ή αν προσθέτουμε καινούρια
	$menu = get_lab ( $id );
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
        	<form method="post" action="update_labs_menu.php">
            	<table cellpadding="3" cellspacing="0" border="0">
                	<tr>
                    	<td>Όνομα:</td>
                        <td><input type="text" value="<?php echo $menu ['name']; ?>" name="name" size="50" /></td>
                    </tr>
                    <tr>
                    	<td>Σειρά εμφάνισης:</td>
                        <td>
                        <input type="text" 
                         size="2" 
                         maxlength="2" 
                         value="<?php echo $menu ['position']; ?>" name="position" />
                         </td>
                    </tr>
                    <tr>
                    	<td>Τίτλος:</td>
                        <td>
                        <input type="textarea" 
                        rows="3" 
                        cols="50" 
                        value="<?php echo $menu ['title']; ?>" name="title"/>
                        </td>
                    </tr>
                    <tr>
                    	<td >Περιεχόμενο:</td>
                        <td>
                        <input type="textarea"
                        rows="15"
                        cols="70" 
                        value="<?php echo $menu ['comment']; ?>" name="comment" />
                        </td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                <input type="submit" class="btn-warning" value="Αποθήκευση" />
                <input type="hidden" name="id" value="<?php echo $menu ['id']; ?>" />
                <input type="hidden" name="action" value="<?php $id == 0 ? print "add": print "update"; ?>" />
            </form>
        	<p><a href='AddLabs.php'>Πίσω στο μενού</a></p>
        </div>

	</div>
 <div class="container" class="col-sm-12">
   <form method="post" action="upload.php" enctype='multipart/form-data'>
        <input type='file' name='file' />
        <input type='submit' value='Upload File' name='but_upload'>
        <input type="hidden" name="id" value="<?php echo $menu ['id']; ?>" />
    </form>
     <div class="container" class="col-sm-12"> Uploaded Files:
   <?php
        $sql = "SELECT id, name, image FROM labFiles WHERE labId = ".$menu ['id'];
        $result = sqlsrv_query ( $con, $sql );

        if ( sqlsrv_has_rows ( $result ) > 0 )
        {
            $row = sqlsrv_fetch_array ( $result );
        } // end if
        else
        {
            $row = 0;
            echo "Database is empty";
        } // end else
?>

<div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = sqlsrv_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><a href="C:/xampp/htdocs/website/uploads/<?php echo $row['name']; ?>" target="_blank">View</a></td>
                    <td><a href="download.php?id=<?php echo $row ['name'];?>">Download</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
</div>

 </div> 

 </div>

</body>
</html>
<?php
	sqlsrv_close ( $con );
?>