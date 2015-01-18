<?php //sessionvars.php
// function for session variables - these will be used in the dashboard and other parts of site

function setSessionVars() {

	//email and pwd
	$email = $_SESSION['uid'];
	$pwd = $_SESSION['pwd'];

	//pull user record from db and use results to fill our session vars
	$sql = "SELECT * FROM users WHERE username = '$email' AND password = PASSWORD('$pwd')";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0)
	{
		error("Error setting session variables. Please try again.");
		die();
	}
	else
	{
		$result = mysql_fetch_array( $result );
		$_SESSION['store_name'] = $result['store_name'];
		$_SESSION['manager_name'] = $result['manager_name'];
		$_SESSION['twilio_number'] = $result['twilio_number'];
		$_SESSION['table_id'] = $result['table_id'];
	}
}

function unsetSessionVars() {

	unset($_SESSION['store_name']);
	unset($_SESSION['manager_name']);
	unset($_SESSION['twilio_number']);
	unset($_SESSION['table_id']);

}

?>