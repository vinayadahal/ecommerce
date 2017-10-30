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
                <a class="navbar-brand" href="<?php echo base_url; ?>">Bakery</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url; ?>"><i class="fa fa-home fa-2x"></i> Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search Products Here">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url; ?>/shopping-cart/" class="cart-link">
                            <i class="fa fa-shopping-cart fa-2x"></i> Shopping Cart 
                            <?php if (isset($_SESSION['cart_items'])) { ?>
                                <sup id="item_count" class="item_count" style="display: initial;"><?php echo count($_SESSION['cart_items']); ?></sup>
                            <?php } else { ?>
                                <sup id="item_count" class="item_count"></sup>
                                <?php } ?>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user fa-2x" ></i> User Account 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php?logout=true">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>