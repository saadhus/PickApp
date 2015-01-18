<?php
	include_once "../accesscontrol.php";
	include_once "user-db-pulls.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SOMEAPPNAME Admin console</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
		<a class="navbar-brand" href="dashboard.php">SOMEAPPNAME</a>
        </div>
		
		<!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="inventory.php"><i class="fa fa-table"></i> Inventory</a></li>
			<li><a href="promotions.php"><i class="fa fa-tags"></i> Promotions</a></li>
            <li><a href="statistics.php"><i class="fa fa-bar-chart-o"></i> Statistics</a></li>
			<li><a href="posters.php"><i class="fa fa-file"></i> Posters</a></li>
			<li><a href="admincontact.php"><i class="fa fa-envelope-o"></i> Contact</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Dashboard <small>Statistics Overview</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Welcome to 'SOMEAPPNAME' Admin Console!  
            </div>
			<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              We will provide any notifications or issues on this page. 
            </div>
			<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Please use the Inventory system on the right to input your items to make them searchable  
            </div>
			<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              The Statistics page on the right will provide you with information on on your shoppers  
            </div>
			<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              You can buy Posters advertising your store's SOMEAPPNAME number. 
            </div>
			<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              If you have any issues or concerns, please use the Contact tab on the right to reach us. We will be sure to get back to you as soon as possible. 
            </div>
          </div>
        </div><!-- /.row -->
		
		<div class="col-md-1">
		</div>

		<div class="col-md-10 hero-unit">
			<center>
			<h1><? echo $_SESSION['store_name']; ?></h1>
			</center>
			<br><br>
			<table class="table table-bordered table-hover tablesorter inventory-list">
				<thead>
				  <tr>
					<th>#</th>
					<th colspan="2">Item <i class="fa fa-sort"></i></th>
					<th>Location <i class="fa fa-sort"></i></th>
					<th>Promotions <i class="fa fa-sort"></i></th>
				  </tr>
				</thead>
			  <tbody>
				<tr>
				  <td>1</td>
				  <td colspan="2"><div contenteditable> Wonder Bread</div></td>
				  <td><div contenteditable> Aisle 2</div></td>
				  <td><div contenteditable> This bread is wonderful!</div></td>
				</tr>
				<tr>
				  <td>1</td>
				  <td colspan="2"><div contenteditable> Uonder Bread</div></td>
				  <td><div contenteditable> Bisle 2</div></td>
				  <td><div contenteditable> Le bread is wonderful!</div></td>
				</tr>
				<tr>
				  <td>1</td>
				  <td colspan="2"><div contenteditable> Vonder Bread</div></td>
				  <td><div contenteditable> Cisle 2</div></td>
				  <td><div contenteditable> Si bread is wonderful!</div></td>
				</tr>
				<!--<tr>
				  <td>1</td>
				  <td colspan="2">
					<form role="form">
						<input type="items" class="form-control" id="itemB1" placeholder="Bread, Milk, Screws, Ties etc.">
					</form>
				  </td>
				  <td>
					<form role="form">
						<input type="items" class="form-control" id="itemB2" placeholder="Bread, Milk, Screws, Ties etc.">
					</form>
				  </td>
				</tr>
				<tr>
				  <td>1</td>
				  <td colspan="2">
					<form role="form">
						<input type="items" class="form-control" id="itemB1" placeholder="Bread, Milk, Screws, Ties etc.">
					</form>
				  </td>
				  <td>
					<form role="form">
						<input type="items" class="form-control" id="itemB2" placeholder="Bread, Milk, Screws, Ties etc.">
					</form>
				  </td>
				</tr>-->
			  </tbody>
			</table>
			<a href="#" title="" class="add-items">Add item</a>
		</div>
		
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>