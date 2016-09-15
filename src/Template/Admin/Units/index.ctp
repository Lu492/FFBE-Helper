<div class="units index ">
    <h3><?= __('Units') ?></h3>

    <div class="buttons">
        <?= $this->Html->link('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;' . __('New Unit'), ['action' => 'add'], ['class' => 'btn btn-info', 'escape' => false]) ?>
    </div>

    <div class="search">
        <?php
        echo $this->Form->create(null);
        echo $this->Form->input('name');
        echo $this->Form->submit('Filter', ['class' => 'btn btn-primary']);
        echo $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-default']);
        echo $this->Form->end();
        ?>
    </div>

    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('origin_id') ?></th>
                <th><?= $this->Paginator->sort('race_id') ?></th>
                <th><?= $this->Paginator->sort('job_id') ?></th>
                <th><?= $this->Paginator->sort('gender_id') ?></th>
                <th><?= $this->Paginator->sort('base_rarity_id') ?></th>
                <th><?= $this->Paginator->sort('max_rarity_id') ?></th>
                <th><?= $this->Paginator->sort('trust_master_reward') ?></th>
                <th><?= $this->Paginator->sort('hp') ?></th>
                <th><?= $this->Paginator->sort('mp') ?></th>
                <th><?= $this->Paginator->sort('atk') ?></th>
                <th><?= $this->Paginator->sort('def') ?></th>
                <th><?= $this->Paginator->sort('mag') ?></th>
                <th><?= $this->Paginator->sort('spr') ?></th>
                <th><?= $this->Paginator->sort('hits') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($units as $unit): ?>
            <tr>
                <td><?= $this->Number->format($unit->id) ?></td>
                <td><?php
                    if (!empty($unit->image)) {
                        echo $this->Html->image('../files/units/image/' . $unit->image_dir . '/' . $unit->image, ['class' => 'table-image small']);
                    }
                    echo h($unit->name);
                ?></td>
                <td><?= $unit->origin->shortname ?></td>
                <td><?= $unit->race->name ?></td>
                <td><?= $unit->job->name ?></td>
                <td><?= $unit->gender->name ?></td>
                <td><?= $this->Number->format($unit->base_rarity->stars) ?></td>
                <td><?= $this->Number->format($unit->max_rarity->stars) ?></td>
                <td><?= h($unit->trust_master_reward) ?></td>
                <td><?= $this->Number->format($unit->hp) ?></td>
                <td><?= $this->Number->format($unit->mp) ?></td>
                <td><?= $this->Number->format($unit->atk) ?></td>
                <td><?= $this->Number->format($unit->def) ?></td>
                <td><?= $this->Number->format($unit->mag) ?></td>
                <td><?= $this->Number->format($unit->spr) ?></td>
                <td><?= $this->Number->format($unit->hits) ?></td>
                <td><?= $this->Time->timeAgoInWords($unit->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $unit->id], ['class' => 'btn btn-default btn-sm']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id), 'class' => 'btn btn-danger btn-sm']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->numbers() ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
