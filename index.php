<?php
	include ( 'init.php' );
  include ( 'cms/functions/menu.php' );
  $labs = array ();
  $labs = get_labs();
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
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>


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

<!--
 <div id="page">

	<div class="wrapper_body">
		<div id="header">
      <div class="jumbotron text-center" style="background-color:white"><h1><font color="white", style="font-family:Helvetica;">Σύστημα Διαχείρισης Εργαστηρίων </h1></font><p><font color="white";> Πανεπιστημίου Πειραιώς </p></div>
	  
    </div>
  </div> -->

   <!-- <li><a href='index.php' target='_self'>Αρχική σελίδα</a></li><li><a href="?id=2">Επικοινωνία</a></li>-->
 
 <!--  <li class="dropdown"><a <button class="btn dropdown-toggle" id="menu" type="button" data-toggle="dropdown">Λίστα Εργαστηρίων</a></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Εργαστήριο Φυσικής</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Εργαστήριο Χημείας</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Εργαστήριο Πληροφορικής</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Εργαστήριο Ηλεκτρονικών</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Εργαστήριο Τηλεπικοινωνιών</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Εργαστήριο Δικτύων</a></li>
    </ul>
  </li>-->

</body>
	<div class="wrapper_foot">
	<div class="footer">
	<div class="jumbotron-footer text-center" style="background-color: lightgray; vertical-align: bottom;"  > 
  <p>&copy; 2016  | Υλοποίηση : Σαββάκης Βασίλειος</p>
		</div>

</html>
