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
 * @property \App\Model\Entity\Rarity $base_rarity
 * @property \App\Model\Entity\Rarity $max_rarity
 * @property string $trust_master_reward
 * @property int $hp
 * @property int $mp
 * @property int $atk
 * @property int $def
 * @property int $mag
 * @property int $spr
 * @property int $hits
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Origin $origin
 * @property \App\Model\Entity\Specialisation[] $specialisations
 * @property string $description
 * @property int $base_rarity_id
 * @property int $max_rarity_id
 * @property string $image_dir
 * @property \App\Model\Entity\Race $race
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\Gender $gender
 * @property \App\Model\Entity\Acquire[] $acquires
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
