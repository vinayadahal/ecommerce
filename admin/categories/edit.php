<?php
require_once '../../config/site-config.php';
require_once '../templates/header.php';
//require_once '../../controller/categories-controller.php';
?>
<div class="container">
    <div class="form-container">
        <form method="post" onsubmit="return signup_validation();" action="<?php echo base_url ?>/admin/updateCategory/">
            <h2>Edit Category</h2><hr/>
            <table class="form_table">
                <tr>
                    <td>Category Name:</td>
                    <td><input type="text" name="category_name" class="form-control" value="<?php echo $items['category_title']; ?>" /></td>
                </tr>
            </table>
            <input type="hidden" value="<?php echo $items['category_id']; ?>" name="category_id">
            <hr/>
            <button type="submit" class="btn btn-primary form_btn">
                <i class="fa fa-upload"></i> Update
            </button>
        </form>
    </div>
</div>
<?php
require_once '../templates/footer.php';
