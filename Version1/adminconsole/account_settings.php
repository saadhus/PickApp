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

    <title>Account Settings</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
		
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i> Searchable Items <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="items_list.php"><i class="fa fa-table"></i> Item List</a></li>
                <li><a href="search_settings.php"><i class="fa fa-wrench"></i> Search Settings</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tags"></i> Promotions <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="promotions.php"><i class="fa fa-certificate "></i> Promotions List</a></li>
                <li><a href="promotions_settings.php"><i class="fa fa-wrench"></i> Promotions Settings</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Subscription <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="subscription.php"><i class="fa fa-envelope-o"></i> Send Message</a></li>
                <li><a href="subscription_settings.php"><i class="fa fa-wrench"></i> Subscription Settings</a></li>
              </ul>
            </li>
            <li><a href="statistics.php"><i class="fa fa-bar-chart-o"></i> Statistics</a></li>
			<li><a href="posters.php"><i class="fa fa-file"></i> Posters</a></li>
			<li><a href="help.php"><i class="fa fa-question"></i> Help</a></li>
			<li class="active"><a href="account_settings.php"><i class="fa fa-wrench"></i> Account Settings</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Account Settings <small>suspend or change your account settings</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-wrench"></i> Account Settings</li>
            </ol>
          </div>
        </div><!-- /.row -->

		<div class="row">
			
			<div class="col-lg-12"><h2>
				<label><input id="rdb1" type="radio" name="toggler" value="1"  />Disable</label>
				<br>
				<label><input id="rdb2" type="radio" name="toggler" value="2" />Enable</label></h2>
				<div id="blk-2" class="toHide" style="display:none">
					<!--Actual Subscription settings-->
					<br>
					<b><h3>Text "SUBSCRIBE" to $storeNumber to get added to mailing list</h3></b><br>
						<div class="col-lg-6">
						<div class="bs-example">
							<table class="table table-bordered">
							  <thead>
								<tr>
								  <th><h3><center>Welcome Message</center></h2></th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <td rowspan="2"><center>MILLA PULL $welcomeMessage FROM DATABASE HERE!</center></td>
								</tr>
							  </tbody>
							</table>
						</div>
						</div>
						<div class="col-lg-6">
						<div class="bs-example">
							<table class="table table-bordered">
							  <thead>
								<tr>
								  <th><h3><center>Goodbye Message</center></h2></th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <td rowspan="2"><center>MILLA PULL $goodbyeMessage FROM DATABASE HERE!</center></td>
								</tr>
							  </tbody>
							</table>
						</div>
						</div>
					<!--End Subscription settings-->
				</div>
			</div>
			
        </div><!-- /.row -->
		
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/activate.js"></script>
	<script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>