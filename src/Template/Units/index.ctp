<?php
$this->assign('title', 'Brave Exvius Units');

/* @var \App\View\AppView $this */
?>

<div class="units index">
    <?php
    if ($this->request->params['type'] === 'all') {
        ?>
        <h2>Unit list</h2>
        <p>All units available in the game.</p>
        <div class="alert alert-info">Unit database last updated: <?= $lastUpdate->modified->timezone('America/Los_Angeles')->format('D j M Y H:i:s T');?></div>
        <?php
    } elseif ($this->request->params['type'] === 'acquired') {
        ?>
        <h2>Your acquired units</h2>
        <p>List of units you've acquired.</p>
        <?php
    } elseif ($this->request->params['type'] === 'available') {
        ?>
        <h2>Units not yet acquired</h2>
        <p>List of all units which are not in your collection yet.</p>
        <?php
    }
    ?>
    <p>Stats are listed for the highest rarity of the unit.</p>

    <?php if ($this->request->session()->read('Auth.User')) { ?>
        <ul class="nav nav-tabs unit-nav">
            <li <?= ($this->request->params['type'] === 'all') ? 'class="active"' : ''?>>
                <?= $this->Html->link('All', ['action' => 'index', 'type' => 'all']);?>
            </li>
            <li <?= ($this->request->params['type'] === 'acquired') ? 'class="active"' : ''?>>
                <?= $this->Html->link('Acquired', ['action' => 'index', 'type' => 'acquired']);?>
            </li>
            <li <?= ($this->request->params['type'] === 'available') ? 'class="active"' : ''?>>
                <?= $this->Html->link('Available', ['action' => 'index', 'type' => 'available']);?>
            </li>
        </ul>
    <?php } ?>

    <div class="container-fluid">
        <?= $this->element('unit-search', ['origins' => $origins, 'specialisations' => $specialisations]);?>

        <?php
        if ($this->request->params['type'] === 'acquired' || $this->request->params['type'] === 'available') {
            echo $this->element('unit-add-new');
        }
        ?>
    </div>

    <?php if ($units->isEmpty() && $this->request->params['type'] === 'acquired') : ?>
        <div class="alert alert-warning">
            Sorry, you have not acquired any units which match that search.
            <?= $this->Html->link('Re-run search with all units.', ['controller' => 'Units', 'action' => 'index', 'type' => 'all', '?' => $this->request->query])?>
        </div>
    <?php elseif ($units->isEmpty() && $this->request->params['type'] === 'acquired') : ?>
        <div class="alert alert-warning">Sorry, no units were found for that search.</div>
    <?php else : ?>
    <table summary="units" class="table" id="unittable">
        <thead>
            <tr>
                <?php
                $this->Paginator->options(['url' => ['action' => 'index', 'type' => $this->request->params['type']]]);
                ?>

                <th class="hidden-xs">&nbsp;</th>
                <th><?= $this->Paginator->sort('name');?></th>
                <th class="visible-lg"><?= $this->Paginator->sort('origin_id', 'Game origin');?></th>
                <th class="visible-lg"><?= $this->Paginator->sort('Jobs.name', 'Job');?></th>
                <th class="visible-lg">Role</th>
                <?php if ($this->request->params['type'] !== 'acquired') { ?>
                    <th><?= $this->Paginator->sort('base_rarity_id');?></th>
                    <th><?= $this->Paginator->sort('max_rarity_id');?></th>
                <?php } else { ?>
                    <th><?= $this->Paginator->sort('Acquires.rarity_id', 'Rarity', ['direction' => 'desc']);?></th>
                    <th><?= $this->Paginator->sort('Acquires.level', 'Level', ['direction' => 'desc']);?></th>
                    <th class="hidden-xs"><?= $this->Paginator->sort('Acquires.trust', 'Trust %', ['direction' => 'desc']);?></th>
                <?php  } ?>
                <th class="visible-lg"><?= $this->Paginator->sort('hp', $this->Html->image('hp.png') . ' HP', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="visible-lg"><?= $this->Paginator->sort('mp', $this->Html->image('mp.png') . ' MP', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="visible-lg"><?= $this->Paginator->sort('atk', $this->Html->image('atk.png') . ' ATK', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="visible-lg"><?= $this->Paginator->sort('def', $this->Html->image('def.png') . ' DEF', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="visible-lg"><?= $this->Paginator->sort('mag', $this->Html->image('mag.png') . ' MAG', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="visible-lg"><?= $this->Paginator->sort('spr', $this->Html->image('spr.png') . ' SPR', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="visible-lg"><?= $this->Paginator->sort('hits', 'Hits per attack', ['direction' => 'desc', 'escape' => false]);?></th>
                <?php if ($this->request->params['type'] === 'acquired') { ?>
                    <th>&nbsp;</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($units as $unit) { ?>
                <tr>
                    <td class="sprite hidden-xs">
                        <?php
                        if (!empty($unit->image)) {
                            echo $this->Html->image('../files/units/image/' . $unit->image_dir . '/' . $unit->image);
                        }
                        ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            $unit->name . '&nbsp;<span class="glyphicon glyphicon-share" aria-hidden="true"></span>',
                            'https://exviuswiki.com/' . \Cake\Utility\Text::slug($unit->name, '_'),
                            ['escape' => false, 'title' => "View {$unit->name} on ExviusWiki.com"]
                        );?>
                    </td>
                    <td class="visible-lg"><?= $unit->origin->shortname?></td>
                    <td class="visible-lg"><?= $unit->job->name?></td>
                    <td class="visible-lg"><?= $this->element('unit-specialisations', ['specialisations' => $unit->specialisations]);?></td>

                    <?php if ($this->request->params['type'] !== 'acquired') { ?>
                        <td><?= $unit->base_rarity->stars . ' ' . $this->Html->image('Rarity-' . $unit->base_rarity->stars . '.png')?></td>
                        <td><?= $unit->max_rarity->stars . ' ' . $this->Html->image('Rarity-' . $unit->max_rarity->stars . '.png')?></td>
                    <?php } else { ?>
                        <td>
                            <span class="visible-md visible-lg"><?php echo $this->Rarity->display($unit->_matchingData['Acquires']->rarity_id, $unit->max_rarity->stars, 'stars');?></span>
                            <span class="hidden-md hidden-lg"><?php echo $this->Rarity->display($unit->_matchingData['Acquires']->rarity_id, $unit->max_rarity->stars, 'numbers');?></span>
                        </td>
                        <td><?= $this->LevelBar->progress($unit->_matchingData['Acquires']->level, $unit->_matchingData['Acquires']->rarity_id);?></td>
                        <td class="hidden-xs"><?= $unit->_matchingData['Acquires']->trust?>%</td>
                    <?php } ?>

                    <td class="visible-lg"><?= $unit->hp?></td>
                    <td class="visible-lg"><?= $unit->mp?></td>
                    <td class="visible-lg"><?= $unit->atk?></td>
                    <td class="visible-lg"><?= $unit->def?></td>
                    <td class="visible-lg"><?= $unit->mag?></td>
                    <td class="visible-lg"><?= $unit->spr?></td>
                    <td class="visible-lg"><?= $unit->hits?></td>

                    <?php
                    if ($this->request->params['type'] === 'acquired') {
                        echo "<td class='actions'>";
                        echo $this->Html->link('Edit', ['controller' => 'Acquires', 'action' => 'edit', $unit->_matchingData['Acquires']->id], ['class' => 'btn btn-default btn-sm']);
                        echo $this->Html->link(
                            '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                            ['controller' => 'Acquires', 'action' => 'delete', $unit->_matchingData['Acquires']->id],
                            ['class' => 'btn btn-danger btn-sm', 'escape' => false]
                        );
                        echo "</td>";
                    }
                    ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>