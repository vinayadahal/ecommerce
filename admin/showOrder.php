<?php
require_once '../config/site-config.php';
require_once './templates/header.php';
require_once './controller/order-controller.php';
?>
<div class="container">
    <h1>Order Preview</h1>
    <table class="table">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Offer</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (isset($product_details)) {
                $i = 1;
                $grand_total=0;
                foreach ($product_details as $prd) {
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $prd['title']; ?></td>
                        <td><img src="<?php echo base_url; ?>/admin/images/<?php echo $prd['image']; ?>" width="100"/></td>
                        <td><?php echo $prd['offer']; ?></td>
                        <td><?php echo $prd['quantity']; ?></td>
                        <td>Rs. <?php echo $prd['price']; ?> /-</td>
                    </tr>
                    <?php
                    $grand_total = $grand_total + $prd['price'];
                }
            } else {
                ?>
                <tr><td colspan="4"><p>No details found......</p></td>
                <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td><strong>Grand Total: Rs.<span id="grand_total"><?php echo $grand_total; ?></span>/-</strong></td>
            </tr>
        </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Customer Details</h4>
        <?php
        foreach ($_SESSION['customer_detail'] as $custRow) {
            ?>
            <p>Full Name: <?php echo $custRow['firstname']; ?>  <?php echo $custRow['lastname']; ?></p>
            <p>Email: <?php echo $custRow['email']; ?></p>
            <p>Phone: <?php echo $custRow['phone']; ?></p>
            <p>Address: <?php echo $custRow['address']; ?></p>
            <p>Choose Your Payment Method: </p>
            <p>
            <form>
                <label class="radio-inline">
                    <input type="radio" name="optradio" value="cod" checked="checked" />Cash on Delivery
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optradio" value="esewa" />esewa
                </label>
            </form>
            </p>
        <?php } ?>
    </div>
    <div class="footBtn">
        <a href="<?php echo base_url; ?>" class="btn btn-warning">
            <i class="fa fa-arrow-left"></i> Continue Shopping
        </a>
        <a href="<?php echo base_url ?>/order" class="btn btn-success orderBtn">
            Place Order <i class="fa fa-download"></i>
        </a>
    </div>
</div>
<?php
require_once './templates/footer.php';
