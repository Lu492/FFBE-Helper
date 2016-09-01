<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Origins'), ['controller' => 'Origins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Origin'), ['controller' => 'Origins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specialisations'), ['controller' => 'Specialisations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialisation'), ['controller' => 'Specialisations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="units index large-9 medium-8 columns content">
    <h3><?= __('Units') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('origin_id') ?></th>
                <th><?= $this->Paginator->sort('race_id') ?></th>
                <th><?= $this->Paginator->sort('job_id') ?></th>
                <th><?= $this->Paginator->sort('gender_id') ?></th>
                <th><?= $this->Paginator->sort('base_rarity') ?></th>
                <th><?= $this->Paginator->sort('max_rarity') ?></th>
                <th><?= $this->Paginator->sort('trust_master_reward') ?></th>
                <th><?= $this->Paginator->sort('hp') ?></th>
                <th><?= $this->Paginator->sort('mp') ?></th>
                <th><?= $this->Paginator->sort('atk') ?></th>
                <th><?= $this->Paginator->sort('def') ?></th>
                <th><?= $this->Paginator->sort('mag') ?></th>
                <th><?= $this->Paginator->sort('spr') ?></th>
                <th><?= $this->Paginator->sort('hits') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($units as $unit): ?>
            <tr>
                <td><?= $this->Number->format($unit->id) ?></td>
                <td><?= h($unit->name) ?></td>
                <td><?= $unit->origin->shortname ?></td>
                <td><?= $unit->race->name ?></td>
                <td><?= $unit->job->name ?></td>
                <td><?= $unit->gender->name ?></td>
                <td><?= $this->Number->format($unit->base_rarity) ?></td>
                <td><?= $this->Number->format($unit->max_rarity) ?></td>
                <td><?= h($unit->trust_master_reward) ?></td>
                <td><?= $this->Number->format($unit->hp) ?></td>
                <td><?= $this->Number->format($unit->mp) ?></td>
                <td><?= $this->Number->format($unit->atk) ?></td>
                <td><?= $this->Number->format($unit->def) ?></td>
                <td><?= $this->Number->format($unit->mag) ?></td>
                <td><?= $this->Number->format($unit->spr) ?></td>
                <td><?= $this->Number->format($unit->hits) ?></td>
                <td><?= h($unit->created) ?></td>
                <td><?= h($unit->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $unit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $unit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
