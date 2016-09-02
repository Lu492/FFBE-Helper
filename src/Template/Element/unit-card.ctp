<div class="unit-card">
    <h4><?= $unit->unit->name?></h4>
    <p><?= $unit->rarity;?> of <?= $unit->unit->max_rarity?> <?= $this->Html->image('star.png')?></p>

    <p><?= $this->element('unit-specialisations', ['specialisations' => $unit->unit->specialisations]);?></p>

    <p>Favoured stats for this role.</p>
    <p>
    <?php
    foreach ($stats as $stat => $dir) {
        echo "<span class='badge'>" . strtoupper($stat) . "</span>&nbsp;";
    }
    ?>
    </p>

    <p>Max stats</p>
    <table>
        <tr>
            <th><?= $this->Html->image('hp.png');?> HP</th>
            <th><?= $this->Html->image('mp.png');?> MP</th>
        </tr>
        <tr>
            <td><?= $unit->unit->hp?></td>
            <td><?= $unit->unit->mp?></td>
        </tr>
        <tr>
            <th><?= $this->Html->image('atk.png');?> ATK</th>
            <th><?= $this->Html->image('def.png');?> DEF</th>
        </tr>
        <tr>
            <td><?= $unit->unit->atk?></td>
            <td><?= $unit->unit->def?></td>
        </tr>
        <tr>
            <th><?= $this->Html->image('mag.png');?> MAG</th>
            <th><?= $this->Html->image('spr.png');?> SPR</th>
        </tr>
        <tr>
            <td><?= $unit->unit->mag?></td>
            <td><?= $unit->unit->spr?></td>
        </tr>
    </table>
</div>