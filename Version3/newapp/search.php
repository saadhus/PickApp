<?php
include "db.php";

// Get SMS message body
$find = $_REQUEST['Body']; 

// Try and get metadata if it exists
try
{
 $zipcode = $_REQUEST['FromZip'];
}
catch (Exception $e)
{
 $zipcode = "N/A";
 throw new Exception( 'Something really gone wrong', 0, $e);
}

try
{
 $city = $_REQUEST['FromCity'];
}
catch (Exception $e)
{
 $city = "N/A";
 throw new Exception( 'Something really gone wrong', 0, $e);
}

try
{
 $state = $_REQUEST['FromState'];
}
catch (Exception $e)
{
 $state = "N/A";
 throw new Exception( 'Something really gone wrong', 0, $e);
}

try
{
 $country = $_REQUEST['FromCountry'];
}
catch (Exception $e)
{
 $country = "N/A";
 throw new Exception( 'Something really gone wrong', 0, $e);
}



// reply message with search results
$sms_response = "";

//If they did not enter a search term we give them an error
if ($find == "")
{
$sms_response = "Please enter a search term.";
exit;
}

// Otherwise we connect to our Database
dbConnect("test_items");

// Explode string by commas into individual queries
$find_array = explode(",", $find);

// We perform a bit of filtering and escaping on each query
foreach ($find_array as $find_query) {
	$find_query = strip_tags($find_query);
	$find_query = trim($find_query);
	$find_query = mysql_real_escape_string($find_query);
}

//Alter table for fulltext - only do this once in final version (whenever db is made or updated) !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$ft_alter = mysql_query("ALTER TABLE test_items_1 ADD FULLTEXT(name)");


//Now we search for our search term, in the field the user specified (full text search)
foreach ($find_array as $find_query) {
	$item = mysql_query("SELECT *, MATCH(name) AGAINST ('+$find_query*' IN BOOLEAN MODE) AS rank FROM test_items_1 WHERE MATCH(name) AGAINST ('+$find_query*' IN BOOLEAN MODE) ORDER BY rank DESC");
	// Append results to response message
	while($result = mysql_fetch_array( $item ))
	{
		$sms_response .= $result['name'].": ".$result['area']."\n";
	}
	// If no results, append an apology message
	$anymatches=mysql_num_rows($item);
	if ($anymatches == 0)
	{
		$sms_response .= "Sorry, no item of the name ".$find_query." found.\n";
	}
}

// Add metadata to text (save this in big ass database later)
$sms_response .= "Zipcode: ".$GLOBALS['zipcode']."\n";
$sms_response .= "City: ".$GLOBALS['city']."\n";
$sms_response .= "State: ".$GLOBALS['state']."\n";
$sms_response .= "Country: ".$GLOBALS['country']."\n";

?>