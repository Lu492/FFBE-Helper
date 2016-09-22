<?php
$this->assign('title', 'Build a party');
?>

<div class="units party">
    <h2>Build a party</h2>
    <p>Automatically select from your acquired units to build a team.</p>

    <?php if ($this->request->action !== 'partyManual'): ?>
        <p>Units for the party are picked in the following order.</p>
        <ol>
            <li>Tank</li>
            <li>Physical DPS</li>
            <li>Magic DPS</li>
            <li>Healing</li>
            <li>Support</li>
            <li>Hybrid DPS</li>
        </ol>
    <?php endif;?>

    <?= $this->element('party-builder-navigation');?>

    <?php if ($this->request->action === 'partyStats'): ?>
        <h3>Party by best stats</h3>
        <p>A party where units are selected based on the best stats for a specific role, regardless of the units actual role.</p>
    <?php elseif ($this->request->action === 'partyBalanced'): ?>
        <h3>Balanced party by role</h3>
        <p>A party based on the best units in a specific role, based on their highest rarity stats. Then it'll select non-role units based on the stats for the role.</p>
    <?php elseif ($this->request->action === 'partyRarity'): ?>
        <h3>Party by single rarity</h3>
        <p>A party based on the best units by stats, but constrained to a single rarity. Default is acquired rarity of 5.</p>

        <?php echo $this->Form->create(null, ['type' => 'get', 'id' => 'party-rarity-form']); ?>
        <div class="row">
            <div class="col-md-6"><?php echo $this->Rarity->form('rarity', null, ['required' => true, 'label' => 'Acquired rarity']);?></div>
            <div class="col-md-2"><?php echo $this->Form->input('roles', ['type' => 'checkbox', 'label' => 'Pick from roles only', 'hiddenField' => false]);?></div>
            <div class="col-md-4"><?php echo $this->Form->button('<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Build party', ['class' => 'btn btn-success']);?></div>
        </div>
    <?php elseif ($this->request->action === 'partyManual'): ?>
        <h3>Manually</h3>
        <p>Select units of your choices from your acquired units. Use the autocomplete fields to search your acquired units to build your team.</p>
    <?php endif;?>

    <?php
    $options = ['header' => true];
    if ($this->request->action === 'partyRarity' && empty($this->request->query['roles'])) {
        $options = ['header' => false];
    }

    if ($this->request->action === 'partyManual') {
        echo $this->element('party-table-manual', $options);
    } else {
        echo $this->element('party-table', $options);
    }
    ?>
</div>