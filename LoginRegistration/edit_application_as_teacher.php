 <?php
	include ( "../cms/init.php" );
	include ( "../cms/functions/menu.php" );
	isset ( $_GET ['id'] ) ? $id = $_GET ['id']: $id = 0; 
    $eventInfo = array ();
    $eventInfo = get_event_info_singleEvent ($_GET['eventId'],$_GET['labId']);
    $getLabInfo = get_lab ($_GET['labId']);
    $getLessonInfo = get_event($_GET['eventId']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>My site - Σύστημα Διαχείρισης</title>
<link href="css/main.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
.divider {
    width:25px;
    height:auto;
    display:inline-block;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>

<body>
	<div class="container" class="col-sm-12">
        <div id="main">
        	<form method="post" action="update_application_as_teacher.php">
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
                     <tr>
                        <td>Αίτημα παρακολόύθησης για το μάθημα:</td>
                      <td>
                        <input type="text" 
                         size="2" 
                         maxlength="2" 
                         value="<?php echo $getLessonInfo['Title']; ?>" name="event_date" readonly />
                         </td>
                    </tr>
                     <tr>
                        <td>Την ημέρα:</td>
                      <td>
                        <input type="text" 
                         size="2" 
                         maxlength="2" 
                         value="<?php echo $getLessonInfo['event_date']; ?>" name="event_date" readonly />
                         </td>
                    </tr>
                     <tr>
                        <td>Στο εργαστήριο:</td>
                        <td>
                        <input type="textarea"
                        rows="15"
                        cols="70" 
                        value="<?php echo $getLabInfo['title']; ?>" name="description" readonly />
                        </td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                <input type="hidden" name="eventId" value="<?php echo $_GET['eventId']; ?>" />
                <input type="hidden" name="labId" value="<?php echo $_GET['labId']; ?>" />
                <input value="Reject" type="submit"  class="btn-danger" name='Reject'/>
                <input value="Approve" type="submit" class="btn-success" name='Approve'/>
            </form>
        	<p><a href='../LoginRegistration/home.php'>Πίσω στο μενού</a></p>
        </div>
	</div>
</body>
</html>
<?php
	sqlsrv_close ( $con );
?>