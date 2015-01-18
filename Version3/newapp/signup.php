<?php //signup page
ob_start();
include_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SOMEAPPNAME</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>


<body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                <a class="navbar-brand" href="index.html">SOMEAPPNAME</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about.html">About</a>
                    </li>
                    <li><a href="services.html">Services</a>
                    </li>
                    <li><a href="contact.php">Contact</a>
                    </li>
                    <li class="dropdown">
                    </li>
					<li><a href="signup.php">Sign Up</a>
					<li><a href="login.php">Login</a>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <center><h1 class="page-header">Create your SOMEAPPNAME account</h1></center>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Sign-up</li>
                </ol>
            </div>

        </div>

        <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="col-lg-12">
					<form class="form-horizontal" role="form" method="post" action="<?=$_SERVER['PHP_SELF']?>">
					  <div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
						  <input type="email" class="form-control" name="email" placeholder="Email used to login to SOMEAPPNAME">
						</div>
					  </div>
					  <div class="form-group">
						<label for="contact_phone" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
						  <input type="password" class="form-control" name="password1">
						</div>
					  </div>
					  <div class="form-group">
						<label for="contact_phone" class="col-sm-2 control-label">Re-enter Password</label>
						<div class="col-sm-10">
						  <input type="password" class="form-control" name="password2">
						</div>
					  </div>
					  <div class="form-group">
						<label for="store_name" class="col-sm-2 control-label">Store Name</label>
						<div class="col-sm-10">
						  <input type="name" class="form-control" name="store_name" placeholder="Whats your store name?">
						</div>
					  </div>
					  <div class="form-group">
						<label for="address" class="col-sm-2 control-label">Store Address</label>
						<div class="col-sm-10">
						  <input type="address" class="form-control" name="address" placeholder="Store address">
						</div>
					  </div>
					  <div class="form-group">
						<label for="store_phone" class="col-sm-2 control-label">Store Phone</label>
						<div class="col-sm-10">
						  <input type="phone" class="form-control" name="store_phone" placeholder="ex:(732)7845644">
						</div>
					  </div>
					  <div class="form-group">
						<label for="contact_name" class="col-sm-2 control-label">Your Name</label>
						<div class="col-sm-10">
						  <input type="name" class="form-control" name="manager_name" placeholder="Manager or owner name">
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" value="Submit" class="btn btn-success btn-lg btn-block">Create account</button>
						</div>
					  </div>
					</form>
				</div>
			</div>
			<div class="col-md-2"></div>
        </div>

    </div>
    <!-- /.container -->

    <div class="container">
	<div id="error_msg" class="alert alert-danger" style="display: none"></div>
        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Company 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
	
	<?php
	
	include("jscommon.php");
	
if (!isset($_POST['email'])) {
 //do nothing - user hasn't submitted form yet
} else {
	// If error is caught, set to true	
	$error_found = false;
	
    // Process signup submission
    dbConnect('someappname_admin_db');

    if ($_POST['email']=='' or $_POST['password1']=='' or $_POST['password2']==''
      or $_POST['store_name']=='' or $_POST['address']==''
	  or $_POST['store_phone']=='' or $_POST['manager_name']=='') {
		$error_found = true;
        error('One or more required fields were left blank.\\n'.
              'Please fill them in and try again. ');
    }
	
	// Check if passwords match
	if ($_POST['password1']!=$_POST['password2']) {
		$error_found = true;
		error('The two passwords do not match. Please enter them again. ');
	}
	
	if(!$error_found) {
		// Escape all our variables before inserting
		$newemail = mysql_real_escape_string($_POST['email']);
		$pwd = mysql_real_escape_string($_POST['password1']);
		$storename = mysql_real_escape_string($_POST['store_name']);
		$address = mysql_real_escape_string($_POST['address']);
		$storephone = mysql_real_escape_string($_POST['store_phone']);
		$managername = mysql_real_escape_string($_POST['manager_name']);
		
		// Check for existing user with the email
		$sql = "SELECT COUNT(*) FROM users WHERE username = '$newemail'";
		$result = mysql_query($sql);
		if (!$result) {	
			$error_found = true;
			error('A database error occurred in processing your '.
				  'submission.\\nIf this error persists, please '.
				  'contact you@example.com. ');
		}
		if (mysql_result($result,0,0)>0) {
			$error_found = true;
			error('A user already exists with your chosen email.\\n'.
				  'Please try another. ');
		}
	}
	//generate random table id
	$table_id = mt_rand();
	
	if(!$error_found) {		
		$sql = "INSERT INTO users SET
				  username = '$newemail',
				  password = PASSWORD('$pwd'),
				  store_number = '$storephone',
				  store_name = '$storename',
				  store_address = '$address',
				  manager_name = '$managername',
				  tables_created = '0',
				  table_id = '$table_id'";
		if (!mysql_query($sql)) {
			$error_found = true;
			error('A database error occurred in processing your '.
				  'submission.\\nIf this error persists, please '.
				  'contact you@example.com.\\n' . mysql_error());
		}
	}
    
if(!$error_found) {	
    // Email a welcome email to the user.
    $message = "G'Day! Welcome to SOMEAPPNAME.

Your personal account for SOMEAPPNAME
has been created! To log in, proceed to the
following address:

    http://www.example.com/

Your personal login email and password are as
follows:

    email: $newemail
    password: $newpass

You aren't stuck with this password! Your can
change it at any time after you have logged in.

If you have any problems, feel free to contact me at
<you@example.com>.

-Your Name
 Your Site Webmaster
";

    mail($_POST['email'],"Thank you for signing up at SOMEAPPNAME",
         $message, "From:Your Name <you@example.com>");
		 
	//generate the user's tables
	include("generate-user-tables.php");
	
	//redirect to signup complete page
	redirect("confirmation.html");
 }

   } ?>

</body>

</html>
