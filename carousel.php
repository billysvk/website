<style> 
    .carousel-caption {
      background-image: url("http://www.phpgang.com/wp-content/themes/PHPGang_v2/img/bg_sidebar.png");
    }
    .carousel-inner>.item>img, .carousel-inner>.item>a>img
    {
        height:400px;
        width:700px;
    }
</style> 

<? 
$serverName = 'DESKTOP-IQAL01N';
$connectionInfo=array('Database' => 'calendar');
global $con;
$con = sqlsrv_connect($serverName, $connectionInfo);
        $sql = "SELECT * FROM images";
        $result = sqlsrv_query ( $con, $sql );

        $rows = array ();
        while ( $row = sqlsrv_fetch_array ( $result ) )
        {
            $rows [] = $row;
        } // end whille 
?>
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="js/custom.css" type="text/css" media="screen, projection" />
    <script type="text/javascript" src="js/jquery.jshowoff.min.js"></script>
  </head>

<body id="home">
<div id="wrap">
<div id="about">
<div id="demo">

<div class="wrapper_container">
<div class="container">
  
 <?php foreach($rows as $value): ?>
    <tr>
      <div class="col-sm-4 btn-group">
       <span> 
        <h3>
          <font size="3px"> 
        <b>
         <input type="button" class="btn btn-primary" value="<?php echo "Go" ?>"
         onClick="window.location='labs/labpage.php?id=<?php echo $value['id'] ?>'">
       </h3> 
       <img src="./uploads/images/bt.png" alt="No Image found" class="img-rounded col-sm-12" width="300" height="216" >
    </div>

    </tr>
 <?php endforeach; ?>
   
 </div>
</div>
</div><!--end #demo-->
</div><!--end #wrap-->

</body>
</html>
