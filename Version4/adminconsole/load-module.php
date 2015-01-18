<?php //load-module.php - load the parameters of the current module

function loadModule($type, $name="") {
	dbConnect("someappname_admin_db");
	$name = mysql_real_escape_string($name);
	
	if($type==1) {	//autoresponder

		$table_id = $_SESSION['table_id'];
		
		$sql = "SELECT * FROM users_autoresponders WHERE table_id = '$table_id' AND module_name = '$name'";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) == 0)
		{
			// nothing found - show error
			error("No module found in database.");
		}
		else if (mysql_num_rows($result) == 1)
		{
		// push all results into an array and return it
			$row = mysql_fetch_array($result);
			return $row;
		}
		else
		{
			error("There was an error reading the database.");
		}
	}
}
?>