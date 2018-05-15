<?php
  include ( "init.php" );
  //include ( "check_login.php" );
  include ( "functions/menu.php" );
//TODO
  //$menu_records = get_labs (); // Τραβάμε τις εγγραφές από τον πίνακα menu της βάσης δεδομένων
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
    include ("sidebar.php");
    $applications = get_all_events (); // Τραβάμε τις εγγραφές από τον πίνακα menu της βάσης δεδομένων
    $labs = get_labs();



  ?>
  <div class="container">
        <div id="main">
      <?php
      if ( !empty ( $applications ) ) // Αν υπάρχουν εγγραφές
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
        echo "<td>Ενέργεια</td>";
        echo "</tr>";

        // Και εμφάνισε τις εγγραφές
        foreach ( $applications as $event )
        {
          $i++;
          echo "<tr>";
          echo "<td>".$i."</td>";
          foreach ( $labs as $tempLab){
            if($tempLab ['id'] == $event ['labId']){
              echo "<td>".$tempLab ['name']."</td>";
            }
          }
          
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
          echo "<td>";
          echo "<a href='edit_application.php?id=".$event ['id']."'>Επεξεργασία</a>";
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
</body>
</html>
<?php

  sqlsrv_close ( $con );
?>