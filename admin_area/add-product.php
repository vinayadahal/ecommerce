<?php

include 'templates/header.php';
include_once 'includes/dbconfig.php';

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}


if(isset($_POST['btn-add']))
{
 $title = $_POST['title'];
 $price = $_POST['price'];
 $category = $_POST['category'];
 $description = $_POST['description'];
 
 $imagename = $_FILES['image']['name'];
  $tmp_dir = $_FILES['image']['tmp_name'];
  $imgSize = $_FILES['image']['size'];
  
  $upload_dir = 'images/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imagename,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $image = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '2MB'
    if($imgSize < 2000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$image);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
 
 if($crud->create($title,$price,$category,$description,$image))
 {
  header("Location: add-product.php?inserted");
 }
 else
 {
  header("Location: add-product.php?failure");
 }
}
?>

<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
 ?>
    <div class="container">
 <div class="alert alert-info">
     <strong>WOW!</strong> Record was inserted successfully <a href="admindashboard.php">Back To Dashboard</a>!
 </div>
 </div>
    <?php
}
else if(isset($_GET['failure']))
{
 ?>
    <div class="container">
 <div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while inserting record !
 </div>
 </div>
    <?php
}
?>
    

<div class="clearfix"></div><br />

<div class="container">
  
    <form method='post' enctype="multipart/form-data">
 
    <table class='table table-bordered'>
 
        <tr>
            <td>Product Title</td>
            <td><input type='text' name='title' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Product Price</td>
            <td><input type='text' name='price' class='form-control' required></td>
        </tr>
        
        <tr>
            <td>Category</td>
            <td><select name='category'>
                    
                <?php
                
                $con = mysqli_connect("localhost", "root", "", "bakery");
                $get_cat = "select * from categories";
        
        $run_cats=  mysqli_query($con, $get_cat);
       
        while ($row_cats= mysqli_fetch_array($run_cats)){
            
            $id=$row_cats['category_id'];
             $title=$row_cats['category_title'];
             
             echo "<option value='$id'>$title</o>";
             
        }
        ?>
        </select>
            </td>
            
        </tr>
 
        <tr>
            <td>Description</td>
            <td><input type='text' name='description' class='form-control' required></td>
        </tr>
 
         <tr>
            <td>Image</td>
            <td><input type='file' name='image' class='form-control' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-add">
      <span class="glyphicon glyphicon-plus"></span> Create New Product
   </button>  
                <a href="admindashboard.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to Dashboard</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'templates/footer.php'; ?>