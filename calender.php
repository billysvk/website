<?php
//header('Content-type: text/html; charset=utf-8'); // Το χρησιμοποιούμε για να φαίνονται σωστά τα ελληνικά

mysql_connect("localhost", "root", "") or die (mysql_error());
//echo "Connected to Mysql<br/><hr/>";
mysql_select_db("calendar") or die (mysql_error());
//echo"Connected to Database<br/><hr>";
?>

<html>
<head>

</head>
<script>
	function goLastMonth(month, year){
		if (month == 1) {
			--year;
			month = 13;
						}
                        --month;
                        var monthstring = "" + month+"";
                        var monthlength = monthstring.length;
    
                if(monthlength <= 1) {
                    monthstring = "0"+monthstring;
                    }
			document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
					}


	function goNextMonth(month, year){
		if (month == 12) {
			++year;
			month = 0;
						}
                         ++month;
                         var monthstring = "" + month+"";
                        var monthlength = monthstring.length;
    
                if(monthlength <= 1) {
                    monthstring = "0"+monthstring;
                    }
      		document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
					}

</script>	
<!--highlight an event-->
 <style>
.today{
background-color: #00ff00;
}
.event{
background-color: #FF8080;
}
</style>

<body>

<?php
if (isset($_GET['day'])){ //check if day has passing variable
    $day = $_GET['day']; //if true, get the day from the URL
}else{
    $day = date("j"); // else, set today day
}

if (isset($_GET['month'])){
     $month = $_GET['month'];
}else{
     $month = date("n");
}

if (isset($_GET['year'])){
    $year = $_GET['year'];
}else{
    $year = date("Y");
}
// get today day,month,year and put them in day,month,year

//setting up calendar variable
$currentTimeStamp = strtotime("$year-$month-$day");//stores the day,month,year carievle in timestamp
//get current month name
$monthName = date("F",$currentTimeStamp);
//how many days are there in the current month
$numDays = date("t",$currentTimeStamp);
//variable to count cell in the loop 
$counter = 0;

//echo  $day."/".$month."/".$year;
?>
<?php
if(isset($_GET['add'])){
$title =$_POST['txttitle'];
$detail =$_POST['txtdetail'];
$eventdate = $month."/".$day."/".$year;//h metavliti eventdate pairnei thn hmeromhnia toy event
$sqlinsert = "INSERT into eventcalendar(Title,Detail,eventDate,dateAdded) values ('".$title."','".$detail."','".$eventdate."',now())";//pername ta dedomena sthn vash
$resultinginsert = mysql_query($sqlinsert);
if($resultinginsert ){
echo "Event was successfully Added!";
}else{
echo "Event Failed to be Added...";
}
}
?>
  <table border='1'>  <!-- table 2 rows 7 column-->
                <tr> 
                   <td><input style='width:50px;' type='button' value='<' name='previousbutton' onclick="goLastMonth(<?php echo $month.",".$year?>)"></td>
                    <td colspan='5' align='center'> <?php echo $monthName.", ".$year; ?></td> <!-- merge the first row, secnd to sixth column for the month-->
                    <td><input style='width:50px;' type='button' value='>' name='nextbutton' onclick="goNextMonth(<?php echo $month.",".$year?>)"></td>
                <td></td>	
                </tr>
                    <tr> 
                    <td width='50px'>Sun </td>
                    <td width='50px'>Mon </td>
                    <td width='50px'>Tue </td>
                    <td width='50px'>Wed </td>
                    <td width='50px'>Thu </td>
                    <td width='50px'>Fri </td>
                    <td width='50px'>Sat </td>

                </tr>
                <?php
                   echo "<tr>";

for($i = 1; $i < $numDays+1; $i++, $counter++) { 
    $timeStamp = strtotime("$year-$month-$i");//looping for 1 to the num of days in the month
         if($i == 1){
              $firstDay = date("w",$timeStamp); //witch day where "day 1" fall on
            for ($j = 0; $j < $firstDay; $j++, $counter++){
            //blank space
            echo "<td>&nbsp;</td>"; //	non-breaking space (HTML Entity)
        }
    }
    if ($counter % 7 == 0 ){//if the day is on the last column...
         echo "</tr><tr>";
    }

    $monthstring = $month;
    $monthlenght = strlen($monthstring);
    $daystring = $i;
    $daylength = strlen($daystring);
    if ($monthlenght <= 1) {
        $monthstring = "0".$monthstring;
    }
    if ($daylength <= 1) {
    $daystring = "0".$daystring;
    }
$todaysDate = date("m/d/Y"); //pairnoyme thn shmerinh mera
$dateToCompare = $monthstring. '/' . $daystring. '/' . $year;

echo "<td align='center' ";
if ($todaysDate == $dateToCompare){ // an einai idies oi meres poy exoyme na sygkrinoyme..
echo "class ='today'";// thn vazw se mia klash
} else{
$sqlCount = "select * from eventcalendar where eventDate='".$dateToCompare."'";// alliws prepei na elegksoyme an to $datetocompare exei kapoio event
$noOfEvent = mysql_num_rows(mysql_query($sqlCount));
if($noOfEvent >= 1){
echo "class='event'";
}
}

         echo "<td align='center'><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";//display the day on the column
         // pername ta month, day, year se mia metavliti "v" gia na elegksoyme an o xrisths exei epileksei thn hmeromhnia
    }
                echo"</tr>";
                ?>
  </table>
<?php 
if (isset($_GET['v'])){ // an epileksoyme mia mera tote empfanizei mhnyma add event
    echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true &f=true'>Add Event</a>";
    if (isset($_GET['f'])){ // an o xristis epileksei mera kai meta to add Event, tote kane include to eventform.php
    include("eventform.php");
    }
    $sqlEvent = "select * FROM eventcalendar where eventDate='".$month."/".$day."/".$year."'";
$resultEvents = mysql_query($sqlEvent);
echo "<hr>";
while ($events = mysql_fetch_array($resultEvents)){
echo "Title: ".$events['Title']."<br>";
echo "Detail: ".$events['Detail']."<br>";
}
}

?>


</body>

</html>