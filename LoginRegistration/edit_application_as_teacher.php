 <?php
	include ( "../cms/init.php" );
	include ( "../cms/functions/menu.php" );
	isset ( $_GET ['id'] ) ? $id = $_GET ['id']: $id = 0; 
    $eventInfo = array ();
    $eventInfo = get_event_info_singleEvent ($_GET['eventId'],$_GET['labId']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>My site - Σύστημα Διαχείρισης</title>
<link href="css/main.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
	<div class="container" class="col-sm-12">
        <div id="main">
        	<form method="post" action="update_application_by_teacher.php">
            	<table cellpadding="3" cellspacing="0" border="0">
                	<tr>
                    	<td>Lab ID:</td>
                        <td><input type="text" value="<?php echo $eventInfo[0]['name']; ?>" name="Title" size="50" readonly/></td>
                    </tr>
                    <tr>
                    	<td>Email:</td>
                        <td>
                        <input type="text" 
                         size="2" 
                         maxlength="2" 
                         value="<?php echo $eventInfo[0] ['email']; ?>" name="event_date" readonly />
                         </td>
                    </tr>
                    <tr>
                    	<td >UNIC:</td>
                        <td>
                        <input type="textarea"
                        rows="15"
                        cols="70" 
                        value="<?php echo $eventInfo[0] ['unic']; ?>" name="description" readonly />
                        </td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                <input type="hidden" name="id" value="<?php echo $eventInfo[0] ['unic']; ?>" />
                <input value="Approve" type="submit" class="btn-success" name='Approve'/>
                <input value="Reject" type="submit"  class="btn-danger" name='Reject'/>
            </form>
        	<p><a href=''>Πίσω στο μενού</a></p>
        </div>
	</div>
</body>
</html>
<?php
	sqlsrv_close ( $con );
?>