
<?php

  include('cms/functions/menu.php');
$labs = array ();
$labs = get_labs();

?>


<div class="wrapper_container">
<div class="container">
  
 <?php foreach($labs as $value): ?>
    <tr>
       
      <div class="col-sm-4">
       <span> 
        <h3>
          <font size="4px"> 
        <b>
         <input type="button" value="<?php echo $value['name']; ?>"
         onClick="window.location='labs/labpage.php?id=<?php echo $value['id'] ?>'">

        </b> 
       </h3> 
      <p>
        <font color="black"><?php echo $value['title']; ?>
      </p>
       <img src="images/Science-lab.jpg" class="img-rounded" width="320" height="236" >
    </div>

    </tr>
 <?php endforeach; ?>
   
 </div>
</div>
	</div>
	</div>
</div>