<?php // db.php
// Connects to any db on our server
 
$dbhost = "mysql.esportsnetworking.com";
$dbuser = "kevin_saad";
$dbpass = "SAAD1308kevin";
 
function dbConnect($db="") {
global $dbhost, $dbuser, $dbpass;
 
$dbcnx = @mysql_connect($dbhost, $dbuser, $dbpass)
or die("The site database appears to be down.");
 
if ($db!="" and !@mysql_select_db($db))
die("The site database is unavailable.");
 
return $dbcnx;
}
?>