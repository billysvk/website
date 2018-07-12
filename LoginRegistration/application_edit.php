<?php
ob_start();
require_once 'dbconnect.php';
global $con;
include ("../cms/functions/menu.php");
include ( "../functions/menu.php" );
isset ( $_GET ['id'] ) ? $id = $_GET ['id']: $id = 0; // Ελέγχουμε αν επεξεργαζόμαστε εγγραφή με συγκεκριμένο id ή αν προσθέτουμε καινούρια
$item = get_event ( $id );
$info = 0;

$uName = $_SESSION['lastMessage'];
if( isset($_SESSION['UserId']) ) {
$uid = $_SESSION['UserId'];
$urole = $_SESSION['urole'];
//echo $uid;
}

$eventInfo = array ();
$eventInfo = get_event_info ($item['id'],$item['labId']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
    <title>My site - Σύστημα Διαχείρισης</title>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css"  />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
<div class="grid-container" class="col-md-12">
    <div id="main" >
        <form>
            <table cellpadding="6" cellspacing="0" border="0">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" 
                      value="<?php echo $item ['Title']; ?>" 
                      name="Title" 
                      size="50" readonly/></td>
                </tr>
                <tr>
                    <td>Event Date:</td>
                    <td>
                        <input type="text"
                               maxlength="2"
                               value="<?php echo $item ['event_date']; ?>" name="event_date" readonly />
                    </td>
                </tr>
                <tr>
                    <td >Περιεχόμενο:</td>
                    <td>
                        <input type="textarea"
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
<div class="grid-container" class="col-sm-6">
    <div id="main">
        <form method="post" action="update_lab_related.php">
            <table cellpadding="2" cellspacing="0" border="0">
                <tr>
                    <td>Τίτλος:</td>
                    <td><input class="col-sm-12" type="text" value="<?php echo $info ['title']; ?>" name="title" size="50"/></td>
                </tr>
                <tr>
                    <td >Νέα και ενημερώσεις:</td>
                    <td>
                        <textarea class="col-md-8" type="text"
                               rows="10"
                               cols="70"
                               maxlength = "1024"
                               value="<?php echo $info ['comment']; ?>" name="comment">
                        </textarea>
                    </td>
                </tr>
            </table>
            <p>&nbsp;</p>
            <input type="submit" class="btn btn-warning" value="Αποθήκευση" />
            <input type="hidden" name="id" value="<?php echo $item ['id']; ?>" />
            <input type="hidden" name="labId" value="<?php echo $item ['labId']; ?>" />
            <input type="hidden" name="uid" value="<?php echo $uid ?>" />
            <input type="hidden" name="action" value="<?php $id !== 0 ? print "add": print ""; ?>" />
        </form>
        </br>
    </div>
    <p><a class="fa fa-home" style="font-size:20px;color:black;" href='home.php'>Πίσω στο μενού</a></p>
</div>

</br>
  <div class="limiter">
    <div class="container-table100">
      <div class="wrap-table100">
        <div class="table100">
  <h2 class="col-lg-12 text-center"><font color="black";>Ανακοινώσεις Μαθημάτων</h2> 
</br>
<!-- ανακοινωσεις -->
<?php
$tempLabId = (int) $item ['labId'];
$sql = "SELECT * FROM lab_info WHERE labId = $tempLabId AND UserId = $uid AND event_id = $id";
$result = sqlsrv_query ( $con,$sql);
$rows = array ();
while ( $row = sqlsrv_fetch_array ( $result ) )
{
  $rows [] = $row;
}

if (empty ($rows)) {
echo "Δεν έχουν προστεθεί ανακοινώσεις!";
}
else
{
foreach ($rows as $key) {
echo "<table>";
echo "<thead>";
echo "<tr class='table100-head'>";
echo "<th class='column1'>Title</th>";
echo "<th class='column1'>Comment</th>";
echo "<th class='column1'>Remove</th>";
echo "</thead>";
echo "<tbody>";
echo "<tr>";
echo '<td>' . htmlspecialchars($key['title']) . '</td>';
echo '<td>' . htmlspecialchars($key['comment']) . '</td>';
echo "<td>";
echo "<a href='removeNewsEntry.php?id=".$key['id']."'>Remove</a>";
echo "</td>";      
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo ' </br>';
}
}
?>
 

</div>
</div>
</div>
</div></div></div></div>
</br>
<!--file upload gia shmeiwseis -->
<div class="limiter">
    <div class="container-table100">
      <div class="wrap-table100">
        <div class="table100">
          <h2 class="col-lg-12 text-center"><font color="black";>File Upload</h2> 
    <form method="post" action="upload.php" enctype='multipart/form-data'>
        <input type='file' name='file' />
        <input type='submit' value='Upload File' name='but_upload' class="btn btn-primary"/>
        <input type="hidden" name="labId" value="<?php echo $item ['labId']; ?>" />
        <input type="hidden" name="courseId" value="<?php echo $item ['id']; ?>" />
    </form>
   
        <?php
        $sql = "SELECT id, name, image FROM courseFiles WHERE courseId = ".$item ['id'];
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
          <table class="table100-head">
              <thead>
              <tr>
                  <th class="column1">#</th>
                  <th class="column2">File Name</th>
                  <!--<th class="column3">View</th>-->
                  <th class="column4">Download</th>
              </tr>
              </thead>
              <tbody>
              <?php
              $i = 1;
              while($row = sqlsrv_fetch_array($result)) { ?>
                  <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <!--<td><a href="C:/xampp/htdocs/website/uploads/<?php echo $row['name']; ?>" target="_blank">View</a></td>-->
                      <td><a href="download.php?id=<?php echo $row ['name'];?>">Download</a></td>
                  </tr>
              <?php } ?>
              </tbody>
          </table>         
    </div>
  </div>
 </div>
</div>

<!-- lista aithsewn eggrafhs sto mathima -->
</br>
  <div class="limiter">
    <div class="container-table100">
      <div class="wrap-table100">
        <div class="table100">
  <h2 class="col-lg-12 text-center"><font color="black";>Αιτήσεις εγγραφής στα μαθήματα</h2> 
</br>
<?php if ( !empty ( $eventInfo ) ) // Αν υπάρχουν εγγραφές
  {
    $i = 0;
    echo "<table cellpadding='3' cellspacing='0' border='1' width='100%'>";
    echo "<tr>";
    echo "<td>Α/Α</td>";
    echo "<td>First Name</td>";
    echo "<td>User Email</td>";
    echo "<td>User UNIC No.</td>";
    echo "<td>Status</td>";
     echo "<td>Επεξεργασία</td>";
    echo "</tr>";
    foreach ( $eventInfo as $info )
    {
      $i++;
      echo "<tr>";
      echo "<td>".$i."</td>";
      echo "<td>".$info ['name']."</td>";
      echo "<td>".$info ['email']."</td>";
      echo "<td>".$info ['unic']."</td>";

       $EvStatus = "";
      if($info ['status'] == 0) {
        $EvStatus = "Pending..";
      }
      if ($info ['status'] == 1){
        $EvStatus = "Approved";
      }
      if ($info ['status'] == 2){
        $EvStatus = "Rejected";
      }
      echo "<td>".$EvStatus."</td>"; // status
      //echo "<td>".$event ['status']."</td>";
      //status
      echo "<td>";
      echo "<a href='edit_application_as_teacher.php?eventId=".$item ['id']."&labId=".$item ['labId']."'>Επεξεργασία</a>";
      echo "</td>";
      echo "</tr>";
    } // end foreach
    echo "</table>";
  } // end if
  else
  {
    echo "Δε βρέθηκαν αιτήσεις.";
  } // end else
?>

</div></div></div></div>
 
<!-- enhmerwseis sxetikes me to mathima (tha emfanizontai sth selida toy lab)-->
   
</body>
</html>
<?php
sqlsrv_close ( $con );
?>