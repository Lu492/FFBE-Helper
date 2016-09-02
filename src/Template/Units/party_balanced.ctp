<div class="units party">
    <h2>Build a party</h2>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#Balanced">Balanced</a></li>
        <li><a href="#Physical">Physical</a></li>
        <li><a href="#Magical">Magical</a></li>
        <li><a href="#Stats">Best by stats</a></li>
    </ul>

    <h3>Balanced party</h3>
    <p>A party based on the best units in a specific role, based on their highest rarity stats.</p>
    <p>This team will include a Tank, Physical DPS, Magic DPS, Hybrid DPS, Healer and Support where possible. You'll need to choose which ones to build your 5 unit party with.</p>

    <table id="party-table">
        <thead>
            <tr>
                <th>Tank</th>
                <th>Physical DPS</th>
                <th>Magical DPS</th>
                <th>Hybrid DPS</th>
                <th>Support</th>
                <th>Healer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $this->element('unit-card', ['unit' => $tank, 'stats' => $tankStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $physicalDps, 'stats' => $physicalStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $magicalDps, 'stats' => $magicalStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $hybridDps, 'stats' => $hybridStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $support, 'stats' => $supportStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $healer, 'stats' => $healerStats]);?></td>
            </tr>
        </tbody>
    </table>
</div>