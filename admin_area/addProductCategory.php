<?php

include 'templates/header.php';
include_once 'includes/dbconfig.php';

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}


if(isset($_POST['btn-add']))
{
 $category_title = $_POST['category'];
 
 if($crud->addCategory($category_title))
 {
  header("Location: addProductCategory.php?inserted");
 }
 else
 {
  header("Location: addProductCategory.php?failure");
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
            <td>Category</td>
            <td><input type='text' name='category' class='form-control' required></td>
        </tr>
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-add">
      <span class="glyphicon glyphicon-plus"></span> Create New Categorys
   </button>  
                <a href="admindashboard.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to Dashboard</a>
            </td>
        </tr>
 </table>
</form>
     
     
</div>

<?php include_once 'templates/footer.php'; ?>