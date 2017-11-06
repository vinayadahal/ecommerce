<?php
require_once '../config/site-config.php';
require_once './controller/products-controller.php';
require_once './templates/header.php';
?>
<div class="container">
    <h1>Products List</h1>
    <a href="<?php echo base_url ?>/admin/createProduct/" class="btn btn-success" style="float: right;">
        <i class="fa fa-plus"></i> Add Product
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Offer</th>
                <th>Quantity</th>
                <th>Price</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php
            foreach ($result as $items) {
                $category_name = (new product())->get_category($items["category_id"]);
                ?>
                <tr class="item">
                    <td><?php echo $i++; ?></td>
                    <td><img src="<?php echo base_url; ?>/admin/images/<?php echo $items['image']; ?>" width="100"/></td>
                    <td><?php echo $items['title']; ?></td>
                    <td><?php echo $category_name[0]['category_title']; ?></td>
                    <td><?php echo $items['description']; ?></td>
                    <td><?php echo $items['offer']; ?></td>
                    <td><?php echo $items['quantity']; ?></td>
                    <td>Rs. <?php echo $items['price']; ?> /-</td>
                    <td><a href="<?php echo base_url ?>/admin/editProduct/<?php echo $items['id']; ?>/" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    <td><a href="<?php echo base_url ?>/admin/deleteProduct/<?php echo $items['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
require_once './templates/footer.php';
