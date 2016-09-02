<div class="acquires edit">
    <h2>Edit your acquired unit</h2>
    <h3><?= $unit->unit->name?></h3>
    <?php
    echo $this->Form->create($unit);
    echo $this->Form->input('level', ['type' => 'number', 'min' => 1, 'max' => 80]);
    echo $this->Form->input('rarity', ['type' => 'select', 'options' => \Cake\Core\Configure::read('rarities')]);
    echo $this->Form->submit('Update', ['class' => 'btn btn-success']);
    echo $this->Html->link('Cancel', ['controller' => 'Acquires', 'action' => 'units'], ['class' => 'btn btn-default']);
    echo $this->Form->end();
    ?>
</div>