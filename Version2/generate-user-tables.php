<?php // run during signup
// php file to generate user tables

$user_id = '0';

// Connect to admin table and flip tables created bit
dbConnect("someappname_admin_db");

//flip bit
$sql = "UPDATE users SET tables_created = '1' WHERE username = '$newemail' AND password = PASSWORD('$pwd')";
if (!mysql_query($sql)) {
			echo mysql_error();
		}

//get user id (make twilio number)		
$sql = "SELECT * FROM users WHERE username = '$newemail' AND password = PASSWORD('$pwd')";
$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}

if(mysql_num_rows($result) > 0) {
	$user_id = mysql_result($result,0,'table_id');
}

// Connect to user db to create user tables (using user id for now - will change to twilio number)
dbConnect("someappname_users_db");

//create items table
$item_table_name = $user_id."_item_table";
$sql = "CREATE TABLE $item_table_name(
id int NOT NULL AUTO_INCREMENT,
item_name varchar(255),
location varchar(255),
PRIMARY KEY(id)
);";

$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}

// Make item names fulltext for fulltext search capability
$ft_alter = mysql_query("ALTER TABLE $item_table_name ADD FULLTEXT(item_name)");

//create promotions table
$promotions_table_name = $user_id."_promo_table";
$sql = "CREATE TABLE $promotions_table_name(
id int NOT NULL AUTO_INCREMENT,
promotion_text TEXT(255),
keywords varchar(255),
PRIMARY KEY(id)
);";

$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}

// Make promotion keywords fulltext for fulltext search capability
$ft_alter = mysql_query("ALTER TABLE $promotions_table_name ADD FULLTEXT(keywords)");
		
//create statistics table
$stats_table_name = $user_id."_stats_table";
$sql = "CREATE TABLE $stats_table_name(
id int NOT NULL AUTO_INCREMENT,
stat1 varchar(255),
stat2 varchar(255),
PRIMARY KEY(id)
);";

$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}
		


?>