<?php //login page
ob_start();
include("db.php");
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
                <center><h1 class="page-header">Login to your SOMEAPPNAME account</h1></center>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Login</li>
                </ol>
            </div>

        </div>

        <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="col-lg-12">
					<form class="form-horizontal" role="form" method="post" action="login.php" >
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
						  <input type="email" class="form-control" name="email" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
						  <input type="password" class="form-control" name="pwd" placeholder="Password">
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label>
							  <input type="checkbox" id="remember_box"> Remember me
							</label>
						  </div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-default">Sign in</button>
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
                    <p>Copyright &copy; Company 2013</p>
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
	// common js functions (error/redirect)
	include("jscommon.php");
	
		if (!isset($_POST['email'])) {
			//do nothing - user hasn't submitted form yet
		} else {
			// If error is caught, set to true	
			$error_found = false;
			
			// Process login submission
			dbConnect('someappname_admin_db');

			if ($_POST['email']=='' or $_POST['pwd']=='') {
				$error_found = true;
				error('One or more required fields were left blank.\\n'.
					  'Please fill them in and try again. ');
			}
			
			if(!$error_found) {
				// Escape all our variables before inserting
				$email = mysql_real_escape_string($_POST['email']);
				$pwd = mysql_real_escape_string($_POST['pwd']);
				
				// Check for existing user with the email
				$sql = "SELECT COUNT(*) FROM users WHERE username = '$email' AND password = PASSWORD('$pwd')";
				$result = mysql_query($sql);
				if (!$result) {	
					$error_found = true;
					error('A database error occurred in processing your '.
						  'submission.\\nIf this error persists, please '.
						  'contact you@example.com. ');
				}
				if (mysql_result($result,0,0)==0) {
					$error_found = true;
					error('Either your email or password was entered incorrectly.\\n'.
						  'Please try again, or contact us at you@example.com if the problem persists. ');
				}
				if (mysql_result($result,0,0)>1) {
					$error_found = true;
					error('Multiple accounts found.\\n'.
						  'Please contact us at you@example.com to resolve this issue. ');
				}
			}
			
			if(!$error_found) {
				// Start session and set variables
				session_start();
				$_SESSION['uid'] = $email;
				$_SESSION['pwd'] = $pwd;
				
				include_once "sessionvars.php";
				setSessionVars();
				
				//redirect to dashboard
				redirect("adminconsole/dashboard.php");
				
			}
			
		}
		?>
</body>

</html>
