<?php
require_once '../config/site-config.php';
require_once './templates/header.php';
require_once './controller/products-controller.php';
?>
<div class="container">
    <div class="form-container">
        <form method="post" onsubmit="return signup_validation();" action="<?php echo base_url ?>/admin/updateProduct/" enctype="multipart/form-data">
            <h2>Edit Products</h2><hr/>
            <table class="form_table">
                <tr>
                    <td>Product Name:</td>
                    <td><input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($items['title']); ?>" /></td>
                </tr>
                <tr>
                    <td>Product Image:</td>
                    <td>
                        <img src="<?php echo base_url; ?>/admin/images/<?php echo $items['image']; ?>" width="180" id="imagePreview"/>
                        <input type="file" name="imageFile" id="fileToUpload">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select class="form-control" name="category_id">
                            <?php
                            $allCate = (new product())->get_all_category();
                            $result = (new product())->get_category($items['category_id']);
                            foreach ($allCate as $categories) {
                                if ($categories['category_title'] == $result[0]['category_title']) {
                                    ?>
                                    <option selected="selected" value="<?php echo htmlspecialchars($categories['category_id']); ?>"><?php echo htmlspecialchars($categories['category_title']); ?></option>
                                    <?php
                                    continue;
                                } else {
                                    ?>
                                    <option value="<?php echo htmlspecialchars($categories['category_id']); ?>"><?php echo htmlspecialchars($categories['category_title']); ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" class="form-control"><?php echo $items['description']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Offer:</td>
                    <td><input type="text" name="offer" class="form-control" value="<?php echo htmlspecialchars($items['offer']); ?>" /></td>
                </tr>
                <tr>
                    <td>Quantity:</td>
                    <td><input type="number" name="quantity" class="form-control" value="<?php echo htmlspecialchars($items['quantity']); ?>" /></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" class="form-control" value="<?php echo htmlspecialchars($items['price']); ?>" /></td>
                </tr>
            </table>
            <input type="hidden" value="<?php echo $items['id']; ?>" name="product_id">
            <hr/>
            <button type="submit" class="btn btn-primary form_btn">
                <i class="fa fa-upload"></i> Update
            </button>
        </form>
        <a href="<?php echo base_url ?>/admin/products">
            <button class="btn btn-danger form_btn" style="margin-left: 10px;">
                <i class="fa fa-close"></i> Cancel
            </button>
        </a>
    </div>
</div>
<?php
require_once './templates/footer.php';
