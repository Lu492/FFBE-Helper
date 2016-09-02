<?php $this->assign('title', 'My Brave Exvius Units');?>

<div class="units acquire">
    <h2>Your acquired units</h2>

    <div class="search">
        <p>Find and add new units to your collection.</p>

        <div class="row well">
            <?php
            /* @var \App\View\AppView $this */
            echo $this->Form->create(null);?>

            <div class="col-md-4">
                <?php echo $this->Form->input('name', ['autocomplete' => 'off', 'help' => 'Type the first few characters of the unit to auto-complete.', 'required' => true]);?>
                <?php echo $this->Form->input('unit_id', ['type' => 'hidden']);?>
            </div>
            <div class="col-md-4">
                <?php echo $this->Form->input('rarity', ['type' => 'select', 'options' => \Cake\Core\Configure::read('rarities')]);?>
            </div>
            <div class="col-md-4">
                <?php echo $this->Form->input('level', ['type' => 'number', 'min' => 1, 'max' => 80, 'placeholder' => 1]);?>
            </div>
            <div class="col-md-12">
                <?php
                echo $this->Form->button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Acquire unit', ['class' => 'btn btn-primary']);
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>

    <?php if (!empty($units)) { ?>
        <table summary="units" class="table" id="unittable">
            <thead>
                <th><?= $this->Paginator->sort('name');?></th>
                <th>Role</th>
                <th><?= $this->Paginator->sort('level');?></th>
                <th><?= $this->Paginator->sort('rarity')?></th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
            <?php foreach ($units as $unit) { ?>
                <tr>
                    <td><?= $unit->unit->name?></td>
                    <td><?= $this->element('unit-specialisations', ['specialisations' => $unit->unit->specialisations]);?></td>
                    <td><?= $this->LevelBar->progress($unit->level, $unit->rarity)?></td>
                    <td><?= $unit->rarity . ' ' . $this->Html->image('star.png')?></td>
                    <td>
                        <?= $this->Html->link('Edit', ['controller' => 'Acquires', 'action' => 'edit', $unit->id], ['class' => 'btn btn-default btn-xs']);?>
                        <?= $this->Html->link(
                            '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                            ['controller' => 'Acquires', 'action' => 'delete', $unit->id],
                            ['class' => 'btn btn-danger btn-xs', 'escape' => false]
                        );?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "<p>You have not acquired any units yet.</p>";
    } ?>
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
