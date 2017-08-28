<?php
global $value;
?>

<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
</head>
<body >
Click the links to display calendar. <br>Then select a date .<br><br>
<form method="POST" action='' name=f1>
<table > <tr>
<td >
<font size=2 face='Verdana'>Date Selected: </font>
	<input type="submit" name='p_name' size='8'><br> 
 <?php 
 if (isset($_POST["p_name"])){
        //echo $_POST["p_name"];
  $value = $_POST["p_name"];
}
?>

<a href="javascript:void(0);" NAME="  Calendar" title="   
Calendar " 
onClick=window.open("../calendar/cal2.php","Ratting","width=350,height=270,left=150,top=200,toolbar=1,status=1,");>Click here to open the calendar window</a> 
</td>
</tr> 
</table>
</form> 

</body>
</html>

<!-- debug -->
<script type="text/javascript">
$("input[type='submit']").click(function(){
alert(this.value);
});
</script>