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
function myFunction() {
    var x = document.getElementById('SubmitRecord');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
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
        echo $_POST["p_name"];
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
<!-- <button onclick="myFunction()">Try it</button> -->
</br>
<div id="body_container" >
 <h2>epileksate gia to ergasthrio </h2>
 <h2><?php echo $lab['title']; ?></h2>
<h2> thn hmera:  <?php echo $dateChecked ?: ""; ?></h2>
 <p>ston parakatw pinaka fainetai h diathesimothta ths hmeras</p>
</div>
<?php 
 if (isset($dateChecked)){
   // kalese mia synarthsh poy tha diavasei gia auth thn hmera kai ayto to ergasthrio ti yparxei
   // na pernaw to labId kai to date
        //echo $dateChecked ?: "";
        //../functions/menu.php edw mesa vrisketai
$dataForThisLab = get_all_data_for_this_lab($var, $dateChecked);   
}
?>


<div id="">
<div class="container col-md-12">
        <div id="">
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
        	<p><button class="btn button" onClick= 'myFunction($var, $dateChecked)'>Προσθήκη νέας εγγραφής</button></p>
        </div>
  </div>
  </div>
</body>

<footer id="footer">
	<div class="innertube">
		<p>&copy; 2017  | Υλοποίηση : Σαββάκης Βασίλειος</p>
	</div>
</footer>
</html>