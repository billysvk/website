<?php
include ("../cms/functions/menu.php");
isset ( $_GET ['id'] ) ? $id = $_GET ['id']: $id = 0; // Ελέγχουμε αν επεξεργαζόμαστε εγγραφή με συγκεκριμένο id ή αν προσθέτουμε καινούρια
$item = get_event ( $id );
$info = get_lab_infos($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>My site - Σύστημα Διαχείρισης</title>
    <link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css"  />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
<div class="container" class="col-sm-12">
    <div id="main">
        <form>
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
        </form>
        </br>
    </div>

</div>

<!--plhrofories gia tous foithtes-->
<div class="container" class="col-sm-6">
    <div id="main">
        <form method="post" action="update_lab_related.php">
            <table cellpadding="3" cellspacing="0" border="0">
                <tr>
                    <td>Τίτλος:</td>
                    <td><input type="text" value="<?php echo $info ['title']; ?>" name="title" size="50"/></td>
                </tr>
                <tr>
                    <td >Νέα και ενημερώσεις:</td>
                    <td>
                        <textarea type="text"
                               rows="15"
                               cols="70"
                               value="<?php echo $info ['comment']; ?>" name="comment">
                        </textarea>
                    </td>
                </tr>
            </table>
            <p>&nbsp;</p>
            <input type="submit" class="btn-warning" value="Αποθήκευση" />
            <input type="hidden" name="id" value="<?php echo $item ['id']; ?>" />
            <input type="hidden" name="labId" value="<?php echo $item ['labId']; ?>" />
            <input type="hidden" name="action" value="<?php $id !== 0 ? print "add": print ""; ?>" />
        </form>
        </br>
    </div>
</div>
<!--prohgoumenes enhmerwseis-->

<!--file upload gia shmeiwseis -->
<!-- enhmerwseis sxetikes me to mathima (tha emfanizontai sth selida toy lab)-->
    <p><a href='home.php'>Πίσω στο μενού</a></p>
</body>
</html>
<?php
sqlsrv_close ( $con );
?>