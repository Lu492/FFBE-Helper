<?php
$this->assign('title', 'Brave Exvius Units');
?>

<div class="units index">
    <h2>Units</h2>
    <p>Search and filter available units. Stats are listed for the highest rarity of the unit.</p>

    <div class="search row">
        <?php
        $rarities = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5];

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

    <table summary="units" class="table" id="unittable">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name');?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('origin_id');?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('job_id');?></th>
                <th>Role</th>
                <th><?= $this->Paginator->sort('base_rarity');?></th>
                <th><?= $this->Paginator->sort('max_rarity');?></th>
                <th><?= $this->Paginator->sort('hp', $this->Html->image('hp.png') . ' HP', ['direction' => 'desc', 'escape' => false]);?></th>
                <th><?= $this->Paginator->sort('mp', $this->Html->image('mp.png') . ' MP', ['direction' => 'desc', 'escape' => false]);?></th>
                <th><?= $this->Paginator->sort('atk', $this->Html->image('atk.png') . ' ATK', ['direction' => 'desc', 'escape' => false]);?></th>
                <th><?= $this->Paginator->sort('def', $this->Html->image('def.png') . ' DEF', ['direction' => 'desc', 'escape' => false]);?></th>
                <th><?= $this->Paginator->sort('mag', $this->Html->image('mag.png') . ' MAG', ['direction' => 'desc', 'escape' => false]);?></th>
                <th><?= $this->Paginator->sort('spr', $this->Html->image('spr.png') . ' SPR', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('hits', 'Hits per attack', ['direction' => 'desc', 'escape' => false]);?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($units as $unit) {
                ?><tr>
                <td><?= $unit->name?></td>
                <td class="hidden-xs"><?= $unit->origin->shortname?></td>
                <td class="hidden-xs"><?= $unit->job->name?></td>
                <td><?php
                if (!empty($unit->specialisations)) {
                    $out = '';
                    foreach ($unit->specialisations as $specialisation) {
                        $out .= "<span class='label role " . \Cake\Utility\Text::slug(strtolower($specialisation->name)) . "'>" . $specialisation->name . "</span>";
                        $out .= ' ';
                    }

                    echo rtrim($out, ' ');
                }
                ?></td>
                <td><?= $unit->base_rarity . ' ' . $this->Html->image('star.png')?></td>
                <td><?= $unit->max_rarity . ' ' . $this->Html->image('star.png')?></td>
                <td><?= $unit->hp?></td>
                <td><?= $unit->mp?></td>
                <td><?= $unit->atk?></td>
                <td><?= $unit->def?></td>
                <td><?= $unit->mag?></td>
                <td><?= $unit->spr?></td>
                <td class="hidden-xs"><?= $unit->hits?></td>
                </tr><?php
            }
            ?>
        </tbody>
    </table>
</div>