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
    <h1>Customer Details</h1>
</div>

<div class="clearfix"></div><br />

<div class="container">
     <table class='table table-bordered table-responsive'>
     <tr>
     <th>S.N</th>
     <th>Username</th>
     <th>Email</th>
     <th>Firstname</th>
     <th>Lastname</th>
     <th>Phone</th>
     <th>Address</th>
     <th>Member Since</th>
     </tr>
     <?php
  $query = "SELECT * FROM customers ";       
  $records_per_page=50;
  $newquery = $crud->paging($query,$records_per_page);
  $user->viewCustomerDetails($newquery);
  ?>
    <tr>
        <td colspan="8" align="center">
    <div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
         </div>
        </td>
    </tr>
 
</table>
          
</div>
