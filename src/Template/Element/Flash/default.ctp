<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="alert alert-info" role="alert" onclick="this.classList.add('hidden');">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?= h($message) ?>
</div>
