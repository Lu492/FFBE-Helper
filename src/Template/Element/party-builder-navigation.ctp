<ul class="nav nav-tabs">
    <li <?= ($this->request->action === 'partyBalanced') ? 'class="active"' : ''?>>
        <?= $this->Html->link('Best in role', ['action' => 'partyBalanced']);?>
    </li>
    <li <?= ($this->request->action === 'partyStats') ? 'class="active"' : ''?>>
        <?= $this->Html->link('Best by stats', ['action' => 'partyStats']);?>
    </li>
    <li>
        <a href="#Physical">Physical</a>
    </li>
    <li>
        <a href="#Magical">Magical</a>
    </li>
    <li>
        <a href="#Rarity">Single rarity</a>
    </li>
</ul>