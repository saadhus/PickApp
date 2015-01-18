<?php
       require "search.php";

       header("content-type: text/xml");
       echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
       <Message><?php echo $sms_response ?></Message>
</Response>