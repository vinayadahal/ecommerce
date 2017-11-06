<?php
require_once '../config/site-config.php';
require_once './controller/user-controller.php';
require_once './templates/header.php';
?>
<div class="container">
    <div class="form-container">
        <form method="post" onsubmit="return signup_validation();" action="<?php echo base_url ?>/admin/addUser/">
            <h2>Create User</h2><hr/>
            <table class="form_table">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="email" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="pass" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="cpass" class="form-control" /></td>
                </tr>
            </table>
            <hr/>
            <button type="submit" class="btn btn-primary form_btn">
                <i class="fa fa-upload"></i> Create
            </button>
        </form>
        <a href="<?php echo base_url ?>/admin/users">
            <button class="btn btn-danger form_btn" style="margin-left: 10px;">
                <i class="fa fa-close"></i> Cancel
            </button>
        </a>
    </div>
</div>
<?php
require_once './templates/footer.php';
