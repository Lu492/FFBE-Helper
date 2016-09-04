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

    <table id="party-table">
        <thead>
            <tr>
                <th>Tank</th>
                <th>Physical DPS</th>
                <th>Magical DPS</th>
                <th>Support</th>
                <th>Healer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $this->element('unit-card', ['unit' => $tank, 'stats' => $tankStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $physicalDps, 'stats' => $physicalStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $magicalDps, 'stats' => $magicalStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $support, 'stats' => $supportStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $healer, 'stats' => $healerStats]);?></td>
            </tr>
        </tbody>
    </table>
</div>