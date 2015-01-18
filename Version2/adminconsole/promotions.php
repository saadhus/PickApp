<?php
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

    <title>Promotions</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  </head>

  <body>
  
  <!-- Jquery -->
  <script src="js/jquery-1.10.2.js"></script>

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
			<li><a href="inventory.php"><i class="fa fa-table"></i> Inventory</a></li>
			<li class="active"><a href="promotions.php"><i class="fa fa-tags"></i> Promotions</a></li>
            <li><a href="statistics.php"><i class="fa fa-bar-chart-o"></i> Statistics</a></li>
			<li><a href="posters.php"><i class="fa fa-file"></i> Posters</a></li>
			<li><a href="admincontact.php"><i class="fa fa-envelope-o"></i> Contact</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </nav>

        <div id="page-wrapper">

			<div class="row">
			  <div class="col-lg-12">
				<h1>Promotions <small>Add sales and coupons to items or keywords</small></h1>
				<ol class="breadcrumb">
				  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				  <li class="active"><i class="fa fa-tags"></i> Promotions</li>
				</ol>
				<div class="alert alert-info alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  Use the forms below to tie a sale or coupon to keyword(s) or item(s). When a shopper searches for the item or keyword, they will also be notified of the sale 
				  </div>
			  </div>
			</div><!-- /.row -->
			<div class="row2">
				
				<div class="col-md-12 hero-unit">
				<form role="form" method="post" action="promotions.php">
					<center>
					<h1>Add sales or coupons to keywords or items</h1>
					</center>
					<br><br>
					<div class="col-md-12 hero-plain">
					<div class="row">
						<div class="col-md-5">
						
							  <div class="form-group">
								<center><h4><label for="exampleInputEmail1">Promotion Text</label></h4></center>
								<textarea class="form-control" rows="2" name="promotion_text"></textarea>
							  </div>
								
						</div>
							
						<div class="col-md-2">
						<br>
						<br>
						<center><i class="fa fa-arrow-right fa-5x"></i></center>
						</div>
						
						<div class="col-md-5">
							  <div class="form-group">
								<center><label for="exampleInputEmail1"><h4>Keywords or Items</h4></label></center>
								<textarea class="form-control" rows="2" name="keywords"></textarea>
							  </div>
						</div>
					</div>
					<br>
					<div class="row">
					
					<div class="col-md-5">
					</div>
					
					<div class="col-md-2">
					<center><button type="submit" class="btn btn-primary">Add promotions</button></center>
					</div>
						
					<div class="col-md-5">
					</div>
						
					</div>
					<div id="error_msg" class="alert alert-danger" style="display: none"></div>
					</div>
					</form>
				</div>
			</div>
		
			<hr>
			
			<div class="row2">
				
				<div class="col-md-1">
				</div>
				
				<div class="col-md-10 hero-unit">
					<center>
					<h1><? echo $_SESSION['store_name']; ?> Promotions</h1>
					</center>
					<br><br>
					<table class="table table-bordered table-hover tablesorter inventory-list">
						<thead>
						  <tr>
							<th data-placeholder="#">#</th>
							<th data-placeholder="promo text" colspan="2">Promotion Text <i class="fa fa-sort"></i></th>
							<th data-placeholder="keyword">Keywords <i class="fa fa-sort"></i></th>
						  </tr>
						</thead>
					  <tbody>
					  <?php 
					  if(!isset($_POST['promotion_text']) && !isset($_POST['keywords'])) {
							// do nothing - no post
						}
						else
						{
							$promo_text = mysql_real_escape_string($_POST['promotion_text']);
							$items = mysql_real_escape_string($_POST['keywords']);
							
							// If error is caught, set to true	
							$error_found = false;
							
							// Process signup submission
							dbConnect('someappname_users_db');

							if($promo_text=="") {
								error("No promotion text added. Please enter a promotion text.");
								$error_found = true;
							}
							if($_POST['keywords']=="") {
								error("No keywords/items added. Please enter keywords/items, separated by commas.");
								$error_found = true;
							}
							
							$table_id = mysql_real_escape_string($_SESSION['table_id']);
							$table_name = $table_id . "_promo_table";
							
							if(!$error_found) {
									$sql = "INSERT INTO $table_name SET
											  promotion_text = '$promo_text',
											  keywords = '$items'";
										if (!mysql_query($sql)) {
											$error_found = true;
											error('A database error occurred in processing your '.
												  'submission.\\nIf this error persists, please '.
												  'contact you@example.com.\\n' . mysql_error());
										}
							}
							
						}
					  
					  $inv_rows = getRecords('_promo_table');
					  if(is_array($inv_rows)) {
					  foreach ($inv_rows as $row) { ?>
					  <tr>
						  <td><? echo $row['id']; ?></td>
						  <td colspan="2"><div contenteditable><? echo $row['promotion_text']; ?></div></td>
						  <td><div contenteditable><? echo $row['keywords']; ?></div></td>
						</tr>
					  <? } //end loop
						}	 ?>
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
				</div>
			<hr>
		

		</div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>