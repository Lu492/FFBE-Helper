<div class="units index">
    <h1>Units</h1>

    <div class="search">
        <?php
        $rarities = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5];

        echo $this->Form->create(null);
        echo $this->Form->input('name');
        echo $this->Form->input('game', ['type' => 'select', 'options' => $origins, 'empty' => 'Select origin game']);
        echo $this->Form->input('job', ['empty' => 'Select unit job']);
        echo $this->Form->input('min_rarity', ['type' => 'select', 'options' => $rarities, 'empty' => 'Select lowest rarity']);
        echo $this->Form->input('max_rarity', ['type' => 'select', 'options' => $rarities, 'empty' => 'Select highest rarity']);
        echo $this->Form->submit();
        echo $this->Form->end();
        ?>
    </div>

    <table summary="units">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name');?></th>
                <th><?= $this->Paginator->sort('origin_id');?></th>
                <th><?= $this->Paginator->sort('job_id');?></th>
                <th><?= $this->Paginator->sort('base_rarity');?></th>
                <th><?= $this->Paginator->sort('max_rarity');?></th>
                <th><?= $this->Paginator->sort('hp');?></th>
                <th><?= $this->Paginator->sort('mp');?></th>
                <th><?= $this->Paginator->sort('atk');?></th>
                <th><?= $this->Paginator->sort('def');?></th>
                <th><?= $this->Paginator->sort('mag');?></th>
                <th><?= $this->Paginator->sort('spr');?></th>
                <th><?= $this->Paginator->sort('hits');?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($units as $unit) {
                ?><tr>
                <td><?= $unit->name?></td>
                <td><?= $unit->origin->shortname?></td>
                <td><?= $unit->job->name?></td>
                <td><?= $unit->base_rarity?></td>
                <td><?= $unit->max_rarity?></td>
                <td><?= $unit->hp?></td>
                <td><?= $unit->mp?></td>
                <td><?= $unit->atk?></td>
                <td><?= $unit->def?></td>
                <td><?= $unit->mag?></td>
                <td><?= $unit->spr?></td>
                <td><?= $unit->hits?></td>
                </tr><?php
            }
            ?>
        </tbody>
    </table>
</div>