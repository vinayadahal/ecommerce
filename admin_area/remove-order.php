<?php
include_once 'includes/dbconfig.php';

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if(isset($_POST['btn-remove']))
{
 $id = $_GET['remove_id'];
 $crud->removeOrder($id);
 header("Location: remove-order.php?removed"); 
}

?>

<?php include_once 'templates/header.php'; ?>

<div class="clearfix"></div>

<div class="container">

 <?php
 if(isset($_GET['removed']))
 {
  ?>
        <div class="alert alert-success">
     <strong>Success!</strong> record was removed from...But is still in Database 
  </div>
        <?php
 }
 else
 {
  ?>
        <div class="alert alert-danger">
     <strong>Sure !</strong> to remove the following Order ? 
  </div>
        <?php
 }
 ?> 
</div>

<div class="clearfix"></div>

<div class="container">
  
  <?php
  if(isset($_GET['remove_id']))
  {
   ?>
         <table class='table table-bordered'>
         <tr>
            <th>Order ID</th>    
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Total Price</th>
            <th>Date Created</th>
         </tr>
         <?php
         
         $stmt = $DB_con->prepare("SELECT c.firstname,c.lastname,c.phone,c.address ,o.id,o.total_price,o.created FROM customers c,orders o where c.id= o.customer_id && o.id=:id");
         $stmt->execute(array(":id"=>$_GET['remove_id']));
         while($row=$stmt->fetch(PDO::FETCH_ASSOC))
         {
             ?>
             <tr>
             <td><?php print($row['id']); ?></td>
             <td><?php print($row['firstname']); ?></td>
             <td><?php print($row['lastname']); ?></td>
             <td><?php print($row['address']); ?></td>
           <td><?php print($row['total_price']); ?></td>
           <td><?php print($row['created']); ?></td>
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
  }
  ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['remove_id']))
{
 ?>
   <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-remove"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="orders.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
 <?php
}
else
{
 ?>
<a href="orders.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div> 
<?php include_once 'templates/footer.php'; ?>