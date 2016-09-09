<?= $this->element('unit-card', ['unit' => $tank, 'header' => ($header)? 'Tank' : '']);?>
<?= $this->element('unit-card', ['unit' => $physical_damage, 'header' => ($header)? 'Physical DPS' : '']);?>
<?= $this->element('unit-card', ['unit' => $magic_damage, 'header' => ($header)? 'Magic DPS' : '']);?>
<?= $this->element('unit-card', ['unit' => $support, 'header' => ($header)? 'Support' : '']);?>
<?= $this->element('unit-card', ['unit' => $healing, 'header' => ($header)? 'Healer' : '']);?>