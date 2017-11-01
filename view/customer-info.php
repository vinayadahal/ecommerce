<?php
require_once '../config/site-config.php';
require_once './includes/header.php';
session_start();
?>
<div class="container">
    <div class="form-container">
        <form method="post" onsubmit="return signup_validation();" action="<?php echo base_url?>/getUserInfo/">
            <h2>Please provide your information</h2><hr />
            <table class="form_table">
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" id="id1" /></td>
                    <td>Last Name:</td>
                    <td><input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" id="id2"/></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td colspan="4"><input type="text" class="form-control" name="email" placeholder="Enter Email Address" id="id3"/></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td colspan="4"><input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" id="id4"/></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td colspan="4"><input type="text" class="form-control" name="address" placeholder="Enter Address" id="id5"/></td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td colspan="4">
                        <select class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Username :</td>
                    <td colspan="4"><input type="text" class="form-control" name="uname" placeholder="Enter Username" id="id6"/></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td colspan="4"><input type="password" class="form-control" name="pass" placeholder="Enter Password" id="pass1"/></td>
                </tr>
                <tr>
                    <td>Confirm Password :</td>
                    <td colspan="4"><input type="password" class="form-control" name="cpass" placeholder="Confirm Password" id="pass2"/></td>
                </tr>
            </table>
            <hr />
            <div class="form_div">
                <button type="submit" class="btn btn-primary form_btn">
                    <i class="fa fa-upload"></i> Submit
                </button>
                <?php if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) != 0) { ?>
                    <button class="btn btn-danger form_btn" style="margin-left: 10px;" onclick="confirm('Do you want to discard your order?')">
                        <i class="fa fa-close"></i> Cancel Order
                    </button>
                <?php } ?>
            </div>
            <br />
            <label>Have an account? <a href="<?php echo base_url ?>/signin/">Sign In</a></label>
            <br />
            <br />
        </form>
    </div>
</div>
<?php
require_once './includes/footer.php';
