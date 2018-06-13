<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert alert-success col-auto text-center text-success" onclick="this.classList.add('hidden');">
    <?= $message ?>
</div>