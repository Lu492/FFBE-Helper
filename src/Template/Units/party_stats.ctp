<div class="units party">
    <h2>Build a party</h2>

    <ul class="nav nav-tabs">
        <li><?= $this->Html->link('Best in role', ['action' => 'partyBalanced']);?></li>
        <li class="active"><?= $this->Html->link('Best by stats', ['action' => 'partyStats']);?></li>
        <li><a href="#Physical">Physical</a></li>
        <li><a href="#Magical">Magical</a></li>
    </ul>

    <h3>Party by best stats</h3>
    <p>A party where units are selected based on the best stats for a specific role, regardless of the units actual role.</p>

    <?= $this->element('party-table');?>
</div>