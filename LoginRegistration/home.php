<?php
ob_start();
//session_start();
include ( "../functions/menu.php" );
include ( "../cms/functions/menu.php" );
require_once 'dbconnect.php';
global $con;
// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
header("Location: index.php");
exit;
}
$uName = $_SESSION['lastMessage'];
if( isset($_SESSION['UserId']) ) {
$uid = $_SESSION['UserId'];
$urole = $_SESSION['urole'];
$message3 = $uid;
$_SESSION['UserId'] = $message3;
//echo $uid;
}



$UserEvents = array ();
$userEvents = get_my_events ($uid);

$UserClassSubscriptions = array ();
$UserClassSubscriptions = get_my_class_register_applications($uid);
$tempEventTable = array ();
$lab = array ();
$requests = array ();
 
foreach ( $UserClassSubscriptions as $event )
{
 $tempEventTable = get_event($event['event_id']);
 $tempLabTable = get_lab_infos($event['labId']);
 $tempLab = get_lab($event['labId']);

$temp = array (
  'LabName' => $tempLab['name'],
  'eventTitle' => $tempEventTable['Title'],
  'lessonDate' => $tempEventTable['event_date'],
  'status' => $event['status']
); 
  $requests [] = $temp;
}

$approved_events = array ();
$approved_events = get_all_approved_events();
//echo $uName;
// select loggedin users detail
//$sql=("SELECT * FROM users WHERE userName=".$_SESSION['user']);
//$stmt = sqlsrv_query($con,$sql);

// $userRow = sqlsrv_fetch_array ( $stmt );
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />

<script src="assets/jquery-1.11.3-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Ο λογαριασμός μου</a>
    </div>
      <ul class="nav navbar-nav">  
        <li class="active"><a href="../">Back to Main Page</a></li>
       </ul>
</div>
</nav>
      
<div class="container">
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
   <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $uName; ?>&nbsp;<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
  </ul>
</li>
</ul>
</div>


<div id="EventsForProfessor" class="container">
<div class="col-lg-12 text-center">
  <h2><font color="gray";>Οι αιτήσεις μου για μαθήματα</h2>
   <div class="wrapper">
<?php
if ( !empty ( $userEvents ) ) // Αν υπάρχουν εγγραφές
{
$i = 0;
    echo "<table cellpadding='3' cellspacing='0' border='1' width='100%'>";
    echo "<tr>";
    echo "<td>Α/Α</td>";
    echo "<td>Lab Id</td>";
    echo "<td>Event Date</td>";

    echo "<td>Time of the event</td>";
    echo "<td>Title</td>";
    echo "<td>Description</td>";
    echo "<td>Status</td>";
    echo "<td>Επιλογή</td>";
    echo "</tr>";
    foreach ( $userEvents as $event )
    {
      $i++;
      echo "<tr>";
      echo "<td>".$i."</td>";
      echo "<td>".$event ['labId']."</td>";
      echo "<td>".$event ['event_date']."</td>";
      //time
      $Temptimeoftheevent = "";
      if($event ['h_1'] == 1){
        $tempTime = "8-10 ";
        $Temptimeoftheevent = "" . $Temptimeoftheevent . $tempTime . "|";
      }
      if($event ['h_2'] == 1){
        $tempTime = "10-12 ";
        $Temptimeoftheevent = "" . $Temptimeoftheevent . $tempTime . "|";
      }
      if($event ['h_3'] == 1){
        $tempTime = "12-14 ";
        $Temptimeoftheevent = "" . $Temptimeoftheevent . $tempTime . "|";
      }
      if($event ['h_4'] == 1){
        $tempTime = "14-16 ";
        $Temptimeoftheevent = "" . $Temptimeoftheevent . $tempTime . "|";
      }
      if($event ['h_5'] == 1){
        $tempTime = "16-18 ";
        $Temptimeoftheevent = "" . $Temptimeoftheevent . $tempTime . "|";
      }
      if($event ['h_6'] == 1){
        $tempTime = "18-20 ";
        $Temptimeoftheevent = "" . $Temptimeoftheevent . $tempTime . "|";
      }     
      if ($Temptimeoftheevent !== null){
        $EventTime = substr($Temptimeoftheevent, 0, -1);
      }     
      echo "<td>".$EventTime."</td>";
      echo "<td>".$event ['Title']."</td>";
      echo "<td>".$event ['description']."</td>";
      $EventStatus = "";
      if($event ['status'] == 0) {
        $EventStatus = "Pending..";
      }
      if ($event ['status'] == 1){
        $EventStatus = "Approved";
      }
      if ($event ['status'] == 2){
        $EventStatus = "Rejected";
      }
      echo "<td>".$EventStatus."</td>"; // status
      if( $event ['status'] == 1){
          echo "<td><a href='application_edit.php?id=".$event ['id']."'>Επεξεργασία</a></td>";
      }
    
      echo "</td>";
      echo "</tr>";
    } // end foreach
    
    echo "</table>";
  } // end if
  else
  {
    echo "Δε βρέθηκαν εγγραφές.";
  } // end else
?>
  </div>
 </div>
</div>

<!-- table for teachers -->


<!-- table for student -->
<div id="ArrayForStudent" class="container">
  <h2 class="col-lg-12 text-center"><font color="gray";>Οι αιτήσεις εγγραφής μου για μαθήματα</h2> 
<?php if ( !empty ( $requests ) ) // Αν υπάρχουν εγγραφές
  {
    $i = 0;
    echo "<table cellpadding='3' cellspacing='0' border='1' width='100%'>";
    echo "<tr>";
    echo "<td>Α/Α</td>";
    echo "<td>Lab Name</td>";
    echo "<td>Lesson Title</td>";
    echo "<td>Lesson Date</td>";
    echo "<td>Status</td>";
    echo "</tr>";
    foreach ( $requests as $event )
    {
      $i++;
      echo "<tr>";
      echo "<td>".$i."</td>";
      echo "<td>".$event ['LabName']."</td>";
      echo "<td>".$event ['eventTitle']."</td>";
      echo "<td>".$event ['lessonDate']."</td>";
       $EventStatus = "";
      if($event ['status'] == 0) {
        $EventStatus = "Pending..";
      }
      if ($event ['status'] == 1){
        $EventStatus = "Approved";
      }
      if ($event ['status'] == 2){
        $EventStatus = "Rejected";
      }
      echo "<td>".$EventStatus."</td>"; // status
      //echo "<td>".$event ['status']."</td>";
      //status
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
</div>

</body>
</html>

<?php
if ($urole == "2") {
echo "<script>
$('#ArrayForStudent').css('visibility', 'hidden');
</script>";
echo "<script>
$('#EventsForProfessor').css('visibility', 'visible');
</script>";
}else{
  echo "<script>
$('#ArrayForStudent').css('visibility', 'visible');
</script>";
echo "<script>
$('#EventsForProfessor').css('visibility', 'hidden');
</script>";
}
?>

<?php ob_end_flush(); ?>