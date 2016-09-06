<div class="units party">
    <h2>Build a party</h2>

    <?= $this->element('party-builder-navigation');?>

    <h3>Balanced party by role</h3>
    <p>A party based on the best units in a specific role, based on their highest rarity stats. Then it'll select non-role units based on the stats for the role.</p>

    <?= $this->element('party-table');?>
</div>