<div class="units form large-9 medium-8 columns content">
    <?= $this->Form->create($unit) ?>
    <fieldset>
        <legend><?= __('Add Unit') ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('origin_id', ['options' => $origins]);
        echo $this->Form->input('specialisations._ids', ['options' => $specialisations]);
        echo $this->Form->input('base_rarity', ['type' => 'number', 'min' => 1, 'max' => 5]);
        echo $this->Form->input('max_rarity', ['type' => 'number', 'min' => 1, 'max' => 5]);
        echo $this->Form->input('trust_master_reward');

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
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
