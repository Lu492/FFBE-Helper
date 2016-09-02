<?php
if (!empty($specialisations)) {
    $out = '';
    foreach ($specialisations as $specialisation) {
        $out .= "<span class='label role " . \Cake\Utility\Text::slug(strtolower($specialisation->name)) . "'>" . $specialisation->name . "</span>";
        $out .= ' ';
    }

    echo rtrim($out, ' ');
}