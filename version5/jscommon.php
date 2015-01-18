<?php // jscommon.php
// Includes any common js functions we may need.

function error($msg) {
    ?>
    <script>
		$(document).ready(function(){
			var errors = $('#error_msg').html();
			$('#error_msg').html(errors+"<?=$msg?>");
			$('#error_msg').css('display','block');
		});
    </script>
    <?
}
function redirect($url) {
	?>
	<script>
			location.href = "<?=$url?>";
	</script>
	<?
	}
?>
