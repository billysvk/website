<?php
session_start();
if (isset($_SESSION['UserId'])) {
$uid = $_SESSION['UserId'];
//echo $uid;
}
if (isset($_SESSION['urole'])) {
$urole = $_SESSION['urole'];
//echo $uid;
}
global $dateChecked;
global $dateSelected;
$dateSelected = false;
if (isset($_POST["p_name"])) {
$dateChecked = $_POST["p_name"];
$dateSelected = true;
}
?>
<?php
include('../cms/functions/menu.php');
include('../functions/menu.php');

$resultsNULL = "null";
//global $resultsNULL;
global $addNewEventClicked;
$addNewEventClicked = false;
//$resultsNULL = "null";
global $dataForThisLab;

$dataForThisLab = array();
$boxesThatShouldBeClosed = array();

$var = $_GET['id']; // LabID
$labs = array();
$labs = get_labs();
$lab = null;
?>

<?php
$found = false;
foreach ($labs as $value) {
if ($found == true) {
break;
}
if ($value['id'] == $var) {
$found = true;
$lab = $value;
}
}
$boxesThatShouldBeClosed = get_all_data_for_this_lab($var, $dateChecked, $temp = "true");
if (isset($_SESSION['resultsNULLTrue'])) {
$resultsNULL = $_SESSION['resultsNULLTrue'];
} else {
$resultsNULL = "null";
}
if (isset($boxesThatShouldBeClosed[0])) {
$h_1 = $boxesThatShouldBeClosed[0];
} else {
$h_1 = 0;
}
if (isset($boxesThatShouldBeClosed[1])) {
$h_2 = $boxesThatShouldBeClosed[1];
// echo $uName;
} else {
$h_2 = 0;
}
if (isset($boxesThatShouldBeClosed[2])) {
$h_3 = $boxesThatShouldBeClosed[2];
// echo $uName;
} else {
$h_3 = 0;
}
if (isset($boxesThatShouldBeClosed[3])) {
$h_4 = $boxesThatShouldBeClosed[3];
// echo $uName;
} else {
$h_4 = 0;
}
if (isset($boxesThatShouldBeClosed[4])) {
$h_5 = $boxesThatShouldBeClosed[4];
// echo $uName;
} else {
$h_5 = 0;
}
if (isset($boxesThatShouldBeClosed[5])) {
$h_6 = $boxesThatShouldBeClosed[5];
// echo $uName;
} else {
$h_6 = 0;
}

?>

<script>
function showAllResponses() {
document.getElementById("SubmitRecord").style.visibility = "visible";
}
</script>
<script>
function toggleRadioCheckbox(sender) {
// RadioCheckbox: 0..1 enabled in a group
if (!sender.checked) return;
var fields = document.getElementsByName(sender.name);
for (var idx = 0; idx < fields.length; idx++) {
var field = fields[idx];
if (field.checked && field != sender)
field.checked = false;
}
}
</script>
<script>
function addNewEvent() {
//var resultsAreEmpty = <?php echo($resultsNULL); ?>;
var resultsAreEmpty = <?php echo json_encode($resultsNULL); ?>; //Don't forget the extra semicolon!
var h_1 = <?php echo json_encode($h_1); ?>;
var h_2 = <?php echo json_encode($h_2); ?>;
var h_3 = <?php echo json_encode($h_3); ?>;
var h_4 = <?php echo json_encode($h_4); ?>;
var h_5 = <?php echo json_encode($h_5); ?>;
var h_6 = <?php echo json_encode($h_6); ?>;
//var resultsAreEmpty = "<?php echo $resultsNULL ?>";
//var resultsAreEmpty = <?php echo $resultsNULL; ?>;
//  alert(resultsAreEmpty);
//  alert(h_1);
//  alert(h_2);
//  alert(h_3);
//  alert(h_4);
//  alert(h_5);
//  alert(h_6);
document.getElementById("newEventContainer").style.visibility = "visible";
if (resultsAreEmpty == "true") {
document.getElementById("checkbox1Tile").style.visibility = "visible";
document.getElementById("checkbox1Label").style.visibility = "visible";
document.getElementById("checkbox2Tile").style.visibility = "visible";
document.getElementById("checkbox2Label").style.visibility = "visible";
document.getElementById("checkbox3Tile").style.visibility = "visible";
document.getElementById("checkbox3Label").style.visibility = "visible";
document.getElementById("checkbox4Tile").style.visibility = "visible";
document.getElementById("checkbox4Label").style.visibility = "visible";
document.getElementById("checkbox5Tile").style.visibility = "visible";
document.getElementById("checkbox5Label").style.visibility = "visible";
document.getElementById("checkbox6Tile").style.visibility = "visible";
document.getElementById("checkbox6Label").style.visibility = "visible";
}
if (resultsAreEmpty == "false") {
if (h_1 == 0) {
document.getElementById("checkbox1Tile").style.visibility = "visible";
document.getElementById("checkbox1Label").style.visibility = "visible";
} else {
document.getElementById("checkbox1Tile").style.visibility = "hidden";
document.getElementById("checkbox1Label").style.visibility = "hidden";
}
if (h_2 == 0) {
document.getElementById("checkbox2Tile").style.visibility = "visible";
document.getElementById("checkbox2Label").style.visibility = "visible";
} else {
document.getElementById("checkbox2Tile").style.visibility = "hidden";
document.getElementById("checkbox2Label").style.visibility = "hidden";
}
if (h_3 == 0) {
document.getElementById("checkbox3Tile").style.visibility = "visible";
document.getElementById("checkbox3Label").style.visibility = "visible";
} else {
document.getElementById("checkbox3Tile").style.visibility = "hidden";
document.getElementById("checkbox3Label").style.visibility = "hidden";
}
if (h_4 == 0) {
document.getElementById("checkbox4Tile").style.visibility = "visible";
document.getElementById("checkbox4Label").style.visibility = "visible";
} else {
document.getElementById("checkbox4Tile").style.visibility = "hidden";
document.getElementById("checkbox4Label").style.visibility = "hidden";
}
if (h_5 == 0) {
document.getElementById("checkbox5Tile").style.visibility = "visible";
document.getElementById("checkbox5Label").style.visibility = "visible";
} else {
document.getElementById("checkbox5Tile").style.visibility = "hidden";
document.getElementById("checkbox5Label").style.visibility = "hidden";
}
if (h_6 == 0) {
document.getElementById("checkbox6Tile").style.visibility = "visible";
document.getElementById("checkbox6Label").style.visibility = "visible";
} else {
document.getElementById("checkbox6Tile").style.visibility = "hidden";
document.getElementById("checkbox6Label").style.visibility = "hidden";
}
}
}
</script>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>2 Column Layout &mdash; Left Menu with Header &amp; Footer</title>
<link href="calendar.css" type="text/css" rel="stylesheet">
<link href="w3.css" type="text/css" rel="stylesheet">
<link href="science.css" rel="stylesheet" type="text/css">
<link href="custom.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" type="text/css" href="main.css">-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</div>
<div class="form-group">
<a href="../index.php">Back to main page...</a>
</div>
</head>

<body>
<style>
.container-fixed {
margin-right: auto;
margin-left: auto;
width: 600px;
float: left;
border: 1px solid #999999;
}
#TableOfEvents td, #TableOfEvents th {
    border: 1px solid #375382;
    padding: 8px;
    background-color: #ddd;
    width:70px;
}
#TableOfEvents tr:nth-child(even){background-color: #375382;}
#TableOfEvents tr:hover {background-color: #ddd;}
#TableOfEvents th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #375382;
    color: white;
}

#labFilesTable td, #labFilesTable th {
    border: 1px solid #375382;
    padding: 8px;
    background-color: #ddd;
    width:70px;
}
#labFilesTable tr:nth-child(even){background-color: #375382;}
#labFilesTable tr:hover {background-color: #ddd;}
#labFilesTable th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #375382;
    color: white;
}

#lessonFilesTable td, #lessonFilesTable th {
    border: 1px solid #375382;
    padding: 8px;
    background-color: #ddd;
    width:70px;
}
#lessonFilesTable tr:nth-child(even){background-color: #375382;}
#lessonFilesTable tr:hover {background-color: #ddd;}
#lessonFilesTable th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #375382;
    color: white;
}

</style>
<section id="services" class="services bg-primary">
<div class="container">
<div class="row text-center">
<div class="col-lg-10 col-lg-offset-1">
<h2><font color="white" ;><h1><?php echo $lab['title']; ?></h1></h2>
<hr class="small">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="service-item">
        <span class="fa-stack fa-4x">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-cloud fa-stack-1x text-primary"></i>
    </span>
    <h4>
        <strong><?php echo $lab['title']; ?></strong>
    </h4>
    <p><font color="white" ;><?php echo $lab['comment']; ?></p>
  
</div>
</div>
</div>
<!-- /.row (nested) -->
</div>
<!-- /.col-lg-10 -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->
</section>
</br>
<div id="wrapper">
<div class="nav nav-tabs col-md-3" style="float: left;">
<div class="innertube col-md-12" style=" background-color: lightgrey;">
<h3><font color="gray" ;>Γρήγορη Αναζήτηση</h3>
<?php foreach ($labs as $value): ?><br/>
<input type="button" class="btn btn-primary"
value="<?php echo $value['name']; ?>"
onClick="window.location='labpage.php?id=<?php echo $value['id'] ?>'"><br/>
<?php endforeach; ?><br/>

<p>Επιλέξτε τον παρακάτω σύνδεσμο για να ανοίξετε το ημερολόγιο. </p><br/>
<p>Στη συνέχεια, επιλέξτε ημέρα.</p><br/>

<script>
function double() {
window.open("cal2.php", "Ratting", "width=350,height=270,left=150,top=200,toolbar=1,status=1,");
document.getElementById('SubmitRecord').style.visibility = 'visible';
}
</script>

<form method="POST" action='' name=f1>
<a href="javascript:void(0);" NAME="Calendar" title="Calendar"
onClick=double();>Ημερολόγιο</a> </br></br>

<div id="SubmitRecord">
<p size=2 face='Verdana'>Date Selected: </p>
<input type="submit" class="btn button" name='p_name' size='8'><br>
</div>

<?php
if (isset($_POST["p_name"])) {
$dateChecked = $_POST["p_name"];
$dateSelected = true;
}
?>
<?php
if ($dateSelected == false) {
echo "<script> 
$('#SubmitRecord').css('visibility', 'hidden'); </script>";
}
if (isset($dateChecked) && $dateChecked != "Submit") {
$dataForThisLab = get_all_data_for_this_lab($var, $dateChecked, $temp = "dontCheck");
$boxesThatShouldBeClosed = get_all_data_for_this_lab($var, $dateChecked, $temp = "true");
}
if (isset($dateChecked) && $dateChecked != "Submit" && !$dataForThisLab) {
//$resultsNULL = "true";
$boxesThatShouldBeClosed = get_all_data_for_this_lab($var, $dateChecked, $temp = "false");
}
//if (isset($dateChecked) && $dateChecked != "Submit" && $dataForThisLab){
//$resultsNULL = "false";
//$boxesThatShouldBeClosed = get_all_data_for_this_lab($var, $dateChecked,$temp =  true);
//}
if (isset($_SESSION['resultsNULLTrue'])) {
$resultsNULL = $_SESSION['resultsNULLTrue'];
} else {
$resultsNULL = "null";
}
if (isset($boxesThatShouldBeClosed[1])) {
$h_2 = $boxesThatShouldBeClosed[1];
} else {
$h_2 = 0;
}
if (isset($boxesThatShouldBeClosed[2])) {
$h_3 = $boxesThatShouldBeClosed[2];
} else {
$h_3 = 0;
}
if (isset($boxesThatShouldBeClosed[3])) {
$h_4 = $boxesThatShouldBeClosed[3];
} else {
$h_4 = 0;
}
if (isset($boxesThatShouldBeClosed[4])) {
$h_5 = $boxesThatShouldBeClosed[4];
} else {
$h_5 = 0;
}
if (isset($boxesThatShouldBeClosed[5])) {
$h_6 = $boxesThatShouldBeClosed[5];
} else {
$h_6 = 0;
}
?>
</form>

</div>
</div>

<!--programma ergasthriwn -->
<div id="wrapper col-md-9">
  <div class="nav col-md-9" style="float: right;">
    <div class="innertube">
    <h3 style="background-color:lightgray;"><font color="gray" ;>Πρόγραμμα Εργαστηρίων</h3>
</br>
<!--lab files from admin -->
<div class="" style="">
Λίστα Αρχείων : 
<?php
$sql = "SELECT id, name, image FROM labFiles WHERE labId = " . $lab ['id'];
$result = sqlsrv_query($con, $sql);

if (sqlsrv_has_rows($result) > 0) {
    $row = sqlsrv_fetch_array($result);
} // end if
else {
    $row = 0;
    echo "No files to show!";
} // end else
?>
<table id="labFilesTable" class="table table-striped table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Όνομα Αρχείου</th>
        <th>Λήψη</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    $sql = "SELECT id, name, image FROM labFiles WHERE labId = " . $lab ['id'];
    $result = sqlsrv_query($con, $sql);
    while ($row = sqlsrv_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><a href="download.php?id=<?php echo $row ['name']; ?>">Download</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>
<!--end of files from admin -->


</div>
</div>
</div>

<!-- gia na mpoyn ta apotelesmata tou mathimatos otan ayto egkrithei-->
<div class="container col-md-12" style="background-color:gray;">
<h2><font color="white">Ανακοινώσεις Μαθημάτων</h2>
<div style="overflow-y: scroll; height:500px; background-color:lightgray;">

</br>
<!-- ανακοινωσεις -->
<div class="container">
<?php
$sql = "SELECT * FROM lab_info WHERE labId = " . $lab ['id'];
$result = sqlsrv_query($con, $sql);
$rows = array ();
while ( $row = sqlsrv_fetch_array ( $result ) )
{
  $rows [] = $row;
}
if (empty ($rows)) {
echo "Δεν υπάρχουν νέα και ενημερώσεις!";
}
else
{
foreach ($rows as $key) {
echo "<div class='row' style='border:2px solid #999999; background-color: #BADBAD'>";

echo "<article>";
echo '<h3>' . htmlspecialchars($key['title']) . '</h3>';
echo '<p>' . htmlspecialchars($key['comment']) . '</p>';    
echo "<article>";

echo "</div>";
echo "</br>";
}}
?>

</div>
<!--end of anakoinwseis-->
</div>
</br>
<!--files apo ton kathigith-->
</div>
<div class="innertube col-md-12">
<h3><font color="gray">Αρχεία Μαθημάτων</h3>
</br>
<!-- ανακοινωσεις -->
<div class="container col-md-12">
<?php
$sql = "SELECT id, name, image FROM courseFiles WHERE labId = ".$lab['id'];
$result = sqlsrv_query($con, $sql);

if (sqlsrv_has_rows($result) > 0) {
$row = sqlsrv_fetch_array($result);
} // end if
else {
$row = 0;
echo "No files to show!";
} // end else
?>
<div class="inertube">
<table id="lessonFilesTable" class="table table-striped table-hover" style="background-color:lightslategray ;">
<thead>
<tr>
    <th>#</th>
    <th>Όνομα Αρχείου</th>
    <th>Λήψη</th>
</tr>
</thead>
<tbody>
<?php
$i = 1;
while ($row = sqlsrv_fetch_array($result)) { ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><a href="download.php?id=<?php echo $row ['name']; ?>">Download</a></td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<!--end of files apo ton kathigith -->
</div>

</br>

<section id="services" class="services bg-primary">
<div class="container">
<div class="row text-center">
<div class="col-lg-10 col-lg-offset-1">

<div id="bodyContainer" style="visibility: hidden;">
<h2>Έχετε επιλέξει για το εργαστήριο: </h2>
<h2><?php echo $lab['title']; ?></h2>
<h2> Την ημέρα: <?php echo $dateChecked ?: ""; ?></h2>
</div>

<div id="TableOfEvents" class="table col-md-12">
<p><font color="white" ;>Στον παρακάτω πίνακα, δίνεται η διαθεσημότητα της ημέρας</p>

<?php
global $hasSubmitForThisLab;
$mySubscriptions = array();
$mySubscriptions = get_my_class_register_applications_for_this_lab ($uid, $lab ['id']);
?>

<?php
if (!empty ($dataForThisLab)) {
$i = 1;
echo "<table cellpadding='3' cellspacing='0' border='1' width='100%'>";
echo "<tr>";
echo "<th>Τίτλος</th>";
echo "<th>Περιγραφή</th>";
echo "<th>8-10</th>";
echo "<th>10-12</th>";
echo "<th>12-14</th>";
echo "<th>14-16</th>";
echo "<th>16-18</th>";
echo "<th>18-20</th>";
echo "<th>Status</th>";
echo "<th>Εγγραφή</th>";
echo "</tr>";
foreach ($dataForThisLab as $labRecord) {
    echo "<tr>";
    echo "<td>" . $labRecord ['Title'] . "</td>";
    echo "<td>" . $labRecord ['description'] . "</td>";
    echo "<td>" . $labRecord ['h_1'] . "</td>";
    echo "<td>" . $labRecord ['h_2'] . "</td>";
    echo "<td>" . $labRecord ['h_3'] . "</td>";
    echo "<td>" . $labRecord ['h_4'] . "</td>";
    echo "<td>" . $labRecord ['h_5'] . "</td>";
    echo "<td>" . $labRecord ['h_6'] . "</td>";
    $EventStatus = "";
    $eventRegistrationEnabled = false;
    if ($labRecord ['status'] == 0) {
        $EventStatus = "Pending..";
    }
    if ($labRecord ['status'] == 1) {
        $EventStatus = "Approved";
        $eventRegistrationEnabled = true;
    }
    if ($labRecord ['status'] == 2) {
        $EventStatus = "Rejected";
    }
    echo "<td>" . $EventStatus . "</td>"; // status
    echo "<td>";
    $userHasSubscribed = false;
    $subscriptionStatus = "";
    foreach ($mySubscriptions as $value) {
        if ($userHasSubscribed == false) {
            if ($value['labId'] == $labRecord['labId']  && 
                $value['event_id'] == $labRecord['id'] && 
                $value['userId'] == $uid){

                $userHasSubscribed = true;
                if($value['status'] == '0'){
                    $subscriptionStatus = 'Pending..';
                }elseif ($value['status'] == '1') {
                     $subscriptionStatus = 'Approved';
                }else{  
                     $subscriptionStatus = 'Rejected';
                }
            }
        }
    }

    if($eventRegistrationEnabled == true && $urole == '1' && $userHasSubscribed == false){//kai den exeis kanei aithsh...
      echo "<a href='subscribe.php?id=".$labRecord['labId']."&subcat=".$labRecord['id']."'>Εγγραφή</a>";
    }else{
      if($userHasSubscribed == true){
        echo $subscriptionStatus;
      }
    }

    echo "</td>";
    echo "</tr>";

    $i++;
}
echo "</table>";
} else {
echo "Δε βρέθηκαν εγγραφές.";
}
?>
</br>
<p><button id="AddNewEventBtn" class="btn button" style="color: white;" onClick="addNewEvent()">Προσθήκη νέας εγγραφής</button>
</p>
</div>

<div id="newEventContainer">
<div id="main">
<form method="post" action="newEventForLab.php">
        <tr>
            <td>Τίτλος:</td>
            <td><input type="text" style="color:black;" name="Title" size="50"/></td>
        </tr>
        </br></br>
        <tr>
            <td>Περιγραφή:</td>
            <textarea type="textarea" style="color:black;" maxlength="2048"
                      name="Description"> </textarea>
        </tr>

    <p>&nbsp;</p>
    <div>
        <label>Επίλεξτε ανάμεσα στα διαθέσιμα δίωρα</label><br>
        <input id="checkbox1Tile" name="1" type="checkbox" value="1"
               onclick="toggleRadioCheckbox(this)"/>
        <label id="checkbox1Label" for="mygroup1">8-10</label>

        <input id="checkbox2Tile" name="2" type="checkbox" value="1"
               onclick="toggleRadioCheckbox(this)"/>
        <label id="checkbox2Label" for="mygroup2">10-12</label>

        <input id="checkbox3Tile" name="3" type="checkbox" value="1"
               onclick="toggleRadioCheckbox(this)"/>
        <label id="checkbox3Label" for="mygroup3">12-14</label>

        <input id="checkbox4Tile" name="4" type="checkbox" value="1"
               onclick="toggleRadioCheckbox(this)"/>
        <label id="checkbox4Label" for="mygroup4">14-16</label>

        <input id="checkbox5Tile" name="5" type="checkbox" value="1"
               onclick="toggleRadioCheckbox(this)"/>
        <label id="checkbox5Label" for="mygroup5">16-18</label>

        <input id="checkbox6Tile" name="6" type="checkbox" value="1"
               onclick="toggleRadioCheckbox(this)"/>
        <label id="checkbox6Label" for="mygroup6">18-20</label>
    </div>
    <input class="button" type="submit" value="Αποθήκευση" style="color:black;"/>
    <input type="hidden" name="labId" value="<?php echo $var ?>"/>
    <input type="hidden" name="event_date" value="<?php echo $dateChecked ?>"/>
    <input type="hidden" name="uid" value="<?php echo $uid ?>"/>
    <input type="hidden" name="urole" value="<?php echo $urole ?>"/>
</form>
</div>
</div>

<?php if ($dateSelected == true) {
echo "<script>
$('#bodyContainer').css('visibility', 'visible');
</script>";
echo "<script>
$('#TableOfEvents').css('visibility', 'visible');
</script>";
}
?>

<?php 
if (isset($_SESSION['UserId'])) {
if ($urole == "1" || $urole == "0") {
echo "<script>
$('#AddNewEventBtn').css('visibility', 'hidden');
</script>";
}
}
?>

</div>
</div>
</div>
</section>

</body>

<footer id="footer">
<div class="innertube">
<p>&copy; 2017 | Υλοποίηση : Σαββάκης Βασίλειος</p>
</div>
</footer>

</html>