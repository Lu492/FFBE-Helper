<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Unit'), ['action' => 'edit', $unit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unit'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Origins'), ['controller' => 'Origins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Origin'), ['controller' => 'Origins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specialisations'), ['controller' => 'Specialisations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specialisation'), ['controller' => 'Specialisations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="units view large-9 medium-8 columns content">
    <h3><?= h($unit->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($unit->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Origin') ?></th>
            <td><?= $unit->has('origin') ? $this->Html->link($unit->origin->name, ['controller' => 'Origins', 'action' => 'view', $unit->origin->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Trust Master Reward') ?></th>
            <td><?= h($unit->trust_master_reward) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($unit->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Race Id') ?></th>
            <td><?= $this->Number->format($unit->race_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Id') ?></th>
            <td><?= $this->Number->format($unit->job_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Gender Id') ?></th>
            <td><?= $this->Number->format($unit->gender_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Base Rarity') ?></th>
            <td><?= $this->Number->format($unit->base_rarity) ?></td>
        </tr>
        <tr>
            <th><?= __('Max Rarity') ?></th>
            <td><?= $this->Number->format($unit->max_rarity) ?></td>
        </tr>
        <tr>
            <th><?= __('Hp') ?></th>
            <td><?= $this->Number->format($unit->hp) ?></td>
        </tr>
        <tr>
            <th><?= __('Mp') ?></th>
            <td><?= $this->Number->format($unit->mp) ?></td>
        </tr>
        <tr>
            <th><?= __('Atk') ?></th>
            <td><?= $this->Number->format($unit->atk) ?></td>
        </tr>
        <tr>
            <th><?= __('Def') ?></th>
            <td><?= $this->Number->format($unit->def) ?></td>
        </tr>
        <tr>
            <th><?= __('Mag') ?></th>
            <td><?= $this->Number->format($unit->mag) ?></td>
        </tr>
        <tr>
            <th><?= __('Spr') ?></th>
            <td><?= $this->Number->format($unit->spr) ?></td>
        </tr>
        <tr>
            <th><?= __('Hits') ?></th>
            <td><?= $this->Number->format($unit->hits) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($unit->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($unit->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Specialisations') ?></h4>
        <?php if (!empty($unit->specialisations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($unit->specialisations as $specialisations): ?>
            <tr>
                <td><?= h($specialisations->id) ?></td>
                <td><?= h($specialisations->name) ?></td>
                <td><?= h($specialisations->created) ?></td>
                <td><?= h($specialisations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Specialisations', 'action' => 'view', $specialisations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Specialisations', 'action' => 'edit', $specialisations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Specialisations', 'action' => 'delete', $specialisations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialisations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
