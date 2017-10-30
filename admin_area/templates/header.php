
<html>
    <head>
       <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
       <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery-3.1.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    </head>
    <body>
<!-- Header -->
    <nav class="navbar navbar-default" style="border-radius:0px">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="admindashboard.php"><b>Manage Products</b></a>
        <ul class="nav navbar-nav">
            <li class=""><a href="customerdetails.php"><b>Show Customer's Details</b><span class="sr-only">(current)</span></a></li>
            <li class=""><a href="orders.php"><b>Show Orders</b><span class="sr-only">(current)</span></a></li>
        </ul></br>
        <ul class="nav navbar-nav">
        <li class=""><a href=""><b>Reports</b><span class="sr-only">(current)</span></a></li>
        </ul>
        
        
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      
      <ul class="nav navbar-nav navbar-right">
          
          <a class="navbar-brand" href="add-admin.php">Add New Admin</a>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-2x" aria-hidden="true"> </i> User Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li><a href="logout.php?logout=true">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
    <!--End Header -->

    </body>
</html>

