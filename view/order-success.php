<?php
require_once '../config/site-config.php';
session_start();
session_destroy();
require_once './templates/header.php';
?>
<div class="container">
    <h1>Order Status</h1>
    <p>Your order has submitted successfully. One of our agents will contact you shortly.</p>
</div>
<?php
require_once './templates/footer.php';
