<?php
require_once '../config/site-config.php';
require_once './controller/products-controller.php';
require_once './templates/header.php';
?>
<div class="container">
    <div class="form-container">
        <form method="post" onsubmit="return signup_validation();" action="<?php echo base_url ?>/admin/addProduct/" enctype="multipart/form-data">
            <h2>Create Product</h2><hr/>
            <table class="form_table">
                <tr>
                    <td>Product Name:</td>
                    <td><input type="text" name="name" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Product Image:</td>
                    <td>
                        <img src="#" width="180" id="imagePreview" style="display: none;"/>
                        <input type="file" name="imageFile" id="fileToUpload">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select class="form-control" name="category_id">
                            <?php
                            $allCate = (new product())->get_all_category();
                            foreach ($allCate as $categories) {
                                ?>
                                <option value="<?php echo htmlspecialchars($categories['category_id']); ?>"><?php echo htmlspecialchars($categories['category_title']); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" class="form-control"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Offer:</td>
                    <td><input type="text" name="offer" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Quantity:</td>
                    <td><input type="number" name="quantity" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" class="form-control" /></td>
                </tr>
            </table>
            <hr/>
            <button type="submit" class="btn btn-primary form_btn">
                <i class="fa fa-upload"></i> Create
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
