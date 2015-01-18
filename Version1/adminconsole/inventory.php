<?php //inventory.php
// allows user to insert new items into the database, view all items, filter results, and edit and delete items.
	
	ob_start();
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

    <title>Inventory</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  </head>

  <body>
  
  <!-- Jquery -->
  <script src="js/jquery-1.11.0.min.js"></script>
	
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
                <li class="active"><a href="items_list.php"><i class="fa fa-table"></i> Item List</a></li>
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
			<li><a href="account_settings.php"><i class="fa fa-wrench"></i> Account Settings</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </nav>

        <div id="page-wrapper">

			<div class="row">
			  <div class="col-lg-12">
				<h1>Inventory <small>Add all the items according to location</small></h1>
				<ol class="breadcrumb">
				  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				  <li class="active"><i class="fa fa-table"></i> Inventory</li>
				</ol>
				<div class="alert alert-info alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  Add items to a location on this tab. When a shopper searches for a keyword they will get a response with the location you inputed. 
				  </div>
			  </div>
			</div><!-- /.row -->
			
			<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#add_item" style="margin-bottom: 10px;">&nbsp &nbsp Add items&nbsp &nbsp &nbsp </button>
			<button type="button" class="btn btn-warning" style="margin-left: 10px; margin-bottom: 10px;">&nbsp &nbsp Upload CSV&nbsp &nbsp &nbsp </button>
			
			<!--<div class="row2">-->
				
				<div id="add_item" class="collapse col-md-12 hero-unit">
				<form role="form" method="post" action="inventory.php">
					<center>
					<h1>Add items to location</h1>
					</center>
					<br><br>
					<div class="col-md-12 hero-plain">
					<div class="row">
						<div class="col-md-5">
							  <div class="form-group">
								<center><h4><label for="exampleInputEmail1">Location</label></h4></center>
								<input type="text" class="form-location" name="location" placeholder="ex: Aisle 1, Produce, Clothing etc.">
							  </div>
								
						</div>
							
						<div class="col-md-2">
						<br>
						<br>
						<center><i class="fa fa-arrow-right fa-5x"></i></center>
						</div>
						
						<div class="col-md-5">
							  <div class="form-group">
								<center><label for="exampleInputEmail1"><h4>Items</h4></label></center>
								<textarea class="form-control" rows="2" name="items"></textarea>
							  </div>
						</div>
					</div>
					<br>
					<div class="row">
					
					<div class="col-md-5">
					</div>
					
					<div class="col-md-2">
					<center><button type="submit" class="btn btn-primary">&nbsp &nbsp Add items&nbsp &nbsp &nbsp </button></center>
					</div>
						
					<div class="col-md-5">
					</div>
						
					</div>
					<div id="error_msg" class="alert alert-danger" style="display: none"></div>
					</div>
					</form><!-- End of form for inventory insert -->
				</div>
			<!--</div>-->
		
			<hr>
			
			<div class="row2">
				
				<div class="col-md-1">
				</div>
				
				<div class="col-md-12 hero-unit">
					<center>
					<h1><? echo $_SESSION['store_name']; ?> Items/Locations</h1>
					</center>
					<br>
					<div class="pager" style="float: left;">
						<font color="white"> Page: </font> <select class="gotoPage"></select>
						<img src="img/first.png" class="first" alt="First" title="First page" />
						<img src="img/prev.png" class="prev" alt="Prev" title="Previous page" />
						<span style="color:white;" class="pagedisplay"></span> <!-- this can be any element, including an input -->
						<img src="img/next.png" class="next" alt="Next" title="Next page" />
						<img src="img/last.png" class="last" alt="Last" title= "Last page" />
						<select class="pagesize">
							<option selected="selected" value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option value="40">40</option>
						</select>
					</div>
					<button type="button" class="reset btn btn-info" style="margin-left: 20px; margin-top: 7px;">Reset Filters</button> <!-- targeted by the "filter_reset" option -->
					<table id="main_table" class="table table-bordered table-hover tablesorter inventory-list">
						<thead>
						  <tr>
							<th data-placeholder="# filter">#</th>
							<th data-placeholder="item filter">Item <i class="fa fa-sort"></i></th>
							<th data-placeholder="location filter" >Location <i class="fa fa-sort"></i></th>
							<th width="5%" class="filter-false remove sorter-false">Actions</th>
						  </tr>
						</thead>
					  <tbody>
					  <?php 
					  if(!isset($_POST['location']) && !isset($_POST['items'])) {
							// do nothing - no post
						}
						else
						{
							$location = mysql_real_escape_string($_POST['location']);
							$items = $_POST['items'];
							// explode items by comma and insert individually into the user table
							$items_array = explode(",", $items);
							
							// If error is caught, set to true	
							$error_found = false;
							
							// Process signup submission
							dbConnect('someappname_users_db');

							if($location=="") {
								error("No location added. Please enter a location.");
								$error_found = true;
							}
							if(!$items_array || $_POST['items']=="") {
								error("No items added. Please enter items, separated by commas.");
								$error_found = true;
							}
							
							$table_id = mysql_real_escape_string($_SESSION['table_id']);
							$table_name = $table_id . "_item_table";
							
							if(!$error_found) {
								foreach($items_array as $item) {
									$item = mysql_real_escape_string($item);
									$sql = "INSERT INTO $table_name SET
											  item_name = '$item',
											  location = '$location'";
										if (!mysql_query($sql)) {
											$error_found = true;
											error('A database error occurred in processing your '.
												  'submission.\\nIf this error persists, please '.
												  'contact you@example.com.\\n' . mysql_error());
										}
									}
							}
							
						}
					  
					  $inv_rows = getRecords('_item_table');
					  if(is_array($inv_rows)) {
					  foreach ($inv_rows as $row) { ?>
					  <tr>
						  <td><? echo $row['id']; ?></td>
						  <td><div contenteditable><? echo $row['item_name']; ?></div></td>
						  <td><div contenteditable><? echo $row['location']; ?></div></td>
						  <td><button type="button" class="remove btn btn-danger btn-xs" title="Remove this row">Delete</button></td>
						</tr>
					  <? } 
					  } // end loop ?>
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
					<div class="pager" style="float: left;">
						<font color="white"> Page: </font><select class="gotoPage"></select>
						<img src="img/first.png" class="first" alt="First" title="First page" />
						<img src="img/prev.png" class="prev" alt="Prev" title="Previous page" />
						<span style="color: white;" class="pagedisplay"></span> <!-- this can be any element, including an input -->
						<img src="img/next.png" class="next" alt="Next" title="Next page" />
						<img src="img/last.png" class="last" alt="Last" title= "Last page" />
						<select class="pagesize">
							<option selected="selected" value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option value="40">40</option>
						</select>
					</div>
					<!--<a href="#" title="" class="add-items">Add item</a>-->
				</div>
				<hr>
			
			</div><!-- /#page-wrapper -->
		</div>
    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
	<script src="js/tablesorter/jquery.tablesorter.pager.js"></script>
	<script src="js/tablesorter/jquery.tablesorter.widgets.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>