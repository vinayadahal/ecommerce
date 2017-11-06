<?php
require_once '../config/site-config.php';
require_once './templates/header.php';
require_once './controller/order-controller.php';
?>
<div class="container">
    <h1>Order List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Customer Name</th>
                <th>Total Price</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($customer_order as $order_details) { ?>
                <tr class="item">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $order_details['customer_name']; ?></td>
                    <td><?php echo $order_details['total_price']; ?></td>
                    <td width="50"><a href="<?php echo base_url ?>/admin/showOrders/<?php echo $order_details['order_id'];?>/" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                    <td width="50"><a href="<?php echo base_url ?>/admin/editCategory/<?php // echo $items['category_id'];   ?>/" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    <td width="50"><a href="<?php echo base_url ?>/admin/deleteCategory/<?php // echo $items['category_id'];   ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
require_once './templates/footer.php';
