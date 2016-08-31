<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Unit Entity
 *
 * @property int $id
 * @property string $name
 * @property int $origin_id
 * @property int $race_id
 * @property int $job_id
 * @property int $gender_id
 * @property int $base_rarity
 * @property int $max_rarity
 * @property string $trust_master_reward
 * @property int $hp
 * @property int $mp
 * @property int $atk
 * @property int $def
 * @property int $mag
 * @property int $spr
 * @property int $hits
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Origin $origin
 * @property \App\Model\Entity\Specialisation[] $specialisations
 */
class Unit extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
