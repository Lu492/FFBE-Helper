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
 * @property int $rarity
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Unit $unit
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
