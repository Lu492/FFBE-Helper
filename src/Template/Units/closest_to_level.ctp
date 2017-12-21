<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit[]|\Cake\Collection\CollectionInterface $units
 */
$this->assign('title', 'Closest to awakening');
?>

<div class="units closest">
    <h2>Your units closest to level up</h2>
    <p>A list of all your acquired units who are 20 levels or less to awakening or reaching max.</p>

    <table summary="units" class="table" id="unittable">
        <thead>
        <tr>
            <th class="sprite hidden-xs">&nbsp;</th>
            <th>Unit</th>
            <th>Rarity</th>
            <th>Levels remaining</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($units as $unit) :?>
            <tr>
                <td class="sprite hidden-xs">
                    <?php
                    if (!empty($unit->unit->image)) {
                        echo $this->Html->image('../files/units/image/' . $unit->unit->image_dir . '/' . $unit->unit->image);
                    }
                    ?>
                </td>
                <td>
                    <?= $this->Html->link(
                        $unit->unit->name . '&nbsp;<span class="glyphicon glyphicon-share" aria-hidden="true"></span>',
                        'https://exviuswiki.com/' . \Cake\Utility\Text::slug($unit->unit->name, '_'),
                        ['escape' => false, 'title' => "View {$unit->unit->name} on ExviusWiki.com"]
                    );?>
                </td>
                <td><?= $this->Rarity->display($unit->rarity->stars, $unit->unit->max_rarity_id, 'stars')?></td>
                <td>
                    <span class="levels-remaining"><?= $unit->levels_remaining?></span>
                    <br>
                    <?= $this->LevelBar->progress($unit->level, $unit->rarity->stars);?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>