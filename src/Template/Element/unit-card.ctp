<div class="unit-card">

    <?php
    if (!empty($header)) {
        echo "<h3>$header</h3>";

        $slug = $this->Text->slug(strtolower($header));
        echo "<a href='#redraw-$slug' class='btn btn-default btn-sm' data-specialisation='$specialisationId' title='Select a different unit'><span class='glyphicon glyphicon-refresh' aria-hidden='true'></span></a>";
    }
    ?>

    <?php if (!empty($unit)): ?>
        <h4><?= $unit->unit->name?></h4>
        <?php
        if (!empty($unit->unit->image)) {
            echo "<div class='sprite'>" . $this->Html->image('../files/units/image/' . $unit->unit->image_dir . '/' . $unit->unit->image) . "</div>";
        }
        ?>
        <p><?= $this->Rarity->display($unit->rarity->stars, $unit->unit->max_rarity->stars, 'stars')?></p>

        <p><?= $this->element('unit-specialisations', ['specialisations' => $unit->unit->specialisations]);?></p>

        <?php if (!empty($unit->_matchingData['Specialisations']) || !empty($unit->stats)): ?>
            <p>Favoured stats for this role.</p>
        <?php endif;?>

        <?php
        if (!empty($unit->_matchingData['Specialisations'])) {
            echo "<p>";
            foreach (explode(',', $unit->_matchingData['Specialisations']->stats) as $stat) {
                echo "<span class='badge light pad'>" . $this->Html->image($stat . '.png') . strtoupper($stat) . "</span>&nbsp;";
            }
            echo "</p>";
        } elseif (!empty($unit->stats)) {
            echo "<p>";
            foreach ($unit->stats as $stat) {
                echo "<span class='badge light pad'>" . $this->Html->image($stat . '.png') . strtoupper($stat) . "</span>&nbsp;";
            }
            echo "</p>";
        }
        ?>

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