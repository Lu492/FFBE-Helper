<div class="acquires edit">
    <h2>Edit your acquired unit</h2>
    <h3><?= $unit->unit->name?></h3>
    <?php
    echo $this->Form->create($unit);
    echo $this->Form->input('level', ['type' => 'number', 'min' => 1, 'max' => 80]);
    echo $this->Rarity->form('rarity', $unit, 'stars');
    echo $this->Form->submit('Update', ['class' => 'btn btn-success']);
    echo $this->Html->link('Cancel', ['controller' => 'Units', 'action' => 'index', 'type' => 'acquired'], ['class' => 'btn btn-default']);
    echo $this->Form->end();
    ?>
</div>