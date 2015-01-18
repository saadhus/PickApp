<?php //autoresponder.php
// allows user to insert new items into the database, view all items, filter results, and edit and delete items.
	
	ob_start();
	include_once "../accesscontrol.php";
	include_once "load-module.php";
	if(isset($_GET["name"])) {
		$module_info = loadModule(1,rawurlencode($_GET["name"]));
		$module_info['module_name'] = urldecode($module_info['module_name']);
		$module_name = str_replace(" ","",$module_info['module_name']);
	}
	else { // no module found
		error('Page not found');
		die();
	}
	include_once "user-db-pulls.php";
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title id="module_name"><? echo $module_info['module_name']; ?></title>

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
				<button type="button" class="btn btn-primary btn-lg" style="float: right;">&nbsp &nbsp Settings &nbsp &nbsp </button>				
				<h1><? echo $module_info['module_name'] ?> <small><? echo $module_info['module_description'] ?></small></h1>
				<ol class="breadcrumb">
				  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				  <li class="active"><i class="fa fa-table"></i> <? echo $module_info['module_name'] ?></li>
				</ol>
				<div id="error_msg" class="alert alert-danger alert-dismissable" style="display: none">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				</div>
			  </div>
			</div><!-- /.row -->
			
			<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#add_item" style="margin-bottom: 10px;">&nbsp &nbsp Add items&nbsp &nbsp &nbsp </button>
			<button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#csv_upload" style="margin-left: 10px; margin-bottom: 10px;">&nbsp &nbsp Upload CSV&nbsp &nbsp &nbsp </button>
			
			<!--<div class="row2">-->
				
				<div id="add_item" class="collapse col-md-12 hero-unit">
				<form role="form" method="post" action="<? echo "autoresponder.php?name=".$module_info['module_name']."&ut=1"; ?>">
					<center>
					<h1>Add rows</h1>
					</center>
					<br><br>
					<div class="col-md-12 hero-plain">
					<div class="row">
						<div class="col-md-5">
							  <div class="form-group">
								<center><h4><label for="exampleInputEmail1"><? echo $module_info['keyword1']; ?></label></h4></center>
								<input type="text" class="form-location" name="location" placeholder="">
							  </div>
								
						</div>
							
						<div class="col-md-2">
						<br>
						<br>
						<center><i class="fa fa-arrow-right fa-5x"></i></center>
						</div>
						
						<div class="col-md-5">
							  <div class="form-group">
								<center><label for="exampleInputEmail1"><h4><? echo $module_info['keyword2']; ?></h4></label></center>
								<textarea class="form-control" rows="2" name="items"></textarea>
							  </div>
						</div>
					</div>
					<br>
					<div class="row">
					
					<div class="col-md-5">
					</div>
					
					<div class="col-md-2">
					<center><button type="submit" class="btn btn-primary">&nbsp &nbsp Add rows&nbsp &nbsp &nbsp </button></center>
					</div>
						
					<div class="col-md-5">
					</div>
						
					</div>
					</div>
					</form><!-- End of form for inventory insert -->
				</div>
				
				<div id="csv_upload" class="collapse col-md-12 hero-unit">
				<form role="form" method="post" enctype="multipart/form-data" action="<? echo "autoresponder.php?name=".$module_info['module_name']."&ut=2"; ?>">
					<center>
					<h1>Upload CSV File</h1>
					</center>
					<br><br>
					<div class="col-md-12 hero-plain">
					<div class="row">
						Choose your file: <br /> 
						<input name="csv" type="file" id="csv" />
					</div>
					<br>
					<div class="row">
					
					<div class="col-md-2">
					<center><button type="submit" name="Submit" value="Upload" class="btn btn-warning">&nbsp &nbsp Upload CSV&nbsp &nbsp &nbsp </button></center>
					</div>
						
					</div>
					</div>
					</form><!-- End of form for inventory insert -->
				</div>
			<!--</div>-->
			

			<!--<hr>-->
			
			<div class="row2">
				
				<div class="col-md-1">
				</div>
				
				<div class="col-md-12 hero-unit">
					<center>
					<h1><? echo $_SESSION['store_name']." "; ?><? echo $module_info['module_name']; ?></h1>
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
					<button type="button" class="btn btn-danger" style="float: right; margin-top: 7px;" data-toggle="modal" data-target="#clearTableModal">Clear Table</button> <!-- pop up a modal, asking if user is sure, then fire post from modal -->
					<table id="main_table" class="table table-bordered table-hover tablesorter inventory-list">
						<thead>
						  <tr>
							<th width="48%" data-placeholder="filter"><? echo $module_info['keyword1']; ?> <i class="fa fa-sort"></i></th>
							<th width="48%" data-placeholder="filter" ><? echo $module_info['keyword2']; ?> <i class="fa fa-sort"></i></th>
							<th width="4%" class="filter-false remove sorter-false">Actions</th>
						  </tr>
						</thead>
					  <tbody>
					  <?php 
					  if(!isset($_GET['ut'])) {
							// do nothing - no action
						}
						else if ($_GET['ut']==1) // add item
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
								openDismissable("add_item");
								$error_found = true;
							}
							if(!$items_array || $_POST['items']=="") {
								error("No items added. Please enter items, separated by commas.");
								openDismissable("add_item");
								$error_found = true;
							}
							
							$table_id = mysql_real_escape_string($_SESSION['table_id']);
							$table_name = $table_id ."_autoresponder_". $module_name;
							
							if(!$error_found) {
								foreach($items_array as $item) {
									$item = mysql_real_escape_string($item);
									$sql = "INSERT INTO $table_name SET
											  col1 = '$location',
											  col2 = '$item'";
										if (!mysql_query($sql)) {
											$error_found = true;
											error('A database error occurred in processing your '.
												  'submission.\\nIf this error persists, please '.
												  'contact you@example.com.\\n' . mysql_error());
											openDismissable("add_item");
										}
									}
							}
							
						}
						else if ($_GET['ut']==2) { // CSV Uploading

							if(!($_FILES['csv'][size] > 0)) {
								error('No file selected. Please select a CSV file to upload.');
								openDismissable("csv_upload");
							} else {
								dbConnect("someappname_users_db");

								$table_id = mysql_real_escape_string($_SESSION['table_id']);
								$table_name = $table_id ."_autoresponder_". $module_name;
								
								// If error is caught, set to true	
								$error_found = false;

								if (is_uploaded_file($_FILES['csv']['tmp_name'])) {

									readfile($_FILES['csv']['tmp_name']);

								} else {
									$error_found = true;
									error('File not uploaded. Please upload a CSV file.');
									openDismissable("csv_upload");
								}

								//Import uploaded file to Database
								$handle = fopen($_FILES['csv']['tmp_name'], "r");
								
								//need to check that the csv file is well formatted before we start doing db writes - add this later
								while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
									$import="INSERT into $table_name(col1,col2) values('$data[0]','$data[1]')";
									mysql_query($import) or die(mysql_error());
								}
								fclose($handle);
							}
						}
						else if ($_GET['ut']==9) { // Clear table
							
							dbConnect("someappname_users_db");
							$table_id = mysql_real_escape_string($_SESSION['table_id']);
							$table_name = $table_id ."_autoresponder_". $module_name;
							
							// If error is caught, set to true	
							$error_found = false;
							
							$sql = "DELETE FROM $table_name";
							if (!mysql_query($sql)) {
											$error_found = true;
											error('There was an error clearing the table.');
										}
						
						}
					  
					  $inv_rows = getRecords('autoresponder',$module_name);
					  if(is_array($inv_rows)) {
					  foreach ($inv_rows as $row) { ?>
					  <tr>
						  <td><div contenteditable class="e-row" data-rid="<? echo $row['id']; ?>" data-cid="2"><? echo $row['col1']; ?></div></td>
						  <td><div contenteditable class="e-row" data-rid="<? echo $row['id']; ?>" data-cid="3"><? echo $row['col2']; ?></div></td>
						  <td><button data-rid="<? echo $row['id']; ?>" type="button" class="remove d-row btn btn-danger btn-xs" title="Remove this row">Delete</button></td>
						</tr>
					  <? } 
					  } // end loop ?>
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
	
	<!-- Clear Table Confirmation Modal -->
	<div class="modal fade" id="clearTableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Clear the table?</h4>
		  </div>
		  <div class="modal-body">
			Clearing the table is a permanent action. Are you sure?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			<form role="form" method="post" action="<? echo "autoresponder.php?name=".$module_info['module_name']."&ut=9"; ?>" style="display:inline;">
				<button type="submit" class="btn btn-primary">Yes</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>

    <!-- JavaScript -->
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
	<script src="js/tablesorter/jquery.tablesorter.pager.js"></script>
	<script src="js/tablesorter/jquery.tablesorter.widgets.js"></script>
    <script src="js/tablesorter/tables.js"></script>
	<script src="js/ajax/autoresponder_ajax.js"></script>
	<script>
		// Create a closure
		(function(){
			// Your base, I'm in it!
			var originalAddClassMethod = jQuery.fn.addClass;

			jQuery.fn.addClass = function(){
				// Execute the original method.
				var result = originalAddClassMethod.apply( this, arguments );

				// trigger a custom event
				jQuery(this).trigger('cssClassChanged');

				// return the original result
				return result;
			}
		})();

		// close collapsible if other collapsible is opened
		$(function(){
			$("#add_item").bind('cssClassChanged', function(){ 
				$("#csv_upload").removeClass("in");
			});
			$("#csv_upload").bind('cssClassChanged', function(){ 
				$("#add_item").removeClass("in");
			});
		});
	</script>

  </body>
</html>