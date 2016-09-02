<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

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
    protected $_defaultConfig = [
        'rarities' => [
            1 => ['maxLevel' => 15],
            2 => ['maxLevel' => 30],
            3 => ['maxLevel' => 40],
            4 => ['maxLevel' => 60],
            5 => ['maxLevel' => 80]
        ]
    ];

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
        $maxLevel = $this->config('rarities.' . $rarity . '.maxLevel');
        $percent = $this->percentComplete($level, $maxLevel);

        if ($level === $maxLevel) {
            $barLabel = 'MAX';
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
        return ($level / $max) * 100;
    }

    /**
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
                break;
            case $percentComplete >= 26 && $percentComplete <= 50:
                return 'medium';
                break;
            case $percentComplete >= 51 && $percentComplete <= 75:
                return 'high';
                break;
            case $percentComplete >= 76 && $percentComplete <= 99:
                return 'vhigh';
                break;
            case 100:
                return 'max';
                break;
        }
    }
}
