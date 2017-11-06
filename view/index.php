<?php
require_once '../config/site-config.php';
require_once '../model/product.php';
$product = new product();
require_once '../service/helper-method.php';
session_start();

if (!empty($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
    $_SESSION['cart_items'] = array_values($_SESSION['cart_items']); // rearranging array before unset
}

//session_destroy();
require_once './templates/header.php';
?>

<div class="container">
    <h1>All Products</h1>
    <div id="products" class="row list-group">
        <?php
        $result = $product->list_product();
        $i = 0;
        foreach ($result as $row) {
            if (isset($_SESSION['cart_items'])) {
                if (searchArray("id", $row["id"], $_SESSION['cart_items'])) {
                    continue;
                }
            }
            if ($row['quantity'] <= 0) {
                continue;
            }
            $category_name = $product->get_category($row["category_id"]);
            ?>
            <div class="item col-lg-3" id="thumb<?php echo $row["id"]; ?>" link="<?php echo base_url; ?>/addToCart/<?php echo $row["id"]; ?>">
                <div class="thumbnail" >
                    <div class="caption ">
                        <div class="thumbnail">
                            <img src="<?php echo base_url; ?>/admin/images/<?php echo $row["image"]; ?>" alt="item image">
                        </div>
                        <div id="product_title" class="product_title">
                            <h4 class="list-group-item-heading"><?php echo $row["title"]; ?></h4>
                        </div>
                        <div class="product_offer">
                            <?php if (!empty($row["offer"])) { ?>
                                <i class="fa fa-info-circle"></i> <?php echo $row["offer"]; ?>
                            <?php } ?>
                        </div>
                        <div class="price_btn">
                            <p>Rs. <?php echo $row["price"]; ?> /-</p>
                            <a class="btn btn-success" href="javascript:void(0);" onclick="hide_product('thumb<?php echo $row["id"]; ?>')">Add To Cart</a>
                            <a class="btn btn-info" style="float: right;" href="javascript:void(0);" onclick="hide_product('thumb<?php echo $row["id"]; ?>')" >View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        if (empty($result)) {
            ?>
            <p>Product(s) not found.....</p>
        <?php } ?>
    </div>
</div>
<?php
require_once './templates/footer.php';
