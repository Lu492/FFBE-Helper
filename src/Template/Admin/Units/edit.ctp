<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>
<div class="units form large-9 medium-8 columns content">
    <?= $this->Form->create($unit, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Unit') ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('description');
        echo $this->Form->input('origin_id', ['options' => $origins]);
        echo $this->Form->input('specialisations._ids', ['options' => $specialisations]);
        echo $this->Rarity->form('base_rarity_id', $unit, ['required' => true, 'label' => 'Base rarity', 'type' => 'combo']);
        echo $this->Rarity->form('max_rarity_id', $unit, ['required' => true, 'label' => 'Max rarity', 'type' => 'combo']);
        echo $this->Form->input('trust_master_reward');
        echo $this->Form->input('race_id');
        echo $this->Form->input('gender_id');
        echo $this->Form->input('job_id');
        echo $this->Form->input('image', ['type' => 'file']);
        if (!empty($unit->image)) {
            echo $this->Html->image('../files/units/image/' . $unit->image_dir . '/' . $unit->image);
        }

        echo $this->element('Admin/unit-stats');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
