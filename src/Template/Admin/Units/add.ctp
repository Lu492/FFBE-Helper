<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Origins'), ['controller' => 'Origins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Origin'), ['controller' => 'Origins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specialisations'), ['controller' => 'Specialisations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialisation'), ['controller' => 'Specialisations', 'action' => 'add']) ?></li>
    </ul>
</nav>
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
        echo $this->Form->input('race_id', ['empty' => 'Select race']);
        echo $this->Form->input('Races.name', ['label' => 'Or add new Race', 'required' => false]);
        echo $this->Form->input('job_id', ['empty' => 'Select job']);
        echo $this->Form->input('Jobs.name', ['label' => 'Or add new Job', 'required' => false]);
        echo $this->Form->input('gender_id', ['empty' => 'Select gender']);
        echo $this->Form->input('Genders.name', ['label' => 'Or add new Gender', 'required' => false]);
        echo $this->element('Admin/unit-stats');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
