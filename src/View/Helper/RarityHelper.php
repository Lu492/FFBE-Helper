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
    protected $_defaultConfig = [];

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
            $out .= $level . ' of ' . $max . '&nbsp;' . $this->Html->image('Rarity-' . $max . '.png');
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
     *  - `allowed` array : Array of allowed rarity objects
     *  - `reset` bool : Generate a reset link?
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
            'allowed' => collection($this->config('rarities'))->indexBy('id'),
            'reset' => true
        ];
        $options = array_merge($defaultOptions, $options);

        $out = '<div class="form-group radio">';

        if ($options['displayLabel']) {
            $out .= "<p><b>" . $options['label'] . "</b></p>";
        }

        foreach ($options['allowed'] as $rarity) {
            $out .= "<label for='$field-{$rarity->stars}'>";

            $checked = '';
            if ((!empty($entity) && !empty($entity->get($field)) && $entity->get($field) === $rarity->stars)
                || (!empty($this->request->data[$field]) && $this->request->data[$field] == $rarity->stars)
                || (!empty($this->request->query[$field]) && $this->request->query[$field] == $rarity->stars)
            ) {
                $checked = 'checked="checked"';
            }

            $requiredField = '';
            if ($options['required']) {
                $requiredField = "required='required'";
            }

            $out .= "<input type='radio' name='$field' value='$rarity->stars' id='$field-{$rarity->stars}' $checked $requiredField>";

            if ($options['type'] === 'numbers') {
                $out .= $rarity->stars;
            } elseif ($options['type'] === 'combo') {
                $out .= $rarity->stars . '&nbsp;' . $this->Html->image('Rarity-' . $rarity->stars . '.png');
            } else {
                for ($i = 0; $i < $rarity->stars; $i++) {
                    $out .= $this->Html->image('Rarity-' . $rarity->stars . '.png');
                }
            }

            $out .= "</label>";
        }

        if ($options['reset']) {
            $out .= "<a href='#' onclick='$(this).parents(\"div.form-group.radio\").find(\"input[type=radio]\").prop(\"checked\", false);'>Any</a>";
        }

        $out .= "</div>";

        return $out;
    }
}
