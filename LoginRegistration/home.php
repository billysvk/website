<?php
	ob_start();
	//session_start();
  include ( "../functions/menu.php" );
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
    //echo $uid;
  }
  $UserEvents = array ();
  $userEvents = get_my_events ($uid);
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
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">My Profile</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../">Back to Main Page</a></li>
          </ul>
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
      </div>
    </nav> 

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

 <section id="aitisis" class="" style="float: center; padding-top:100px;">
  
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><font color="gray";>Οι αιτήσεις μου για μαθήματα</h2>
                     <div id="wrapper">
    <div class="nav nav-tabs col-md-12" style="float: center; padding-top:10px;">
      <div class="innertube">
     <?php
      if ( !empty ( $userEvents ) ) // Αν υπάρχουν εγγραφές
      {
        $i = 0;

        // Φτιάξε έναν html πίνακα
        echo "<table cellpadding='3' cellspacing='0' border='1' width='100%'>";
        echo "<tr>";
        echo "<td>Α/Α</td>";
        echo "<td>Lab Id</td>";
        echo "<td>Event Date</td>";

        echo "<td>Time of the event</td>";
        echo "<td>Title</td>";
        echo "<td>Description</td>";
        echo "<td>Status</td>";
        echo "</tr>";

        // Και εμφάνισε τις εγγραφές
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
     </div>
  </div>
</div>
 </section>
    
</body>
</html>
<?php ob_end_flush(); ?>