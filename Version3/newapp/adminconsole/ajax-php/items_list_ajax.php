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
dbConnect("someappname_users_db");
	
$table_id = mysql_real_escape_string($_SESSION['table_id']);
$table_name = $table_id . "_item_table";

//delete item row
if($action == "delete") {
	
	$sql = "DELETE FROM $table_name WHERE id='$rid'";
	if (!mysql_query($sql)) {
				die(mysql_error());
	}
	
	echo "ok";
	
}

// edit item row
if($action == "edit") {

	$cid = mysql_real_escape_string($_POST['cid']);
	$text = mysql_real_escape_string($_POST['text']);

	if($cid=="2") {
		$sql = "UPDATE $table_name SET item_name = '$text' WHERE id='$rid'";
		if (!mysql_query($sql)) {
					die(mysql_error());
		}
	}
	
	if($cid=="3") {
		$sql = "UPDATE $table_name SET location = '$text' WHERE id='$rid'";
		if (!mysql_query($sql)) {
					die(mysql_error());
		}
	}
	
	
	echo "ok";
	
}

?>