<?php
require_once '../config/site-config.php';
require_once './controller/order-controller.php';
require_once './templates/header.php';
?>
<div class="container">
    <h1>Order Details</h1>
    <table class="table">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Image</th>
                <th>Name</th>
                <th>Offer</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($result_product)) {
                $i = 1;
                $grand_total = 0;
                foreach ($result_product as $products) {
                    $product_details = $product->get_product($products['product_id']);
                    foreach ($product_details as $prd) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><img src="<?php echo base_url; ?>/admin/images/<?php echo $prd['image']; ?>" width="100"/></td>
                            <td><?php echo $prd['title']; ?></td>
                            <td><?php echo $prd['offer']; ?></td>
                            <td><?php echo $prd['quantity']; ?></td>
                            <td>Rs. <?php echo $prd['price']; ?> /-</td>
                        </tr>
                        <?php
                        $grand_total = $grand_total + $prd['price'];
                    }
                }
            } else {
                ?>
                <tr><td colspan="4"><p>No details found......</p></td>
                <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" align="right"><strong>Grand Total: Rs.<span id="grand_total"><?php echo $grand_total; ?></span>/-</strong></td>
            </tr>
        </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Customer Details</h4>
        <?php
        if (isset($result_customer)) {
            foreach ($result_customer as $custRow) {
                ?>
                <p>Full Name: <?php echo $custRow['firstname']; ?>  <?php echo $custRow['lastname']; ?></p>
                <p>Email: <?php echo $custRow['email']; ?></p>
                <p>Phone: <?php echo $custRow['phone']; ?></p>
                <p>Address: <?php echo $custRow['address']; ?></p>
                <?php
            }
        }
        ?>
    </div>
    <div class="footBtn">
        <a href="<?php echo base_url ?>/admin/deliverOrder/<?php echo $id; ?>" class="btn btn-success orderBtn">
            Deliver <i class="fa fa-send"></i>
        </a>
    </div>
</div>
<?php
require_once './templates/footer.php';
