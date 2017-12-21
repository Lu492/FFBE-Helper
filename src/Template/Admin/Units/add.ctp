<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>
<div class="units form large-9 medium-8 columns content">
    <?= $this->Form->create($unit, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Unit') ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('description');
        echo $this->Form->input('origin_id', ['options' => $origins]);
        echo $this->Form->input('specialisations._ids', ['options' => $specialisations]);
        echo $this->Rarity->form('base_rarity_id', $unit, ['required' => true, 'label' => 'Base rarity', 'type' => 'combo']);
        echo $this->Rarity->form('max_rarity_id', $unit, ['required' => true, 'label' => 'Max rarity', 'type' => 'combo']);
        echo $this->Form->input('trust_master_reward');
        echo $this->Form->input('image', ['type' => 'file']);

        ?>
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->input('race_id', ['empty' => 'Select race']);?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->input('Races.name', ['label' => 'Or add new Race', 'required' => false]);?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->input('gender_id', ['empty' => 'Select gender']);?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->input('Genders.name', ['label' => 'Or add new Gender', 'required' => false]);?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->input('job_id', ['empty' => 'Select job']);?>
            </div>
            <div class="col-md-6">
                <?= $this->Form->input('Jobs.name', ['label' => 'Or add new Job', 'required' => false]);?>
            </div>
        </div>

        <?php echo $this->element('Admin/unit-stats');?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
