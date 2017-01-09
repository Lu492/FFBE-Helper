<?php
namespace App\View\Helper;

use Cake\View\Helper;

/**
 * LevelBar helper
 */
class LevelBarHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Build the helper
     *
     * @param array $config Array of helper configuration
     *
     * @return void
     * @throws \RuntimeException
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        if (empty($this->config('rarities'))) {
            throw new \RuntimeException(__('Expected an array of Rarity entities set to the view.'));
        }
    }

    /**
     * Generate a level progress bar
     *
     * @param int $level Units current level
     * @param int $rarity Units rarity tier
     *
     * @return string
     */
    public function progress($level, $rarity)
    {
        $maxLevel = $this->config('rarities.' . ($rarity - 1))->get('max_level');
        $percent = $this->percentComplete($level, $maxLevel);

        if ($level === $maxLevel) {
            $barLabel = 'MAX (' . $maxLevel . ')';
        } else {
            $barLabel = $level . '/' . $maxLevel . ' (' . number_format($percent, 0) . '%)';
        }

        $output = "<div class='level-bar'>";
        $output .= "<span class='bar " . $this->barClass($percent) . "' style='width:" . $percent . "%'></span>";
        $output .= "<span class='bar-label'>" . $barLabel . "</span>";
        $output .= "</div>";

        return $output;
    }

    /**
     * How much of the rarity tier is completed as a percentage
     *
     * @param int $level Units current level
     * @param int $max Max level of the rarity tier
     *
     * @return float
     */
    protected function percentComplete($level, $max)
    {
        if ($level <= $max) {
            return ($level / $max) * 100;
        }

        return 0;
    }

    /**
     * Generate an appropriate css class depending on the percentage complete
     *
     * @param float $percentComplete Percentage completion of a rarity tier
     *
     * @return string
     */
    protected function barClass($percentComplete)
    {
        switch ($percentComplete) {
            case $percentComplete >= 0 && $percentComplete <= 25:
            default:
                return 'low';
            case $percentComplete >= 26 && $percentComplete <= 50:
                return 'medium';
            case $percentComplete >= 51 && $percentComplete <= 75:
                return 'high';
            case $percentComplete >= 76 && $percentComplete <= 99:
                return 'vhigh';
            case 100:
                return 'max';
        }
    }
}
