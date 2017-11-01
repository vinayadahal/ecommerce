<?php
require_once '../model/product.php';
require_once './includes/header.php';
session_start();
$grand_total = 0;
?>
<div class="container">
    <h1>Shopping Cart</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tbl_content">
            <?php
            if (!empty($_SESSION["cart_items"])) {
                $cartItems = $_SESSION["cart_items"];
                $i = 1;
                foreach ($cartItems as $item) {
                    ?>
                    <tr id="item<?php echo $i; ?>" class="item">
                        <td><?php echo $item["title"]; ?></td>
                        <td>Rs. <?php echo $item["price"]; ?>/-</td>
                        <td>
                            <input type="number" min="1" max="<?php echo $item['max_quantity']; ?>"  class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="update_itemCount('<?php echo base_url; ?>/updateCount/<?php echo $i; ?>', this);"> / <?php echo $item['max_quantity']; ?>
                        </td>
                        <td>
                            Rs. <span id="subtotal<?php echo $i; ?>"><?php echo $item["subtotal"]; ?></span>/-
                        </td>
                        <td>
                            <a onclick="removeFromCart('<?php echo base_url; ?>/removeFromCart/<?php echo $i; ?>')" link="" href="javascript:void(0);" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    $grand_total = $grand_total + $item["subtotal"];
                }
            } else {
                ?>
                <tr><td colspan="5"><p>Your cart is empty.....</p></td>
                <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <a href="<?php echo base_url; ?>" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i> Continue Shopping
                    </a>
                </td>
                <td colspan="2"></td>
                <td><strong>Grand Total: Rs.<span id="grand_total"><?php echo $grand_total; ?></span>/-</strong></td>
                <td>
                    <a href="<?php echo base_url;?>/customer-info/" class="btn btn-success btn-block">Checkout <i class="fa fa-check"></i>
                    </a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<?php
require_once './includes/footer.php';
