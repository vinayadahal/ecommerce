<?php
include_once 'includes/dbconfig.php';

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

?>

<?php include_once 'templates/header.php'; ?>

<div class="clearfix"></div>

<div class="container">
</div>

<div class="clearfix"></div>

<div class="container">
  
  <?php
  if(isset($_GET['id']))
  {
   ?>
         <table class='table table-bordered'>
         <tr>
            <th>Order ID </th>    
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sub Total Price</th>
            <th>Shipping Address</th>
            <th>Date Issued</th>
            
         </tr>
         <tr>
         <?php
       
         $stmt = $DB_con->prepare("SELECT oi.order_id , o.total_price,o.created, oi.quantity, p.title,p.price,c.address  from order_items oi, products p, orders o, customers c where order_id=:id && oi.product_id=p.id && o.id=oi.order_id && c.id=o.customer_id ");
         $stmt->execute(array(":id"=>$_GET['id']));
         while($row=$stmt->fetch(PDO::FETCH_ASSOC))
         {
             ?>
             
             <td><?php print($row['order_id']); ?></td>
             <td><?php print($row['title']); ?></td>
             <td><?php print($row['quantity']); ?></td>
            <td><?php print($row['price']); ?></td>
             <td><?php
                $total= $row['price']*$row['quantity'];
             print $total; ?></td>
             <td><?php print($row['address']); ?></td>
            <td><?php print($row['created']); ?></td>
             </tr>
             
             <?php
         }
        
         ?> 
             
         </table>
         <a href="orders.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to Orders</a></tr>
         <?php 
  }
  
  ?>
</div>
<div class="container">
</div> 
<?php include_once 'templates/footer.php'; ?>