<?php
   require "Services/Twilio.php";
       
       $accountSid = "ACde0ba638ec5d54a36fefb7105b28ee8c";
   $authToken = "7a7f9fa4dcee98681cc3f5601220d4c2";
       $twilioNum = "+17324973891";
       
       $client = new Services_Twilio($accountSid, $authToken);
       
   $people = array(
       "+17327897969" => "Saad Hussaini",
       );
       
       // try functions
       getAllSMS();
       sendSMS($people);
       
       function getSMS($id) {
       
       }
       
       function getAllSMS() {
       // Loop over the list of messages and echo a property for each one
               foreach ($GLOBALS['client']->account->messages as $message) {
                       echo $message->body;
               }
       }
       
       function sendSMS($people) {
       // Send a message to everyone in the array 'people'
               foreach ($people as $number => $name) {

       $sms = $GLOBALS['client']->account->messages->sendMessage(
                       $twilioNum,
                       $number,
                       "I hate you $name, I hope you die in a pit of molten pus"
               );
               echo "Sent message to the nigga name $name<br/>";
       }
       }
       
?>