<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Practise Entity
 *
 * @property int $id
 * @property int $unit_id
 * @property int $specialisation_id
 *
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Specialisation $specialisation
 */
class Practise extends Entity
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
