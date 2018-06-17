<?php
	include ( 'init.php' );
  include ( 'cms/functions/menu.php' );
  $labs = array ();
  $labs = get_labs();
  $images = get_images();
 // include('page.php');
//pass variables from login screen
  global $uName;
    if( isset($_SESSION['firstMessage']) ) {
      $uName = $_SESSION['firstMessage'];
     // echo $uName;
    }
     if( isset($_SESSION['UserId']) ) {
      $uid = $_SESSION['UserId'];
      //echo $uid;
    }else {
      $uid = 0;
    }
      if( isset($_SESSION['userRole']) ) {
      $urole = $_SESSION['userRole'];
      //echo $uid;
    }else {
      $urole = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
 <head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <div>
	<title>Σύστημα Διαχείρισης Εργαστηρίων</title>

	</div>
    <link rel="shortcut icon" type="image/ico" href="images/unipi.png" />

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="text/css/main.css" rel="stylesheet" type="text/css"> 
	<!-- Custom CSS -->
    <link href="css/stylish.css" rel="stylesheet">
    <style>p.serif {font-family: "Times New Roman", Times, serif;}
        p.sansserif {font-family: Arial, Helvetica, sans-serif;}</style>	
</head>
<style>
.footer {
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #efefef;
  text-align: center;
}</style>

<body>
<div class="wrapper_head">
		<div id="header_top">
      <div id="menu">
	      <div id="sidebar"><h2 class="black"></h2>
        <?php include ( 'menu.php' ); 
          $message2 = $uName;
          $message3 = $uid;
          $message4 = $urole;
          $_SESSION['lastMessage'] = $message2;
          $_SESSION['UserId'] = $message3;
          $_SESSION['urole'] = $message4;
        ?></div>
		    <div id="content"><?php include ( 'page.php' ); ?></div>
      </div>
    </div>
</div>

</body>
<footer>
	<div class="footer">
  <p>&copy; 2018  | Υλοποίηση : Σαββάκης Βασίλειος</p>
		</div>
</footer>
</html>
