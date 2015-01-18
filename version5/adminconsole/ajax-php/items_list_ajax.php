<?php  //php to delete/edit rows in items_list.php (invoked by items_list_ajax.js)

include_once "../../accesscontrol.php";

if($_POST['action']!="" && $_POST['rid']!="") {
	$action = $_POST['action'];
	$rid = $_POST['rid'];
}
else
{
	die();
}

$rid = mysql_real_escape_string($rid);

//delete item row
if($action == "delete") {
	dbConnect("someappname_users_db");
	
	$table_id = mysql_real_escape_string($_SESSION['table_id']);
	$table_name = $table_id . "_item_table";
	
	$sql = "DELETE FROM $table_name WHERE id='$rid'";
	if (!mysql_query($sql)) {
				die(mysql_error());
	}
	
	if(!$error_found) {
		echo "ok";
	}
}

if($action == "edit") {
	// do row editing here
}

?>