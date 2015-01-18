<?php  //php to delete/edit rows in autoresponder.php (invoked by autoresponder_ajax.js)

include_once "../../accesscontrol.php";

if($_POST['action']!="" && $_POST['rid']!="" && $_POST['name']!="") {
	$action = $_POST['action'];
	$rid = $_POST['rid'];
	$name = urlencode($_POST['name']);
}
else
{
	die();
}

$rid = mysql_real_escape_string($rid);
dbConnect("someappname_users_db");
	
$table_id = mysql_real_escape_string($_SESSION['table_id']);
$table_name = $table_id ."_autoresponder_". $name;

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
		$sql = "UPDATE $table_name SET col1 = '$text' WHERE id='$rid'";
		if (!mysql_query($sql)) {
					die(mysql_error());
		}
	}
	
	if($cid=="3") {
		$sql = "UPDATE $table_name SET col2 = '$text' WHERE id='$rid'";
		if (!mysql_query($sql)) {
					die(mysql_error());
		}
	}
	
	
	echo "ok";
	
}

?>