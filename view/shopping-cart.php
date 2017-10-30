<?php
require_once '../model/product.php';
require_once './includes/header.php';
session_start();
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
        <tbody>
            <?php
            if (!empty($_SESSION["cart_items"])) {
                $cartItems = $_SESSION["cart_items"];
                $i = 1;
                foreach ($cartItems as $item) {
                    ?>
                    <tr id="item<?php echo $i; ?>">
                        <td><?php echo $item["title"]; ?></td>
                        <td>Rs. <?php echo $item["price"]; ?>/-</td>
                        <td>
                            <input type="number" min="1" max="<?php echo $item['max_quantity']; ?>"  class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="update_itemCount('<?php echo base_url; ?>/updateCount/<?php echo $i; ?>', this);">
                        </td>
                        <td id="subtotal<?php echo $i; ?>">
                            Rs. <?php echo $item["subtotal"]; ?>/-
                        </td>
                        <td>
                            <a onclick="removeFromCart('<?php echo base_url; ?>/removeFromCart/<?php echo $i; ?>')" link="" href="javascript:void(0);" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $i++;
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
                        <i class="fa fa-list"></i> Continue Shopping
                    </a>
                </td>
                <td colspan="2"></td>
                <?php // if ($cart->total_items() > 0) { ?>
                    <td class="text-center" id="grand_total"><strong>Total <?php // echo '$' . $cart->total() . ' USD'; ?></strong></td>
                    <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-arrow-circle-right"></i></a></td>
                        <?php // } ?>
            </tr>
        </tfoot>
    </table>
</div>
<?php
require_once './includes/footer.php';
