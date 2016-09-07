<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Rarity helper
 */
class RarityHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'rarities' => [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5
        ]
    ];

    /**
     * Which helpers to load for this helper
     *
     * @var array
     */
    public $helpers = [
        'Html',
        'Form'
    ];

    /**
     * Display the rarity of it's maximum, optionally with a star icon
     *
     * @param int $level Current rarity level
     * @param int $max Maximum attainable rarity level
     * @param bool $stars
     *
     * @return string
     */
    public function display($level, $max, $stars = true)
    {
        $out = $level . ' of ' . $max;
        if ($stars) {
            $out .= '&nbsp;' . $this->Html->image('stars.png');
        }

        return $out;
    }

    /**
     * Output a set of radio buttons for selecting rarity level
     *
     * @return string;
     */
    public function form()
    {
        // TODO: Figure out why this isn't outputting a radio button
        $this->Form->templates([
            'radioWrapper' => '<div class="radio"><label{{attrs}}>{{text}}</label></div>',
        ]);
        $radios = $this->Form->radio('rarity', $this->config('rarities'));
        return "<div class='form-group radio'>$radios</div>";
    }
}
