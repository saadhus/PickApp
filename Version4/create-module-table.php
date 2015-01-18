<?php //create-module-table.php - creates a user table for any existing modules with no user table

// Create autoresponder tables
function createARTable($row) {
	// Connect to admin table
	dbConnect("someappname_users_db");
	$module_name = str_replace(" ","",urldecode($row['module_name']));
	$table_name = $row['table_id']."_autoresponder_".$module_name;
		$sql = "CREATE TABLE $table_name(
		id int NOT NULL AUTO_INCREMENT,
		col1 varchar(255),
		col2 varchar(255),
		PRIMARY KEY(id)
		);";

		$result = mysql_query($sql);
		if (!$result) {	
			echo mysql_error();
			die();
		}
		else { //Flip table_exists bit
		dbConnect("someappname_admin_db");
		$table_id = $row['table_id'];
		$module_name = $row['module_name'];
		$sql = "UPDATE users_autoresponders SET table_exists = '1' WHERE table_id = '$table_id' AND module_name = '$module_name'";
		$result = mysql_query($sql);
		if(!$result) {
			echo mysql_error();
			die();
		}
		
		}
}

$user_id = '0';

// Connect to admin table
dbConnect("someappname_admin_db");

//get user id		
$sql = "SELECT * FROM users WHERE username = '$newemail' AND password = PASSWORD('$pwd')";
$result = mysql_query($sql);
if (!$result) {	
			echo mysql_error();
		}

if(mysql_num_rows($result) > 0) {
	$user_id = mysql_result($result,0,'table_id');
}

//get modules for the user (autoresponders for now)
$sql = "SELECT * FROM users_autoresponders WHERE table_id = '$user_id'";
$result = mysql_query($sql);
if (!$result) {
	echo mysql_error();
}

if(mysql_num_rows($result) > 0) {
	$rows = Array();
			while($row = mysql_fetch_array($result)){
			  array_push($rows, $row);
			}
			foreach ($rows as $row) {
				createARTable($row);
			}
}
?>