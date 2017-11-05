<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <link href="<?php echo base_url; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url; ?>/css/admin-style.css" rel="stylesheet" type="text/css">
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
                <a class="navbar-brand" href="<?php echo base_url; ?>/admin">
                    <i class="fa fa-shopping-basket header_icons"></i> E-Commerce
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url; ?>/admin">
                            <i class="fa fa-home header_icons"></i> Home
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!--<li></li>-->
<!--                        <a href="<?php echo base_url; ?>/signin/">
                            <i class="fa fa-sign-in header_icons" ></i> Sign In
                        </a>-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-user header_icons"></i> username <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-cog header_icons"></i> Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>