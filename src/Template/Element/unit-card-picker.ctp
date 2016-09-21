<div class="unit-card picker">
    <?= '<h3>' . $header . '</h3>';?>

    <div class="unit-placeholder"></div>

    <?php
    $unitSlug = $this->Text->slug(strtolower($header));

    echo $this->Form->create(null, ['id' => 'unit-picker-' . $unitSlug]);
    echo $this->Form->input('unit_name', [
        'autocomplete' => 'off',
        'required' => true,
        'label' => 'Search for unit',
        'id' => 'unit-name-' . $unitSlug,
        'name' => 'unit-name-' . $unitSlug
    ]);
    echo $this->Form->end();
    ?>
</div>