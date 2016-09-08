<div class="unit-card">
    <?php if (!empty($unit)): ?>
        <h4><?= $unit->unit->name?></h4>
        <p><?= $this->Rarity->display($unit->rarity->stars, $unit->unit->max_rarity->stars, 'stars')?></p>

        <p><?= $this->element('unit-specialisations', ['specialisations' => $unit->unit->specialisations]);?></p>

        <p>Favoured stats for this role.</p>
        <p>
        <?php
        if (!empty($unit->_matchingData['Specialisations'])) {
            foreach (explode(',', $unit->_matchingData['Specialisations']->stats) as $stat) {
                echo "<span class='badge light pad'>" . $this->Html->image($stat . '.png') . strtoupper($stat) . "</span>&nbsp;";
            }
        } elseif (!empty($unit->stats)) {
            foreach ($unit->stats as $stat) {
                echo "<span class='badge light pad'>" . $this->Html->image($stat . '.png') . strtoupper($stat) . "</span>&nbsp;";
            }
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
    <?php else:?>
        <h4><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> Sorry</h4>
        <p>Could not find a unit in your collection<br>matching the specified criteria.</p>
    <?php endif;?>
</div>