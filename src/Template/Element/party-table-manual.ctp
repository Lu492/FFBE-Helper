<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="manual-party">
    <?= $this->element('unit-card-picker', ['header' => 'Tank']);?>
    <?= $this->element('unit-card-picker', ['header' => 'Physical DPS']);?>
    <?= $this->element('unit-card-picker', ['header' => 'Magic DPS']);?>
    <?= $this->element('unit-card-picker', ['header' => 'Support']);?>
    <?= $this->element('unit-card-picker', ['header' => 'Healing']);?>
    <?= $this->element('unit-card-picker', ['header' => 'Hybrid DPS']);?>
</div>
