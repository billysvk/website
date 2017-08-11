<?php
global $dateChecked;
global $resultsNULL;
global $addNewEventClicked;
$addNewEventClicked = false;
$resultsNULL = false;
global $dataForThisLab;
global $dateSelected;
$dateSelected = false;
$dataForThisLab = array ();
include('../cms/functions/menu.php');
include('../functions/menu.php');
$var = $_GET['id']; // LabID
$labs = array ();
$labs = get_labs();
$lab = null;
$found = false;
foreach ($labs as $value) {
  if($found)
    break;
  if($value['id'] == $var){
     $found = true;
    $lab = $value;
  }
}
?>

<!-- scripts-->

<script>
function showAllResponses() {
document.getElementById("SubmitRecord").style.visibility = "visible";
}
</script>
<script type="text/javascript">
$("input[type='submit']").click(function(){
alert(this.value);
});
</script>

<script>

function addNewEvent(resultsAreEmpty, h_1, h_2, h_3, h_4, h_5, h_6) {
document.getElementById("newEventContainer").style.visibility = "visible";
if (resultsAreEmpty == true) {
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
if (resultsAreEmpty == false){
 if(h_1 == 0 ){
  document.getElementById("checkbox1Tile").style.visibility = "visible";
document.getElementById("checkbox1Label").style.visibility = "visible";
 }
 if(h_2 == 0) {
  document.getElementById("checkbox2Tile").style.visibility = "visible";
document.getElementById("checkbox2Label").style.visibility = "visible";
 }
  if(h_3 == 0) {
  document.getElementById("checkbox3Tile").style.visibility = "visible";
document.getElementById("checkbox3Label").style.visibility = "visible";
 }
  if(h_4 == 0) {
  document.getElementById("checkbox4Tile").style.visibility = "visible";
document.getElementById("checkbox4Label").style.visibility = "visible";
 }
  if(h_5 == 0) {
  document.getElementById("checkbox5Tile").style.visibility = "visible";
document.getElementById("checkbox5Label").style.visibility = "visible";
 }
  if(h_6 == 0){
  document.getElementById("checkbox6Tile").style.visibility = "visible";
document.getElementById("checkbox6Label").style.visibility = "visible";
 }
}
}
</script>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>2 Column Layout &mdash; Left Menu with Header &amp; Footer</title>
        <link href="calendar.css" type="text/css" rel="stylesheet" />
        <link href="science.css" rel="stylesheet" type="text/css">
        <link href="custom.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <div class="container">
	<h1 ><?php echo $lab['title']; ?></h1>
  </div>
</head>

<body>
<div id="wrapper">
 <div class="nav nav-tabs col-md-3" style="float: left;">
	<div class="innertube">
    <h3>Γρήγορη Αναζήτηση</h3>
<?php foreach($labs as $value): ?><br/>
<input type="button" class="btn btn-primary" value="<?php echo $value['name']; ?>"
       onClick="window.location='labpage.php?id=<?php echo $value['id'] ?>'"><br/>
<?php endforeach; ?><br/><br/>
<p>Click the links to display calendar. <br>Then select a date .</p><br>

<script>
  function double() {
  window.open("cal2.php","Ratting","width=350,height=270,left=150,top=200,toolbar=1,status=1,");
  document.getElementById('SubmitRecord').style.visibility = 'visible';
  }
</script>

<form method="POST" action='' name=f1>
  <a href="javascript:void(0);" NAME="Calendar" title="Calendar " 
   onClick= double();>Click here to open the calendar window</a> </br></br>
<div id="SubmitRecord">
<p size=2 face='Verdana'>Date Selected: </p>
  <input type="submit" class="btn button" name='p_name' size='8'><br> 
</div>

<?php 
if (isset($_POST["p_name"])) {
  $dateChecked = $_POST["p_name"];
  $dateSelected = true;
}
if($dateSelected == false) {
echo "<script>
   $('#SubmitRecord').css('visibility', 'hidden');
</script>";
}
?>

<?php 
if (isset($dateChecked) && $dateChecked != "Submit"){
  $dataForThisLab = get_all_data_for_this_lab($var, $dateChecked);  
}
if(isset($dateChecked) && $dateChecked != "Submit" && !$dataForThisLab){
  $resultsNULL = true;
}
if(isset($dateChecked) && $dateChecked != "Submit" && $dataForThisLab){
  $resultsNULL = false;
  $boxesThatShouldBeClosed = array();
  for($i=1; $i<7;$i++){
    if ($dataForThisLab["h_".$i] == 1 ) {
        $boxesThatShouldBeClosed[$i-1] = 1;
    }else{
        $boxesThatShouldBeClosed[$i-1] = 0;
    }
  }
}
?>

<script>
var resultsAreEmpty = <?php echo json_encode($resultsNULL,JSON_HEX_TAG);?>;
var h_1 = <?php echo json_encode($boxesThatShouldBeClosed[0],JSON_HEX_TAG);?>;
var h_2 = <?php echo json_encode($boxesThatShouldBeClosed[1],JSON_HEX_TAG);?>;
var h_3 = <?php echo json_encode($boxesThatShouldBeClosed[2],JSON_HEX_TAG);?>;
var h_4 = <?php echo json_encode($boxesThatShouldBeClosed[3],JSON_HEX_TAG);?>;
var h_5 = <?php echo json_encode($boxesThatShouldBeClosed[4],JSON_HEX_TAG);?>;
var h_6 = <?php echo json_encode($boxesThatShouldBeClosed[5],JSON_HEX_TAG);?>;
//alert( resultsAreEmpty);
</script>

   </form> 
  </div>
 </div>
</div><!--wrapper end--></br>

<div id="bodyContainer" style="visibility: hidden;">
 <h2>epileksate gia to ergasthrio </h2>
 <h2><?php echo $lab['title']; ?></h2>
 <h2> thn hmera:  <?php echo $dateChecked ?: ""; ?></h2>
</div>
<div id="TableOfEvents" class="container col-md-12">
 <p>ston parakatw pinaka fainetai h diathesimothta ths hmeras</p>
<?php
 if ( !empty ( $dataForThisLab ) ) // Αν υπάρχουν εγγραφές 
      {
				$i = 0;
				// Φτιάξε έναν html πίνακα
				echo "<table cellpadding='3' cellspacing='0' border='1' width='100%'>";
				echo "<tr>";
				echo "<td>Id</td>";
				echo "<td>LabId</td>";
				echo "<td>Event Title</td>";
        echo "<td>Description</td>";
				echo "<td>h_1</td>";
        echo "<td>h_2</td>";
        echo "<td>h_3</td>";
        echo "<td>h_4</td>";
        echo "<td>h_5</td>";
        echo "<td>h_6</td>";
				echo "</tr>";
				// Και εμφάνισε τις εγγραφές
					$i = 1;
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".stripslashes ( $dataForThisLab ['labId'] )."</td>";
					echo "<td>".$dataForThisLab ['Title']."</td>";
          echo "<td>".$dataForThisLab ['description']."</td>";
          echo "<td>".$dataForThisLab ['h_1']."</td>";
          echo "<td>".$dataForThisLab ['h_2']."</td>";
          echo "<td>".$dataForThisLab ['h_3']."</td>";
          echo "<td>".$dataForThisLab ['h_4']."</td>";
          echo "<td>".$dataForThisLab ['h_5']."</td>";
          echo "<td>".$dataForThisLab ['h_6']."</td>";
					echo "<td>";
				  //echo "<a href='edit_labs_menu.php?id=".$dataForThisLab ['id']."'>Επεξεργασία</a> | ";
					//echo "<a href='delete_lab.php?id=".$dataForThisLab ['id']."'>Διαγραφή</a>";
					echo "</td>";
					echo "</tr>";
				 // end foreach
				echo "</table>";
			} // end if
			else
			{
				echo "Δε βρέθηκαν εγγραφές.";
			} // end else
?>
<p><button class="btn button" onClick= addNewEvent(resultsAreEmpty, h_1, h_2, h_3, h_4, h_5, h_6)>Προσθήκη νέας εγγραφής</button></p>
    </div>
  </div>
</div>
</body>

<div id="newEventContainer">
        <div id="main">
        	<form method="post" action="newEventForLab.php">
            	<table cellpadding="3" cellspacing="0" border="0">
                	<tr>
                    	<td>Τίτλος:</td>
                        <td><input type="text"  name="Title" size="50" /></td>
                    </tr>
                    <tr>
                    	<td>Περιγραφή:</td>
                        <td><input type="text" maxlength="2048" name="Description" /></td>
                    </tr>
                  
                </table>
                <p>&nbsp;</p>
                  <div>
		        	<label>epilekste anamesa sta diathesima dywra</label><br>
              <input  id="checkbox1Tile" name="1" type="checkbox" value="1" onclick="toggleRadioCheckbox(this)" /> 
              <label id="checkbox1Label" for="mygroup1">8-10</label>

   			      <input  id="checkbox2Tile" name="2" type="checkbox" value="2" onclick="toggleRadioCheckbox(this)" /> 
               <label id="checkbox2Label" for="mygroup2">10-12</label>

               <input  id="checkbox3Tile" name="3" type="checkbox" value="3" onclick="toggleRadioCheckbox(this)" /> 
               <label id="checkbox3Label" for="mygroup3">12-14</label>

   			      <input  id="checkbox4Tile" name="4" type="checkbox" value="4" onclick="toggleRadioCheckbox(this)" /> 
               <label id="checkbox4Label" for="mygroup4">14-16</label>

               <input id="checkbox5Tile" name="5" type="checkbox" value="5" onclick="toggleRadioCheckbox(this)" /> 
              <label id="checkbox5Label" for="mygroup5">16-18</label>

              <input id="checkbox6Tile" name="6" type="checkbox" value="6" onclick="toggleRadioCheckbox(this)" /> 
              <label id="checkbox6Label" for="mygroup6">18-20</label>
			  </div>
                 <input type="submit" value="Αποθήκευση" />
                <input type="hidden" name="labId" value="<?php echo $var ?>" />
                <!--<input type="hidden" name="checkboxes" value="<?php echo $event ['id']; ?>" />-->
                <!--<input type="hidden" name="action" value="<?php  print "add"; ?>" /> -->
            </form>
        	<!-- <p><a href='menu.php'>Πίσω στο μενού</a></p> -->
        </div>
	</div>

<?php 
if($dateSelected == true){
echo "<script>
    $('#bodyContainer').css('visibility', 'visible');
</script>";
echo "<script>
    $('#TableOfEvents').css('visibility', 'visible');
</script>";
}
?>

<footer id="footer">
	<div class="innertube">
		<p>&copy; 2017  | Υλοποίηση : Σαββάκης Βασίλειος</p>
	</div>
</footer>
</html>