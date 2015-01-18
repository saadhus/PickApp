<?php // common.php
// Includes any common functions we may need.

function error($msg) {
    ?>
    <script>
    <!--
		$(document).ready(
			var errors = $('#error_msg').html();
			$('#error_msg').html(errors+"<?=$msg?>");
			$('#error_msg').css('display','block');
		);
    //-->
    </script>
    <?
    exit;
}
?>
