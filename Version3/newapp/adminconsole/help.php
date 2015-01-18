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

    <title>Contact</title>

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
			<li class="active"><a href="help.php"><i class="fa fa-question"></i> Help</a></li>
			<li><a href="account_settings.php"><i class="fa fa-wrench"></i> Account Settings</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Forms <small>Enter Your Data</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Forms</li>
            </ol>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Visit <a class="alert-link" target="_blank" href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a> for more information.
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form role="form">

              <div class="form-group">
                <label>Text Input</label>
                <input class="form-control">
                <p class="help-block">Example block-level help text here.</p>
              </div>

              <div class="form-group">
                <label>Text Input with Placeholder</label>
                <input class="form-control" placeholder="Enter text">
              </div>

              <div class="form-group">
                <label>Static Control</label>
                <p class="form-control-static">email@example.com</p>
              </div>

              <div class="form-group">
                <label>File input</label>
                <input type="file">
              </div>

              <div class="form-group">
                <label>Text area</label>
                <textarea class="form-control" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label>Checkboxes</label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Checkbox  1
                  </label>
                </div>
               <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Checkbox  2
                  </label>
                </div>
               <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Checkbox  3
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label>Inline Checkboxes</label>
                <label class="checkbox-inline">
                  <input type="checkbox"> 1
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox"> 2
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox"> 3
                </label>
              </div>

              <div class="form-group">
                <label>Radio Buttons</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Radio  1
                  </label>
                </div>
               <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Radio  2
                  </label>
                </div>
               <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                    Radio  3
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label>Inline Radio Buttons</label>
                <label class="radio-inline">
                  <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked> 1
                </label>
                <label class="radio-inline">
                  <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2"> 2
                </label>
                <label class="radio-inline">
                  <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3"> 3
                </label>
              </div>

              <div class="form-group">
                <label>Selects</label>
                <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>

              <div class="form-group">
                <label>Multiple Selects</label>
                <select multiple class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>

              <button type="submit" class="btn btn-default">Submit Button</button>
              <button type="reset" class="btn btn-default">Reset Button</button>  

            </form>

          </div>
          <div class="col-lg-6">
            <h1>Disabled Form States</h1>

            <form role="form">

              <fieldset disabled>

                <div class="form-group">
                  <label for="disabledSelect">Disabled input</label>
                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                </div>

                <div class="form-group">
                  <label for="disabledSelect">Disabled select menu</label>
                  <select id="disabledSelect" class="form-control">
                    <option>Disabled select</option>
                  </select>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Disabled Checkbox
                  </label>
                </div>

                <button type="submit" class="btn btn-primary">Disabled Button</button>

              </fieldset>

            </form>

            <h1>Form Validation</h1>

            <form role="form">

              <div class="form-group has-success">
                <label class="control-label" for="inputSuccess">Input with success</label>
                <input type="text" class="form-control" id="inputSuccess">
              </div>

              <div class="form-group has-warning">
                <label class="control-label" for="inputWarning">Input with warning</label>
                <input type="text" class="form-control" id="inputWarning">
              </div>

              <div class="form-group has-error">
                <label class="control-label" for="inputError">Input with error</label>
                <input type="text" class="form-control" id="inputError">
              </div>
            
            </form>
            
            <h1>Input Groups</h1>

            <form role="form">

              <div class="form-group input-group">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" placeholder="Username">
              </div>

              <div class="form-group input-group">
                <input type="text" class="form-control">
                <span class="input-group-addon">.00</span>
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                <input type="text" class="form-control" placeholder="Font Awesome Icon">
              </div>

              <div class="form-group input-group">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control">
                <span class="input-group-addon">.00</span>
              </div>
              
              <div class="form-group input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                </span>
              </div>

            </form>
            
            <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>