
<?php
if( isset($_SESSION['UserId']) ) {
      $uid = $_SESSION['UserId'];
      //echo $uid;
    }
?>
<div class="wrapper_container">
<div class="container">
  
 <?php foreach($labs as $value): ?>
    <tr>
      <div class="col-md-6 btn-group">
       <span> 
        <h3>
          <font size="3px"> 
        <b>
         <input type="button" class="btn btn-primary" value="<?php echo $value['name']; ?>"
         onClick="window.location='labs/labpage.php?id=<?php echo $value['id'] ?>'">
       </h3> 
        <?php 
         if(!empty($value['imageName'])){
             echo '<div align="center">';
             echo '<img src="uploads/images/'.$value['imageName'].'" alt="Image not found!" height="200" width="400">';
             echo '</div><br />';
         }
        ?>
       </div>
    </tr>
 <?php endforeach; ?>
   
 </div>
</div>
	</div>
	</div>
</div>