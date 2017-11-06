<?php
require_once '../config/site-config.php';
require_once '../service/helper-method.php'; // write some if login check
if (!checkLogin()) {
    header("Location: " . base_url . "/admin/login");
}
require_once './templates/header.php';
?>
<div class="dashboard">

    <div class="item col-lg-3">
        <div class="thumbnail">
            <a href="<?php echo base_url ?>/admin/categories/" class="dashboard_icons"><i class="fa fa-tasks fa-5x" ></i>Categories</a>
        </div>
    </div>
    <div class="item col-lg-3">
        <div class="thumbnail">
            <a href="<?php echo base_url ?>/admin/products/" class="dashboard_icons"><i class="fa fa-truck fa-5x" ></i>Products</a>
        </div>
    </div>
    <div class="item col-lg-3">
        <div class="thumbnail">
            <a href="<?php echo base_url ?>/admin/orders/" class="dashboard_icons"><i class="fa fa-ticket fa-5x" ></i> Order Details</a>
        </div>
    </div>
    <div class="item col-lg-3">
        <div class="thumbnail">
            <a href="<?php echo base_url ?>/admin/users/" class="dashboard_icons"><i class="fa fa-users fa-5x" ></i>Users</a>
        </div>
    </div>

</div>

<?php
require_once './templates/footer.php';
