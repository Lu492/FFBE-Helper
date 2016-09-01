<div class="units form large-9 medium-8 columns content">
    <?= $this->Form->create($unit) ?>
    <fieldset>
        <legend><?= __('Edit Unit') ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('origin_id', ['options' => $origins]);
        echo $this->Form->input('specialisations._ids', ['options' => $specialisations]);
        echo $this->Form->input('base_rarity', ['type' => 'number', 'min' => 1, 'max' => 5]);
        echo $this->Form->input('max_rarity', ['type' => 'number', 'min' => 1, 'max' => 5]);
        echo $this->Form->input('trust_master_reward');
        echo $this->Form->input('race_id');
        echo $this->Form->input('gender_id');
        echo $this->Form->input('job_id');
        echo $this->element('Admin/unit-stats');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
