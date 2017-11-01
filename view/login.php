<?php
require_once '../config/site-config.php';
require_once './includes/header.php';
?>
<div class="container">
    <div class="form-container">
        <form method="post">
            <h2>Sign in.</h2><hr />
            <div class="form-group">
                <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="txt_password" placeholder="Your Password" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
                <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                    <i class="fa fa-sign-in"></i>&nbsp;SIGN IN
                </button>
            </div>
            <br />
            <label>Don't have account yet? <a href="<?php echo base_url?>/signup">Sign Up</a></label>
        </form>
    </div>
</div>
<?php
require_once './includes/footer.php';
