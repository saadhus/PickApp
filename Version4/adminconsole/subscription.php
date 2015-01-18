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

    <title>Send Messages</title>

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
            <h1>Send Message <small>send a message to your mailing list subscribers</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-calendar"></i> Send Message</a></li>
            </ol>
          </div>
        </div><!-- /.row -->
		
		<div class="row">
          <div class="col-lg-6">
			
			<div class="breadcrumb">
				<br>
				<center><h2>Test SUBSCRIBE TO $twilioNum</h2></center>
				<br>
			</div>

          </div>
		  <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-group fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">$uniqueSubscribers</p>
                    <p class="announcement-text">Unique Subscribers!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
		  <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">$messagesSent</p>
                    <p class="announcement-text">Total messages sent!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div><!--End Row-->
		
		<!--<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6 hero-unit">
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
		<div class="col-md-3">
		</div>
		</div><!--End Row-->
		
		<div class="row">
		<div class="col-md-6">
			<div class="col-md-12 hero-unit">
				<center><h2>Send Message</h2></center>
				<br>
				<br>
				<div class="hero-plain">
					<textarea class="form-control" rows="6"></textarea>
					</br>
					<center><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Send Message</button></center>
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
							  </div>
							  <div class="modal-body">
								Your messages will be sent to all your subscribers at once. It's best to make sure the message is perfect before sending it.
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Edit</button>
								<button type="button" class="btn btn-primary">Send Message</button>
							  </div>
							</div>
						  </div>
						</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 hero-unit" >
			<table class="table table-bordered">
			  <thead>
				<tr>
				  <th><h3><center>Sent Messages</center></h2></th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td><center>MILLA PULL $welcomeMessage FROM DATABASE HERE!</center></td>
				</tr>
				<tr>
				  <td><center>MILLA PULL $welcomeMessage FROM DATABASE HERE!</center></td>
				</tr>
				<tr>
				  <td><center>MILLA PULL $welcomeMessage FROM DATABASE HERE!</center></td>
				</tr>
				<tr>
				  <td><center>MILLA PULL $welcomeMessage FROM DATABASE HERE!</center></td>
				</tr>
				<tr>
				  <td><center>MILLA PULL $welcomeMessage FROM DATABASE HERE!</center></td>
				</tr>
				<tr>
				  <td><center>MILLA PULL $welcomeMessage FROM DATABASE HERE!</center></td>
				</tr>
				
			  </tbody>
			</table>
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