<?php
$class = 'alert alert-info';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script>
$(document).ready(function () {
	$.Notification.notify('info', 'top right', '','<?= $message?>')
});
</script>