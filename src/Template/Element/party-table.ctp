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
        <td><?= $this->element('unit-card', ['unit' => $tank]);?></td>
        <td><?= $this->element('unit-card', ['unit' => $physical_damage]);?></td>
        <td><?= $this->element('unit-card', ['unit' => $magic_damage]);?></td>
        <td><?= $this->element('unit-card', ['unit' => $support]);?></td>
        <td><?= $this->element('unit-card', ['unit' => $healing]);?></td>
    </tr>
    </tbody>
</table>