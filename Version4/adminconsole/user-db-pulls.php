<?php //user-db-pulls.php
// functions used in dashboard to pull records from db and display to the user

//retrieve all records from a module table
function getRecords($module="",$name="") {
	echo $name;
	dbConnect("someappname_users_db");
	//get table id from session
	$table_id = mysql_real_escape_string($_SESSION['table_id']);
	$table_name = $table_id ."_". $module ."_". $name;

	$sql = "SELECT * FROM $table_name";
	$result = mysql_query($sql);
	
	if (mysql_num_rows($result) == 0)
	{
		// nothing found - show error
		error("No records found in database.");
	}
	else
	{
	// push all results into an array and return it
		$rows = Array();
			while($row = mysql_fetch_array($result)){
			  array_push($rows, $row);
			}
		return $rows;
	}

}
