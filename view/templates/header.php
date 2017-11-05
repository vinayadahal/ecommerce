<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <link href="<?php echo base_url; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url; ?>/css/style.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url; ?>/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url; ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <title>Home - <?php echo site_name; ?></title>
</head>
<body>
    <nav class="navbar navbar-default" style="border-radius:0px">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url; ?>">
                    <i class="fa fa-shopping-basket header_icons"></i> E-Commerce
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url; ?>">
                            <i class="fa fa-home header_icons"></i> Home
                        </a>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control searchBarInput" placeholder="Search...">
                        <button type="submit" class="btn btn-default searchBarButton" ><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url; ?>/shopping-cart/" class="cart-link">
                            <i class="fa fa-shopping-cart header_icons"></i> Shopping Cart 
                            <?php if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) != 0) { ?>
                                <sup id="item_count" class="item_count" style="display: initial;"><?php echo count($_SESSION['cart_items']); ?></sup>
                            <?php } else { ?>
                                <sup id="item_count" class="item_count"></sup>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url; ?>/signin/">
                            <i class="fa fa-sign-in header_icons" ></i> Sign In
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>