<?php
require_once '../config/site-config.php';
require_once './templates/header.php';
require_once './controller/login-controller.php';
?>
<div class="container">
    <div class="form-container">
        <form method="post" >
            <!--action="<?php echo base_url; ?>/admin/checkLogin"-->
            <h2>Sign In - Admin Panel</h2><hr />
            <table class="form_table">
                <tr>
                    <td width="80">Username: </td>
                    <td><input type="text" class="form-control" name="username" placeholder="Your Username" required /></td>
                </tr>
                <tr>
                    <td width="80">Password: </td>
                    <td><input type="password" class="form-control" name="pass" placeholder="Your Password" required /></td>
                </tr>
            </table>

            <!--<div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username or E mail ID" required />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass" placeholder="Your Password" required />
            </div>-->
            <hr />
            <div class="form-group">
                <button type="submit" name="btn-login" class="btn btn-primary form_btn">
                    <i class="fa fa-sign-in"></i> Submit
                </button>
            </div>
        </form>
    </div>
</div>
<?php
require_once './templates/footer.php';

