<?php
global $dateChecked;
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
function addNewEvent() {
document.getElementById("newEventContainer").style.visibility = "visible";
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
  <!-- debug -->
  <div class="container">
	<h1 ><?php echo $lab['title']; ?></h1>
  </div>

	</head>

<body>
<div id="wrapper">
<div class="nav nav-tabs col-md-3" style="float: left;">
	<div class="innertube">
    <h3>Γρήγορη Αναζήτηση</h3>
 <?php foreach($labs as $value): ?>
  <br/>
   <input type="button" class="btn btn-primary" value="<?php echo $value['name']; ?>"
     onClick="window.location='labpage.php?id=<?php echo $value['id'] ?>'"><br/>
 <?php endforeach; ?>

   <br/><br/>
  <p> Click the links to display calendar. <br>Then select a date .</p>
   <br>

<script>
  function double() {
  window.open("cal2.php","Ratting","width=350,height=270,left=150,top=200,toolbar=1,status=1,");
  document.getElementById('SubmitRecord').style.visibility = 'visible';
  }
</script>

<form method="POST" action='' name=f1>
  <a href="javascript:void(0);" NAME="Calendar" title="Calendar " 
onClick= double();>Click here to open the calendar window</a> 
</br></br>

<div id="SubmitRecord">
<p size=2 face='Verdana'>Date Selected: </p>
  <input type="submit" class="btn button" name='p_name' size='8'><br> 

</div>
 <?php 
 if (isset($_POST["p_name"])){
        //echo $_POST["p_name"];
  $dateChecked = $_POST["p_name"];
 $dateSelected = true;
}
if($dateSelected == false){
echo "<script>
    $('#SubmitRecord').css('visibility', 'hidden');
</script>";
}
?>
</form> 


  </div>
 </div>

</div><!--wrapper end-->
</br>
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
				echo "<td>Per1</td>";
        echo "<td>Per2</td>";
        echo "<td>Per3</td>";
        echo "<td>Per4</td>";
        echo "<td>Per5</td>";
        echo "<td>Per6</td>";
				echo "</tr>";
				// Και εμφάνισε τις εγγραφές
				foreach ( $dataForThisLab as $record )
				{
					$i++;
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".stripslashes ( $record ['labId'] )."</td>";
					echo "<td>".$record ['Title']."</td>";
          echo "<td>".$record ['Description']."</td>";
          echo "<td>".$record ['Per1']."</td>";
          echo "<td>".$record ['Per2']."</td>";
          echo "<td>".$record ['Per3']."</td>";
          echo "<td>".$record ['Per4']."</td>";
          echo "<td>".$record ['Per5']."</td>";
          echo "<td>".$record ['Per6']."</td>";
					echo "<td>";
				  //echo "<a href='edit_labs_menu.php?id=".$record ['id']."'>Επεξεργασία</a> | ";
					//echo "<a href='delete_lab.php?id=".$record ['id']."'>Διαγραφή</a>";
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
        	<p><button class="btn button" onClick= addNewEvent()>Προσθήκη νέας εγγραφής</button></p>
        </div>
  </div>
  </div>
</body>
<?php 
 if (isset($dateChecked)){
   // kalese mia synarthsh poy tha diavasei gia auth thn hmera kai ayto to ergasthrio ti yparxei
   // na pernaw to labId kai to date
        //echo $dateChecked ?: "";
        //../functions/menu.php edw mesa vrisketai
$dataForThisLab = get_all_data_for_this_lab($var, $dateChecked);   
echo "<script>
    $('#bodyContainer').css('visibility', 'visible');
</script>";
echo "<script>
    $('#TableOfEvents').css('visibility', 'visible');
</script>";
}?>

	<div id="newEventContainer">
    	<?php
		  ?>
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
              <input  name="1" type="checkbox" value="1" onclick="toggleRadioCheckbox(this)" /> 
              <label for="mygroup1">8-10</label>
   			      <input  name="2" type="checkbox" value="2" onclick="toggleRadioCheckbox(this)" /> 
               <label for="mygroup2">10-12</label>
               <input  name="3" type="checkbox" value="3" onclick="toggleRadioCheckbox(this)" /> 
              <label for="mygroup3">12-14</label>
   			      <input  name="4" type="checkbox" value="4" onclick="toggleRadioCheckbox(this)" /> 
               <label for="mygroup4">14-16</label>
               <input  name="5" type="checkbox" value="5" onclick="toggleRadioCheckbox(this)" /> 
              <label for="mygroup5">16-18</label>
              <input  name="6" type="checkbox" value="6" onclick="toggleRadioCheckbox(this)" /> 
              <label for="mygroup6">18-20</label>
			  </div>
                 <input type="submit" value="Αποθήκευση" />
                <input type="hidden" name="labId" value="<?php echo $var ?>" />
                <!--<input type="hidden" name="checkboxes" value="<?php echo $event ['id']; ?>" />-->
                <!--<input type="hidden" name="action" value="<?php  print "add"; ?>" /> -->
            </form>
        	<!-- <p><a href='menu.php'>Πίσω στο μενού</a></p> -->
        </div>
	</div>
  <script type="text/javascript">
 function toggleRadioCheckbox(sender, value) {
        // RadioCheckbox: 0..1 enabled in a group 
        if (!sender.checked) return;
        var fields = document.getElementsByName(sender.name);
        if(fields[0] == "1")
        //
        else if (fields[0] == "2")
        //
        else if (fields[0] == "3")
        //
        else if (fields[0] == "4")
        //
        else if (fields[0] == "5")
        //
        else
    }
</script>
<footer id="footer">
	<div class="innertube">
		<p>&copy; 2017  | Υλοποίηση : Σαββάκης Βασίλειος</p>
	</div>
</footer>
</html>