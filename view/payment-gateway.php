<?php
require_once '../config/site-config.php';
require_once './templates/header.php';
session_start();
if (!empty($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
    $_SESSION['cart_items'] = array_values($_SESSION['cart_items']); // rearranging array before unset
}
$_SESSION['grand_total'] = 0;
?>
<body>
    <div class="container">
        <h1>Order Preview</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($_SESSION['cart_items']) && $_SESSION['cart_items'] != 0) {
                    foreach ($_SESSION['cart_items'] as $item) {
                        ?>
                        <tr>
                            <td><?php echo $item["title"]; ?></td>
                            <td><?php echo $item["price"] . ' Rs'; ?></td>
                            <td><?php echo $item["qty"]; ?></td>
                            <td><?php echo $item["subtotal"] . ' Rs'; ?></td>
                        </tr>
                        <?php
                        $_SESSION['grand_total'] = $_SESSION['grand_total'] + $item["subtotal"];
                    }
                } else {
                    ?>
                    <tr><td colspan="4"><p>No items in your cart......</p></td>
                    <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Grand Total: Rs.<span id="grand_total"><?php echo $_SESSION['grand_total']; ?></span>/-</strong></td>
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
</body>
</html>
<?php
require_once './templates/footer.php';
