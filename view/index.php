<?php
require_once '../config/site-config.php';
require_once '../model/product.php';
$product = new product();
require_once '../service/helper-method.php';
session_start();
//session_destroy();
require_once './includes/header.php';
?>

<div class="container">
    <h1>All Products</h1>
    <div id="products" class="row list-group">
        <?php
        $result = $product->list_product();
        $i = 0;
        foreach ($result as $row) {
            if (isset($_SESSION['cart_items'])) {
                if (searchArray("title", $row["title"], $_SESSION['cart_items'])) {
                    continue;
                }
            }
            if ($row['quantity'] <= 0) {
                continue;
            }
            $category_name = $product->get_category($row["category_id"]);
            ?>
            <div class="item col-lg-4" id="thumb<?php echo $row["id"]; ?>" link="<?php echo base_url; ?>/addToCart/<?php echo $row["id"]; ?>">
                <div class="thumbnail" >
                    <div class="caption">
                        <h4 class="list-group-item-heading"><?php echo $row["title"]; ?></h4>
                        <p class="list-group-item-text">
                            <img src="<?php echo base_url; ?>/admin_area/images/<?php echo $row["image"]; ?>" style="height: 200px; width: 330px" alt="item image">
                        </p>
                        <!--</br>-->
                        <p class="list-group-item-text"><?php $row["description"]; ?></p>
                        <!--</br>-->
                        <p class="lead">Category: <?php echo $category_name[0]["category_title"]; ?></p>
                        <div class="row">

                            <div class="col-md-6">
                                <!--<p class="lead">-->
                                <?php echo $row["price"] . ' Rs'; ?>
                                <!--</p>-->
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success" href="javascript:void(0);" onclick="hide_product('thumb<?php echo $row["id"]; ?>')" >Add to cart</a>
                            </div>
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
require_once './includes/footer.php';
