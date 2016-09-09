<?php
namespace App\View\Helper;

use Cake\Datasource\EntityInterface;
use Cake\Utility\Inflector;
use Cake\Utility\Text;
use Cake\View\Helper;

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
        // TODO: Replace with database data, just like the level bar helper
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
     * @param string $type What type of form output, should be a string of 'numbers|stars|combo'
     *
     * @return string
     */
    public function display($level, $max, $type = 'numbers')
    {
        $out = '<span class="star-rarity">';
        if ($type === 'combo') {
            $out .= $level . ' of ' . $max . '&nbsp;' . $this->Html->image('star.png');
        } elseif ($type === 'stars') {
            for ($i = 0; $i < $level; $i++) {
                $out .= $this->Html->image('star.png');
            }
            for ($i = 0; $i < $max - $level; $i++) {
                $out .= $this->Html->image('empty_star.png');
            }
        } else {
            $out = $level . ' of ' . $max;
        }

        $out .= "</span>";
        return $out;
    }

    /**
     * Output a set of radio buttons for selecting rarity level
     *
     * @param string $field Name of the form field
     * @param \Cake\Datasource\EntityInterface|null $entity The form entity
     * @param array $options Array of options for the helper output
     *
     *  - `required` bool : Should the generated field be a required field
     *  - `type` string (numbers|stars|combo) : What type of form input should be generated
     *  - `displayLabel` bool : Should a label be output for the field
     *  - `label` string : The field label text
     *  - `allowed` array : Array of allowed rarities
     *
     * @return string;
     */
    public function form($field, EntityInterface $entity = null, array $options = [])
    {
        $defaultOptions = [
            'required' => false,
            'type' => 'stars',
            'displayLabel' => true,
            'label' => Inflector::humanize($field),
            'allowed' => $this->config('rarities')
        ];
        $options = array_merge($defaultOptions, $options);

        $out = '<div class="form-group radio">';

        if ($options['displayLabel']) {
            $out .= "<p><b>" . $options['label'] . "</b></p>";
        }

        foreach ($options['allowed'] as $rarity) {
            $out .= "<label for='$field-$rarity'>";

            $checked = '';
            if ((!empty($entity) && !empty($entity->get($field)) && $entity->get($field) === $rarity)
                || (!empty($this->request->data[$field]) && $this->request->data[$field] == $rarity)
                || (!empty($this->request->query[$field]) && $this->request->query[$field] == $rarity)
            ) {
                $checked = 'checked="checked"';
            }

            $requiredField = '';
            if ($options['required']) {
                $requiredField = "required='required'";
            }

            $out .= "<input type='radio' name='$field' value='$rarity' id='$field-$rarity' $checked $requiredField>";

            if ($options['type'] === 'numbers') {
                $out .= $rarity;
            } elseif ($options['type'] === 'combo') {
                $out .= $rarity . $this->Html->image('star.png');
            } else {
                for ($i = 0; $i < $rarity; $i++) {
                    $out .= $this->Html->image('star.png');
                }
            }

            $out .= "</label>";
        }
        $out .= "</div>";

        return $out;
    }
}
