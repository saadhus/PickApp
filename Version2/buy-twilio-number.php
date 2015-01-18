<?php // @start snippet ?>
<?php
	include_once "accesscontrol.php";
	/* Include the Twilio Helper client library. */
    require "Services/Twilio.php";

	/* Set our AccountSid and AuthToken */
    $AccountSid = "ACde0ba638ec5d54a36fefb7105b28ee8c";
	$AuthToken = "7a7f9fa4dcee98681cc3f5601220d4c2";

    /* Instantiate a new Twilio Rest Client */
	$client = new Services_Twilio($AccountSid, $AuthToken);
?>
<?php if(empty($_POST['submit'])): /* Display Form for searching AvailablePhoneNumbers */?>
<html>
	<head>
		<title>Find a Twilio number to buy</title>
	</head>
	<body>
		<h3>Find a Twilio number to buy</h3>
		<?php if(!empty($_GET['msg'])): ?>
			<p class="msg"><?php echo htmlspecialchars($_GET['msg']); ?></p>
		<?php endif;?>

		<form method="POST">
			<label>near US postal code (e.g. 94117): </label><input type="text" size="4" name="postal_code"/><br/>
			<label>near this other number (e.g. +14156562345): </label><input type="text" size="7" name="near_number"/><br/>
			<label>matching this pattern (e.g. 415***EPIC): </label><input type="text" size="7" name="contains"/><br/>
			<input type="submit" name="submit" value="SEARCH"/>
		</form>
	</body>
</html>
<?php endif; ?>
<?php // @end snippet ?>
<?php // @start snippet ?>
<?php
	/*  Handle Searches from the Twilio number search form */
	if(!empty($_POST['submit']) && $_POST['submit'] == 'SEARCH'):
		$SearchParams = array();

		/* Search parameters for US Local PhoneNumbers */
		$SearchParams['InPostalCode'] = !empty($_POST['postal_code'])? trim($_POST['postal_code']) : '';
		$SearchParams['NearNumber'] = !empty($_POST['near_number'])? trim($_POST['near_number']) : '';
		$SearchParams['Contains'] = !empty($_POST['contains'])? trim($_POST['contains']) : '' ;

		try {

			/* Initiate US Local PhoneNumber search with $SearchParams list */
			$numbers = $client->account->available_phone_numbers->getList('US', 'Local', $SearchParams);

			/* If we did not find any phone numbers let the user know */
			if(empty($numbers)) {
				$err = urlencode("We didn't find any phone numbers by that search");
				header("Location: ?msg=$err");
				exit(0);
			}

		} catch (Exception $e) {

			$err = urlencode("Error processing search: {$e->getMessage()}");
			header("Location: ?msg=$err");
			exit(0);

		}


		?>

		<html>
			<head>
				<title>Choose a Twilio number to buy</title>
			</head>
			<body>
				<h3>Choose a Twilio number to buy</h3>
				<?php foreach($numbers->available_phone_numbers as $number): ?>
				<form method="POST">
					<label><?php echo $number->friendly_name ?></label>
					<input type="hidden" name="PhoneNumber" value="<?php echo $number->phone_number ?>">
					<input type="submit" name="submit" value="BUY" />
				</form>
				<?php endforeach; ?>
			</body>
		</html>
<?php endif; ?>
<?php // @end snippet ?>
<?php // @start snippet ?>
<?php
	/* Buy the selected Twilio Number */
	if(!empty($_POST['submit']) && $_POST['submit'] == 'BUY') {
		$PhoneNumber = $_POST['PhoneNumber'];

		try {

			/* Purchase the selected PhoneNumber */
			$number = $client->account->incoming_phone_numbers->create(array(
				'PhoneNumber' => $PhoneNumber
			));

		} catch (Exception $e) {
			$err = urlencode("Error purchasing number: {$e->getMessage()}");
			header("Location: ?msg=$err");
			exit(0);
		}
		
		//add phonenumber to user db record
		$uid = $_SESSION['uid'];
		$uid = mysql_real_escape_string($uid);
		$PhoneNumber = mysql_real_escape_string($PhoneNumber);
		
		$sql = "UPDATE users SET twilio_number = '$PhoneNumber' WHERE username = '$uid'";
		$result = mysql_query($sql);
		if (!$result) {	
			$error_found = true;
			error('A database error occurred in processing your '.
				  'submission.\\nIf this error persists, please '.
				  'contact you@example.com. ');
		}

		$msg = urlencode("Thank you for purchasing $PhoneNumber");
		header("Location: ?msg=$msg");
		exit(0);
	}
?>
<?php // @end snippet ?>