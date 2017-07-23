<?php
include('../cms/functions/menu.php');
$var = $_GET['id'];

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
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>2 Column Layout &mdash; Left Menu with Header &amp; Footer</title>
        <link href="calendar.css" type="text/css" rel="stylesheet" />
        <link href="science.css" rel="stylesheet" type="text/css">
          <!--<link href="custom.css" rel="stylesheet" type="text/css">-->
       <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: center;
  }
  </style>
		<script type="text/javascript">
			var bodyText=["The smaller your reality, the more convinced you are that you know everything.", 
      "If the facts don't fit the theory, change the facts.", 
      "The past has no power over the present moment."]
			function generateText(sentenceCount){
				for (var i=0; i<sentenceCount; i++)
				document.write(bodyText[Math.floor(Math.random()*7)]+" ")
			}
		</script>
	</head>

	<body>
		<header id="header">
			<div class="innertube">
				<h1 ><?php echo $lab['title']; ?></h1>
			</div>
		</header>

		<div id="wrapper">
			<main>
				<div id="content">
					<div class="innertube">
						<!--<h2> Heading </h2>-->
     <div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" style="width: 1000px; margin: 0 auto"data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/lab4.jpg" alt="Lab" width="500" height="336">
        <div class="carousel-caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
      </div>

      <div class="item">
        <img src="images/lab1.jpg" alt="Lab" width="500" height="336">
        <div class="carousel-caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
      </div>

      <div class="item">
        <img src="images/lab2.jpg" alt="Lab" width="500" height="336">
        <div class="carousel-caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
      </div>

      <div class="item">
        <img src="images/lab3.jpg" alt="Lab" width="500" height="336">
        <div class="carousel-caption">
        <h3>Chania</h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
</div>
</main>

<nav id="nav">
	<div class="innertube">
		<h3>Γρήγορη Αναζήτηση</h3>
<!--sidebar-->
<?php foreach($labs as $value): ?>
  <br/>
   <input type="button" class="btn btn-primary" value="<?php echo $value['name']; ?>"
     onClick="window.location='labpage.php?id=<?php echo $value['id'] ?>'"><br/>
 <?php endforeach; ?>
   <br/>  <br/>
 <?php include '../calender.php';?>
  </div>
  <br/>
</nav>

</div><!--wrapper end-->

<footer id="footer">
	<div class="innertube">
		<p>&copy; 2017  | Υλοποίηση : Σαββάκης Βασίλειος</p>
	</div>
</footer>
	</body>
</html>
