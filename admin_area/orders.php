<?php
include_once 'includes/dbconfig.php';
?>
<?php include_once 'templates/header.php'; 

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

?>
<div class="container">
    <h1>Customer Orders</h1>
</div>

<div class="container">
     <table class='table table-bordered table-responsive'>
     <tr>
     <th>Order ID</th>    
     <th>First Name</th>
     <th>Last Name</th>
     <th>Address</th>
     <th>Total Price</th>
     <th>Date Created</th>
     <th colspan="2" >Actions</th>
     
     </tr>
     
     <?php
  $query = "SELECT c.firstname,c.lastname,c.phone,c.address ,o.id,o.total_price,o.created FROM customers c,orders o where c.id= o.customer_id && status='1'";       
  $records_per_page=25;
  $newquery = $crud->paging($query,$records_per_page);
  $crud->showOrders($newquery);
  ?>
     
    <tr>
        <td colspan="10" align="center">
    <div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
         </div>
        </td>
    </tr>
 
</table>
          
</div>