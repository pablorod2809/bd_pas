<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<script>
$(document).ready(function () {
	$.Notification.notify('error', 'top right', '','<?= $message?>')
});
</script>



