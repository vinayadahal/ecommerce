<?php
require_once '../config/site-config.php';
require_once './controller/user-controller.php';
require_once './templates/header.php';
?>
<div class="container">
    <h1>Category List</h1>
    <a href="<?php echo base_url ?>/admin/createUser/" class="btn btn-success" style="float: right;">
        <i class="fa fa-plus"></i> Add User
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Username</th>
                <th>Email</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($result as $items) { ?>
                <tr class="item">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $items['username']; ?></td>
                    <td><?php echo $items['email']; ?></td>
                    <td width="50"><a href="<?php echo base_url ?>/admin/editUser/<?php echo $items['id']; ?>/" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                    <td width="50"><a href="<?php echo base_url ?>/admin/deleteUser/<?php echo $items['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
require_once './templates/footer.php';
