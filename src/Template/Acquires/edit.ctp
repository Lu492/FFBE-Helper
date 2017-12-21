<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>
<div class="acquires edit container">
    <div class="col-md-6 col-md-offset-3">
        <div class="unit-detail">
            <?php
            if (!empty($unit->unit->image)) {
                echo "<div class='sprite'>" . $this->Html->image('../files/units/image/' . $unit->unit->image_dir . '/' . $unit->unit->image) . "</div>";
            }
            ?>

            <div class='details'>
                <h2><?= $unit->unit->name?></h2>
                <p><?= $this->element('unit-specialisations', ['specialisations' => $unit->unit->specialisations])?></p>
            </div>
            <div class="clearfix"><!-- blank --></div>
        </div>

        <?php
        echo $this->Form->create($unit);
        echo $this->Form->input('level', ['type' => 'number', 'min' => 1, 'max' => 100]);

        $allowed = [];
        for ($i = $unit->unit->base_rarity->stars; $i <= $unit->unit->max_rarity->stars; $i++) {
            $allowed[$i] = (object)['id' => $i, 'stars' => $i];
        }

        echo $this->Rarity->form('rarity_id', $unit, ['allowed' => $allowed, 'label' => 'Rarity', 'type' => 'combo', 'reset' => false]);

        echo $this->Form->input('trust', ['type' => 'number', 'min' => 0, 'max' => 100]);

        echo $this->Form->input('unit_id', ['type' => 'hidden', 'value' => $unit->unit_id]);
        echo $this->Form->submit('Update', ['class' => 'btn btn-success']);
        echo $this->Html->link('Cancel', ['controller' => 'Units', 'action' => 'index', 'type' => 'acquired'], ['class' => 'btn btn-default']);
        echo $this->Form->end();
        ?>
    </div>
</div>