<?php
include_once 'includes/dbconfig.php';
?>
<?php include_once 'templates/header.php'; 

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

?>

<div class="clearfix"></div>

<div class="container">
    <h1>Manage Products Below</h1>
<a href="add-product.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Product</a>
<a style="float: right" href="addProductCategory.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add New Product Category</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
     <table class='table table-bordered table-responsive'>
     <tr>
     <th>S.N</th>
     <th>Product Title</th>
     <th>Product Price</th>
     <th>Category</th>
     <th>Description</th>
     <th>Image</th>
     <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
  $query = "SELECT c.* , p.* FROM categories c,products p WHERE c.category_id=p.category_id ";       
  $records_per_page=3;
  $newquery = $crud->paging($query,$records_per_page);
  $crud->dataview($newquery);
  ?>
    <tr>
        <td colspan="7" align="center">
    <div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
         </div>
        </td>
    </tr>
 
</table>
          
</div>
