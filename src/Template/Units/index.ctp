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

    <?php if ($units->isEmpty() && $this->request->params['type'] === 'acquired'): ?>
        <div class="alert alert-warning">
            Sorry, you have not acquired any units which match that search.
            <?= $this->Html->link('Re-run search with all units.', ['controller' => 'Units', 'action' => 'index', 'type' => 'all', '?' => $this->request->query])?>
        </div>
    <?php elseif ($units->isEmpty() && $this->request->params['type'] === 'acquired'): ?>
        <div class="alert alert-warning">Sorry, no units were found for that search.</div>
    <?php else: ?>
    <table summary="units" class="table" id="unittable">
        <thead>
            <tr>
                <?php
                $this->Paginator->options(['url' => ['action' => 'index', 'type' => $this->request->params['type']]]);
                ?>

                <th>&nbsp;</th>
                <th><?= $this->Paginator->sort('name');?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('origin_id', 'Game origin');?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('Jobs.name', 'Job');?></th>
                <th>Role</th>
                <?php if ($this->request->params['type'] !== 'acquired') { ?>
                    <th><?= $this->Paginator->sort('base_rarity_id');?></th>
                    <th><?= $this->Paginator->sort('max_rarity_id');?></th>
                <?php } else { ?>
                    <th><?= $this->Paginator->sort('Acquires.rarity', 'Rarity', ['direction' => 'desc']);?></th>
                    <th><?= $this->Paginator->sort('Acquires.level', 'Level', ['direction' => 'desc']);?></th>
                    <th class="hidden-xs"><?= $this->Paginator->sort('Acquires.trust', 'Trust %', ['direction' => 'desc']);?></th>
                <?php  } ?>
                <th class="hidden-xs"><?= $this->Paginator->sort('hp', $this->Html->image('hp.png') . ' HP', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('mp', $this->Html->image('mp.png') . ' MP', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('atk', $this->Html->image('atk.png') . ' ATK', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('def', $this->Html->image('def.png') . ' DEF', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('mag', $this->Html->image('mag.png') . ' MAG', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('spr', $this->Html->image('spr.png') . ' SPR', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('hits', 'Hits per attack', ['direction' => 'desc', 'escape' => false]);?></th>
                <?php if ($this->request->params['type'] === 'acquired') { ?>
                    <th>&nbsp;</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($units as $unit) { ?>
                <tr>
                    <td class="sprite">
                        <?php
                        if (!empty($unit->image)) {
                            echo $this->Html->image('../files/units/image/' . $unit->image_dir . '/' . $unit->image);
                        }
                        ?>
                    </td>
                    <td><?= $this->Html->link($unit->name, 'https://exviuswiki.com/' . \Cake\Utility\Text::slug($unit->name, '_'));?></td>
                    <td class="hidden-xs"><?= $unit->origin->shortname?></td>
                    <td class="hidden-xs"><?= $unit->job->name?></td>
                    <td><?= $this->element('unit-specialisations', ['specialisations' => $unit->specialisations]);?></td>

                    <?php if ($this->request->params['type'] !== 'acquired') { ?>
                        <td><?= $unit->base_rarity->stars . ' ' . $this->Html->image('star.png')?></td>
                        <td><?= $unit->max_rarity->stars . ' ' . $this->Html->image('star.png')?></td>
                    <?php } else { ?>
                        <td>
                            <?php echo $this->Rarity->display($unit->_matchingData['Acquires']->rarity_id, $unit->max_rarity->stars, 'stars');?>
                        </td>
                        <td><?= $this->LevelBar->progress($unit->_matchingData['Acquires']->level, $unit->_matchingData['Acquires']->rarity_id);?></td>
                        <td class="hidden-xs"><?= $unit->_matchingData['Acquires']->trust?>%</td>
                    <?php } ?>

                    <td class="hidden-xs"><?= $unit->hp?></td>
                    <td class="hidden-xs"><?= $unit->mp?></td>
                    <td class="hidden-xs"><?= $unit->atk?></td>
                    <td class="hidden-xs"><?= $unit->def?></td>
                    <td class="hidden-xs"><?= $unit->mag?></td>
                    <td class="hidden-xs"><?= $unit->spr?></td>
                    <td class="hidden-xs"><?= $unit->hits?></td>

                    <?php
                    if ($this->request->params['type'] === 'acquired') {
                        echo "<td class='actions'>";
                        echo $this->Html->link('Edit', ['controller' => 'Acquires', 'action' => 'edit', $unit->_matchingData['Acquires']->id], ['class' => 'btn btn-default']);
                        echo $this->Html->link(
                            '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                            ['controller' => 'Acquires', 'action' => 'delete', $unit->_matchingData['Acquires']->id],
                            ['class' => 'btn btn-danger', 'escape' => false]
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