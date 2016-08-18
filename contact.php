<!DOCTYPE html>
<html lang="en">
<link href="css/stylish.css" rel="stylesheet">

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <head>
 <body>
<?php
header('Content-type: text/html; charset=utf-8'); // Το χρησιμοποιούμε για να φαίνονται σωστά τα ελληνικά
	if ( isset ( $_POST ['submit'] ) ) // Ελέγχουμε αν έχει γίνει αποστολή της φόρμας
	{
		isset ( $_POST ['firstname'] ) ? $firstname = $_POST ['firstname']: $firstname = '';
		isset ( $_POST ['lastname'] ) ? $lastname = $_POST ['lastname']: $lastname = '';
		isset ( $_POST ['email'] ) ? $email = $_POST ['email']: $email = '';
		isset ( $_POST ['message'] ) ? $message = $_POST ['message']: $message = '';

		$recipient = "puma1140@gmail.com"; // Σε ποιο mail θα σταλούν τα στοιχεία.
		$subject = "Φόρμα επικοινωνίας"; // Το θέμα του email
		
		// Το κυρίως σώμα του mail. Στο τέλος προσθέτουμε τα \r\n για να αλλάζουν γραμμή. Αν παρακάτω στα headers, δηλώναμε τη μορφή του mail html αντί για plain text, θα βάζαμε στο τέλος <br />. Για περισσότερες πληροφορίες σχετικά με τη συνάρτηση mail, μπορεί κανείς να ανατρέξει στο link http://php.net/manual/en/function.mail.php
		$body = "Όνομα: ".$firstname."\r\n";
		$body .= "Επώνυμο: ".$lastname."\r\n";
		$body .= "E-mail: ".$email."\r\n";
		$body .= "Μήνυμα: ".$message;

		$headers  = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'From: admin@my_site.gr'."\r\n";
		$headers .= 'Content-type: text/plain; charset=utf-8'."\r\n";

		mail ( $recipient, $subject, $body, $headers );
		echo '<script language="javascript">';
echo 'alert("Η αποστολή της φόρμας πραγματοποιήθηκε με επιτυχία.")';
echo '</script>';
		//echo "<p>Η αποστολή της φόρμας πραγματοποιήθηκε με επιτυχία.</p>";
	} // end if
	else{ // Διαφορετικά εμφανίζουμε τη φόρμα
	
		
		//include('page.php');
		//echo $page ['content'];
		//echo "Προέκυψε κάποιο σφάλμα. Παρακαλώ δοκιμάστε ξανά αργότερα!";
	
?>

<h1 style="width:auto; font-size:300%; text-align:center;"><font color="black";>Φόρμα επικοινωνίας</h1>
<div class='wrapper' style="width:500px; margin:0 auto;">
<form method="post" action="" id="contact_form" onSubmit="return check_contact_form ();">
	<table cellpadding="3" cellspacing="0" border="0">
    	<tr>
        	<td>Όνομα:</td>
            <td><input type="text" name="firstname" value="" id="firstname" />
        </tr>
        <tr>
        	<td>Επώνυμο:</td>
            <td><input type="text" name="lastname" id="lastname" value="" />
        </tr>
        <tr>
        	<td>E-mail:</td>
            <td><input type="text" name="email" id="email" value="" />
        </tr>
        <tr>
        	<td valign="top">Μήνυμα:</td>
            <td><textarea rows="4" cols="50" id="message" name="message"></textarea></td>
        </tr>
        <tr>
        	<td colspan="2" style="text-align:center;" ><input type="submit" value="Αποστολή"  />
        </tr>
    </table>
    <input type="hidden" name="submit" value="1" />
</form>
</div>
<p style="width:auto; text-align:center;">Παρακαλώ συμπληρώστε τα στοιχεία της φόρμας</p>


<?php
	} // end else
?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApD10eaZCu6GNpJ9-OOQYoL8d-gJHhauk"></script>
<div id="map" style="width:100%;height:400px"></div>


<script>
var myCenter=new google.maps.LatLng(37.94184,23.65296);
var marker;
var mapCanvas = document.getElementById("map");
var mapOptions = {
	center:myCenter,
    center: new google.maps.LatLng(37.94,23.65), zoom: 10
}
var map = new google.maps.Map(mapCanvas, mapOptions);
var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
</script>
</body>
 
</head>
