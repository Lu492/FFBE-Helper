<div class="party-table" id="party-table">
    <?= $this->element('unit-card', ['unit' => $tank, 'header' => ($header)? 'Tank' : '', 'specialisationId' => 7]);?>
    <?= $this->element('unit-card', ['unit' => $physical_damage, 'header' => ($header)? 'Physical DPS' : '', 'specialisationId' => 5]);?>
    <?= $this->element('unit-card', ['unit' => $magic_damage, 'header' => ($header)? 'Magic DPS' : '', 'specialisationId' => 4]);?>
    <?= $this->element('unit-card', ['unit' => $support, 'header' => ($header)? 'Support' : '', 'specialisationId' => 2]);?>
    <?= $this->element('unit-card', ['unit' => $healing, 'header' => ($header)? 'Healer' : '', 'specialisationId' => 1]);?>
    <?= $this->element('unit-card', ['unit' => $hybrid_damage, 'header' => ($header)? 'Hybrid DPS' : '', 'specialisationId' => 3]);?>
</div>