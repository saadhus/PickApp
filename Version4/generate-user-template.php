<?php // run during signup
// php file to generate user modules following a specific template (for now - grocery store template)

$user_id = '0';

// Connect to admin table
dbConnect("someappname_admin_db");

//get user id (make twilio number)		
$sql = "SELECT * FROM users WHERE username = '$newemail' AND password = PASSWORD('$pwd')";
$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}

if(mysql_num_rows($result) > 0) {
	$user_id = mysql_result($result,0,'table_id');
}

// Generate items list and promotions autoresponder templates (test for now - this will become a generic template object hopefully)
// (ITEMS LIST)
$sql = "INSERT INTO users_autoresponders (table_id, keyword1, keyword2, module_name, module_description, table_exists) 
VALUES ($user_id, 'Location', 'Item', 'Item%20List', 'Add items to a location','0')";
$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}

// (PROMOTIONS)
$sql = "INSERT INTO users_autoresponders (table_id, keyword1, keyword2, module_name, module_description, table_exists) 
VALUES ($user_id, 'Promotion', 'Keyword', 'Promotions', 'Add promotions to keywords','0')";
$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}
		
// create the tables
include("create-module-table.php");

		/*
// Connect to user db to create user tables (using user id for now - will change to twilio number)
dbConnect("someappname_users_db");

//create items table
$item_table_name = $user_id."_item_table";
$sql = "CREATE TABLE $item_table_name(
id int NOT NULL,
item_name varchar(255),
location varchar(255),
comments varchar(255),
PRIMARY KEY(id)
);";

$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}

//create promotions table
$promotions_table_name = $user_id."_promo_table";
$sql = "CREATE TABLE $promotions_table_name(
id int NOT NULL,
promotion_text TEXT(255),
keywords varchar(255),
PRIMARY KEY(id)
);";

$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}
		
//create statistics table
$stats_table_name = $user_id."_stats_table";
$sql = "CREATE TABLE $stats_table_name(
id int NOT NULL,
stat1 varchar(255),
stat2 varchar(255),
PRIMARY KEY(id)
);";

$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}
		
*/

?>