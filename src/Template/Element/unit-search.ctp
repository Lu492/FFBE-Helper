<div class="search row well">
    <p>Search and filter available units. Stats are listed for the highest rarity of the unit.</p>
    <?php
    $rarities = \Cake\Core\Configure::read('rarities');

    echo $this->Form->create(null, ['id' => 'unitsearchform']);

    ?><div class='col-md-6'><?php
        echo $this->Form->input('name');
        echo $this->Form->input('game', ['type' => 'select', 'options' => $origins, 'empty' => 'Select origin game']);
        echo $this->Form->input('job', ['empty' => 'Select unit job']);
        ?></div>
    <div class="col-md-6"><?php
        echo $this->Form->input('role', ['type' => 'select', 'options' => $specialisations, 'empty' => 'Select role']);
        echo $this->Form->input('min_rarity', ['type' => 'select', 'options' => $rarities, 'empty' => 'Select lowest rarity']);
        echo $this->Form->input('max_rarity', ['type' => 'select', 'options' => $rarities, 'empty' => 'Select highest rarity']);
        ?></div>
    <?php
    echo $this->Form->submit('Search', ['class' => 'btn btn-success']);
    echo $this->Form->end();
    echo $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-default']);
    ?>
</div>