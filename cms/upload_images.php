 <?php
    include("init.php");
    global $labId;
 if(isset($_POST['id'])){
    $labId = $_POST['id'];
 }
    if(isset($_POST['but_upload'])){
        $name = $_FILES['file']['name'];
        $target_dir = "C:/xampp/htdocs/website/uploads/images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
        // Convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

          $sql = "INSERT INTO images (name,image,labId) VALUES ('".$name."','".$image."','".$labId."' )";
          //$params = array($data ['name'],$data ['position'],$data ['title'],$data ['comment']);
          $stmt = sqlsrv_query( $con, $sql);
            //update lab table with image
          $sql = "UPDATE labs SET imageName = '".$name."' WHERE id = '" . $labId ."'";
           $stmt = sqlsrv_query( $con, $sql);
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'C:/xampp/htdocs/website/uploads/images/'.$name);

        }
    
    }
    if ( !$stmt )
    {
        $error=sqlsrv_error();
        echo "<script type='text/javascript'>alert(<?php echo $error; ?>);</script>";
    } 
    else
    {
        echo '<script type="text/javascript">alert("File ' . $name . ' Uploaded! ");</script>';
        // echo "<script type='text/javascript'>alert('File Uploaded!');</script>";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>