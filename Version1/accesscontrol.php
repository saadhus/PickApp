<?php // accesscontrol.php
// Access control is used on any page that a user must be logged in to see.
include_once 'jscommon.php';
include_once 'db.php';
include_once 'sessionvars.php';

dbConnect("someappname_admin_db");

session_start();

// If not, redirect user to login page
if(!isset($_SESSION['uid'])) {
  redirect("/newapp/accessdenied.html");
  exit;
}

$uid = $_SESSION['uid'];
$pwd = $_SESSION['pwd'];

// Escape the uid and pwd to prevent sql injection
$uid = mysql_real_escape_string($uid);
$pwd = mysql_real_escape_string($pwd);

// Search users table for user to make sure he's not banned
$sql = "SELECT * FROM users WHERE
        username = '$uid' AND password = PASSWORD('$pwd')";
$result = mysql_query($sql);
if (!$result) {
  error('A database error occurred while checking your '.
        'login details.\\nIf this error persists, please '.
        'contact you@example.com.');
}

// If user isn't found in the db, unset the session varaibles and allow a re-login
if (mysql_num_rows($result) == 0) {
  unset($_SESSION['uid']);
  unset($_SESSION['pwd']);
  unsetSessionVars();
  redirect("/newapp/accessdenied.html");
  exit;
}

?>