<?php
$this->assign('title', 'Brave Exvius Units');
?>

<div class="units index">
    <?php
    if (empty($this->request->query)) {
        ?>
        <h2>Unit list</h2>
        <p>All units available in the game.</p>
        <?php
    } elseif ($this->request->query('type') === 'acquired') {
        ?>
        <h2>Your acquired units</h2>
        <p>List of units you've acquired.</p>
        <?php
    } elseif ($this->request->query('type') === 'available') {
        ?>
        <h2>Units not yet acquired</h2>
        <p>List of all units which are not in your collection yet.</p>
        <?php
    }
    ?>

    <?php if ($this->request->session()->read('Auth.User')) { ?>
        <ul class="nav nav-tabs">
            <li <?= (empty($this->request->query)) ? 'class="active"' : ''?>>
                <?= $this->Html->link('All', ['action' => 'index']);?>
            </li>
            <li <?= ($this->request->query('type') === 'acquired') ? 'class="active"' : ''?>>
                <?= $this->Html->link('Acquired', ['action' => 'index', '?' => ['type' => 'acquired']]);?>
            </li>
            <li <?= ($this->request->query('type') === 'available') ? 'class="active"' : ''?>>
                <?= $this->Html->link('Available', ['action' => 'index', '?' => ['type' => 'available']]);?>
            </li>
        </ul>
    <?php } ?>

    <?= $this->element('unit-search', ['origins' => $origins, 'specialisations' => $specialisations]);?>

    <?php
    if ($this->request->query('type') === 'acquired' || $this->request->query('type') === 'available') {
        echo $this->element('unit-add-new');
    }
    ?>

    <table summary="units" class="table" id="unittable">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name');?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('origin_id', 'Game origin');?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('Jobs.name', 'Job');?></th>
                <th>Role</th>
                <?php if ($this->request->query('type') !== 'acquired') { ?>
                    <th><?= $this->Paginator->sort('base_rarity');?></th>
                    <th><?= $this->Paginator->sort('max_rarity');?></th>
                <?php } else { ?>
                    <th><?= $this->Paginator->sort('Acquires.rarity', 'Rarity', ['direction' => 'desc']);?></th>
                    <th><?= $this->Paginator->sort('Acquires.level', 'Level', ['direction' => 'desc']);?></th>
                <?php  } ?>
                <th><?= $this->Paginator->sort('hp', $this->Html->image('hp.png') . ' HP', ['direction' => 'desc', 'escape' => false]);?></th>
                <th><?= $this->Paginator->sort('mp', $this->Html->image('mp.png') . ' MP', ['direction' => 'desc', 'escape' => false]);?></th>
                <th><?= $this->Paginator->sort('atk', $this->Html->image('atk.png') . ' ATK', ['direction' => 'desc', 'escape' => false]);?></th>
                <th><?= $this->Paginator->sort('def', $this->Html->image('def.png') . ' DEF', ['direction' => 'desc', 'escape' => false]);?></th>
                <th><?= $this->Paginator->sort('mag', $this->Html->image('mag.png') . ' MAG', ['direction' => 'desc', 'escape' => false]);?></th>
                <th><?= $this->Paginator->sort('spr', $this->Html->image('spr.png') . ' SPR', ['direction' => 'desc', 'escape' => false]);?></th>
                <th class="hidden-xs"><?= $this->Paginator->sort('hits', 'Hits per attack', ['direction' => 'desc', 'escape' => false]);?></th>
                <?php if ($this->request->query('type') === 'acquired') { ?>
                    <th>&nbsp;</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($units as $unit) {
                ?><tr>
                <td><?= $this->Html->link($unit->name, 'https://exviuswiki.com/' . \Cake\Utility\Text::slug($unit->name, '_'));?></td>
                <td class="hidden-xs"><?= $unit->origin->shortname?></td>
                <td class="hidden-xs"><?= $unit->job->name?></td>
                <td><?= $this->element('unit-specialisations', ['specialisations' => $unit->specialisations]);?></td>

                <?php if ($this->request->query('type') !== 'acquired') { ?>
                    <td><?= $unit->base_rarity . ' ' . $this->Html->image('star.png')?></td>
                    <td><?= $unit->max_rarity . ' ' . $this->Html->image('star.png')?></td>
                <?php } else { ?>
                    <td><?php
                        if ($unit->_matchingData['Acquires']->rarity == $unit->max_rarity) {
                            echo $unit->max_rarity;
                        } else {
                            echo $unit->_matchingData['Acquires']->rarity . ' of ' . $unit->max_rarity;
                        }
                        echo $this->Html->image('star.png');
                    ?></td>
                    <td><?= $this->LevelBar->progress($unit->_matchingData['Acquires']->level, $unit->max_rarity)?></td>
                <?php } ?>

                <td><?= $unit->hp?></td>
                <td><?= $unit->mp?></td>
                <td><?= $unit->atk?></td>
                <td><?= $unit->def?></td>
                <td><?= $unit->mag?></td>
                <td><?= $unit->spr?></td>
                <td class="hidden-xs"><?= $unit->hits?></td>

                <?php if ($this->request->query('type') === 'acquired') {
                    echo "<td class='actions'>";
                    echo $this->Html->link('Edit', ['controller' => 'Acquires', 'action' => 'edit', $unit->_matchingData['Acquires']->id], ['class' => 'btn btn-default btn-xs']);
                    echo $this->Html->link(
                        '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                        ['controller' => 'Acquires', 'action' => 'delete', $unit->_matchingData['Acquires']->id],
                        ['class' => 'btn btn-danger btn-xs', 'escape' => false]
                    );
                    echo "</td>";
                } ?>
                </tr><?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php $this->append('script');?>
    <script type="application/javascript">
        $(function () {
            $('#name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: '/units/unit-list',
                        dataType: 'json',
                        data: {
                            q: $('#name').val()
                        },
                        success: function (data) {
                            response(data.units);
                        }
                    });
                },
                select: function (event, ui) {
                    $('#name').val(ui.item.label);
                    $('#unit-id').val(ui.item.value);
                    return false;
                },
                minLength: 2
            });
        });
    </script>
<?php $this->end();?>