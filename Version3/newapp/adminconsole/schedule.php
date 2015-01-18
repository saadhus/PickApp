<?php
	include_once "../accesscontrol.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Schedule Messages</title>

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
			<li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Subscription <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="subscription.php"><i class="fa fa-envelope-o"></i> Send Message</a></li>
				<li><a href="schedule.php"><i class="fa fa-calendar"></i> Schedule Messages</a></li>
                <li><a href="subscription_settings.php"><i class="fa fa-wrench"></i> Subscription Settings</a></li>
              </ul>
            </li>
            <li><a href="statistics.php"><i class="fa fa-bar-chart-o"></i> Statistics</a></li>
			<li><a href="posters.php"><i class="fa fa-file"></i> Posters</a></li>
			<li><a href="help.php"><i class="fa fa-question"></i> Help</a></li>
			<li><a href="account_settings.php"><i class="fa fa-wrench"></i> Account Settings</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Schedule Messages <small>schedule messages to be sent out in the future</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-calendar"></i> Schedule Messages</a></li>
            </ol>
          </div>
        </div><!-- /.row -->
		
		
		
				
		<div class="row">
		
			<div class="col-md-12">
				<div class="col-md-12 hero-unit">
					<center><h2>Schedule Messages</h2></center>
					<br>
					<br>
					<div class="hero-plain">
						<h1>There was supposed to be a calender here, but I suck at life, so I couldnt get it to work. I will implement it eventually</h1>
					</div>
				</div>
			</div>

		</div><!--End Row-->
		
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>