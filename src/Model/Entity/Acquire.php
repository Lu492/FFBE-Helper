<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Acquire Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $unit_id
 * @property int $level
 * @property \App\Model\Entity\Rarity $rarity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Unit $unit
 * @property int $rarity_id
 * @property float $trust
 */
class Acquire extends Entity
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
