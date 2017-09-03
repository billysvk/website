
<?php

  include('cms/functions/menu.php');
$labs = array ();
$labs = get_labs();
if( isset($_SESSION['UserId']) ) {
      $uid = $_SESSION['UserId'];
      //echo $uid;
    }
?>
<div class="wrapper_container">
<div class="container">
  
 <?php foreach($labs as $value): ?>
    <tr>
       
      <div class="col-sm-4 btn-group">
       <span> 
        <h3>
          <font size="3px"> 
        <b>
         <input type="button" class="btn btn-primary" value="<?php echo $value['name']; ?>"
         onClick="window.location='labs/labpage.php?id=<?php echo $value['id'] ?>'">
       
       </h3> 
      <p>
        <font color="black">Τίτλος: <?php echo $value['title']; ?>
      </p>
       <img src="images/Science-lab.jpg" class="img-rounded col-sm-12" width="300" height="216" >
    </div>

    </tr>
 <?php endforeach; ?>
   
 </div>
</div>
	</div>
	</div>
</div>