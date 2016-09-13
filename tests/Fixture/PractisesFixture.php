<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PractisesFixture
 *
 */
class PractisesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'unit_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'specialisation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'index2' => ['type' => 'index', 'columns' => ['unit_id', 'specialisation_id'], 'length' => []],
            'fk_units_specialisations_idx' => ['type' => 'index', 'columns' => ['specialisation_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_units_practises' => ['type' => 'foreign', 'columns' => ['unit_id'], 'references' => ['units', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_units_specialisations' => ['type' => 'foreign', 'columns' => ['specialisation_id'], 'references' => ['specialisations', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'unit_id' => 1,
            'specialisation_id' => 2
        ],
        [
            'id' => 2,
            'unit_id' => 1,
            'specialisation_id' => 5
        ],
        [
            'id' => 3,
            'unit_id' => 2,
            'specialisation_id' => 5
        ],
        [
            'id' => 4,
            'unit_id' => 3,
            'specialisation_id' => 1
        ],
        [
            'id' => 5,
            'unit_id' => 3,
            'specialisation_id' => 2
        ],
        [
            'id' => 6,
            'unit_id' => 4,
            'specialisation_id' => 5
        ],
        [
            'id' => 7,
            'unit_id' => 5,
            'specialisation_id' => 1
        ],
        [
            'id' => 8,
            'unit_id' => 6,
            'specialisation_id' => 4
        ],
        [
            'id' => 9,
            'unit_id' => 7,
            'specialisation_id' => 2
        ],
        [
            'id' => 10,
            'unit_id' => 8,
            'specialisation_id' => 5
        ],
        [
            'id' => 11,
            'unit_id' => 9,
            'specialisation_id' => 1
        ],
        [
            'id' => 12,
            'unit_id' => 10,
            'specialisation_id' => 5
        ],
        [
            'id' => 13,
            'unit_id' => 11,
            'specialisation_id' => 2
        ],
        [
            'id' => 14,
            'unit_id' => 12,
            'specialisation_id' => 4
        ],
        [
            'id' => 15,
            'unit_id' => 13,
            'specialisation_id' => 4
        ],
        [
            'id' => 16,
            'unit_id' => 14,
            'specialisation_id' => 2
        ],
        [
            'id' => 17,
            'unit_id' => 15,
            'specialisation_id' => 1
        ],
        [
            'id' => 18,
            'unit_id' => 16,
            'specialisation_id' => 2
        ],
        [
            'id' => 19,
            'unit_id' => 17,
            'specialisation_id' => 5
        ],
        [
            'id' => 20,
            'unit_id' => 18,
            'specialisation_id' => 5
        ],
        [
            'id' => 21,
            'unit_id' => 19,
            'specialisation_id' => 2
        ],
        [
            'id' => 22,
            'unit_id' => 20,
            'specialisation_id' => 3
        ],
        [
            'id' => 23,
            'unit_id' => 21,
            'specialisation_id' => 1
        ],
        [
            'id' => 24,
            'unit_id' => 21,
            'specialisation_id' => 2
        ],
        [
            'id' => 25,
            'unit_id' => 22,
            'specialisation_id' => 4
        ],
        [
            'id' => 26,
            'unit_id' => 23,
            'specialisation_id' => 2
        ],
        [
            'id' => 27,
            'unit_id' => 24,
            'specialisation_id' => 1
        ],
        [
            'id' => 28,
            'unit_id' => 25,
            'specialisation_id' => 5
        ],
        [
            'id' => 29,
            'unit_id' => 26,
            'specialisation_id' => 2
        ],
        [
            'id' => 30,
            'unit_id' => 27,
            'specialisation_id' => 1
        ],
        [
            'id' => 31,
            'unit_id' => 27,
            'specialisation_id' => 4
        ],
        [
            'id' => 32,
            'unit_id' => 28,
            'specialisation_id' => 5
        ],
        [
            'id' => 33,
            'unit_id' => 29,
            'specialisation_id' => 2
        ],
        [
            'id' => 34,
            'unit_id' => 29,
            'specialisation_id' => 5
        ],
        [
            'id' => 35,
            'unit_id' => 30,
            'specialisation_id' => 1
        ],
        [
            'id' => 36,
            'unit_id' => 30,
            'specialisation_id' => 2
        ],
        [
            'id' => 37,
            'unit_id' => 31,
            'specialisation_id' => 4
        ],
        [
            'id' => 38,
            'unit_id' => 32,
            'specialisation_id' => 4
        ],
        [
            'id' => 39,
            'unit_id' => 33,
            'specialisation_id' => 5
        ],
        [
            'id' => 40,
            'unit_id' => 34,
            'specialisation_id' => 1
        ],
        [
            'id' => 41,
            'unit_id' => 35,
            'specialisation_id' => 1
        ],
        [
            'id' => 42,
            'unit_id' => 35,
            'specialisation_id' => 4
        ],
        [
            'id' => 43,
            'unit_id' => 36,
            'specialisation_id' => 5
        ],
        [
            'id' => 44,
            'unit_id' => 37,
            'specialisation_id' => 2
        ],
        [
            'id' => 45,
            'unit_id' => 37,
            'specialisation_id' => 3
        ],
        [
            'id' => 46,
            'unit_id' => 38,
            'specialisation_id' => 5
        ],
        [
            'id' => 47,
            'unit_id' => 39,
            'specialisation_id' => 4
        ],
        [
            'id' => 48,
            'unit_id' => 40,
            'specialisation_id' => 4
        ],
        [
            'id' => 49,
            'unit_id' => 41,
            'specialisation_id' => 2
        ],
        [
            'id' => 50,
            'unit_id' => 41,
            'specialisation_id' => 5
        ],
        [
            'id' => 51,
            'unit_id' => 42,
            'specialisation_id' => 1
        ],
        [
            'id' => 52,
            'unit_id' => 42,
            'specialisation_id' => 7
        ],
        [
            'id' => 53,
            'unit_id' => 43,
            'specialisation_id' => 1
        ],
        [
            'id' => 54,
            'unit_id' => 43,
            'specialisation_id' => 4
        ],
        [
            'id' => 55,
            'unit_id' => 44,
            'specialisation_id' => 4
        ],
        [
            'id' => 56,
            'unit_id' => 45,
            'specialisation_id' => 5
        ],
        [
            'id' => 57,
            'unit_id' => 46,
            'specialisation_id' => 5
        ],
        [
            'id' => 58,
            'unit_id' => 47,
            'specialisation_id' => 2
        ],
        [
            'id' => 59,
            'unit_id' => 48,
            'specialisation_id' => 2
        ],
        [
            'id' => 60,
            'unit_id' => 49,
            'specialisation_id' => 2
        ],
        [
            'id' => 61,
            'unit_id' => 49,
            'specialisation_id' => 5
        ],
        [
            'id' => 62,
            'unit_id' => 50,
            'specialisation_id' => 2
        ],
        [
            'id' => 63,
            'unit_id' => 51,
            'specialisation_id' => 1
        ],
        [
            'id' => 64,
            'unit_id' => 52,
            'specialisation_id' => 5
        ],
        [
            'id' => 65,
            'unit_id' => 53,
            'specialisation_id' => 2
        ],
        [
            'id' => 66,
            'unit_id' => 54,
            'specialisation_id' => 4
        ],
        [
            'id' => 67,
            'unit_id' => 55,
            'specialisation_id' => 5
        ],
        [
            'id' => 68,
            'unit_id' => 56,
            'specialisation_id' => 7
        ],
        [
            'id' => 69,
            'unit_id' => 57,
            'specialisation_id' => 1
        ],
        [
            'id' => 70,
            'unit_id' => 57,
            'specialisation_id' => 5
        ],
        [
            'id' => 71,
            'unit_id' => 58,
            'specialisation_id' => 5
        ],
        [
            'id' => 72,
            'unit_id' => 59,
            'specialisation_id' => 2
        ],
        [
            'id' => 73,
            'unit_id' => 60,
            'specialisation_id' => 2
        ],
        [
            'id' => 74,
            'unit_id' => 60,
            'specialisation_id' => 7
        ],
        [
            'id' => 75,
            'unit_id' => 61,
            'specialisation_id' => 2
        ],
        [
            'id' => 76,
            'unit_id' => 62,
            'specialisation_id' => 4
        ],
        [
            'id' => 77,
            'unit_id' => 63,
            'specialisation_id' => 4
        ],
        [
            'id' => 78,
            'unit_id' => 64,
            'specialisation_id' => 2
        ],
        [
            'id' => 79,
            'unit_id' => 64,
            'specialisation_id' => 5
        ],
        [
            'id' => 80,
            'unit_id' => 65,
            'specialisation_id' => 5
        ],
        [
            'id' => 81,
            'unit_id' => 66,
            'specialisation_id' => 2
        ],
        [
            'id' => 82,
            'unit_id' => 66,
            'specialisation_id' => 5
        ],
        [
            'id' => 83,
            'unit_id' => 67,
            'specialisation_id' => 5
        ],
        [
            'id' => 84,
            'unit_id' => 67,
            'specialisation_id' => 7
        ],
        [
            'id' => 85,
            'unit_id' => 68,
            'specialisation_id' => 2
        ],
        [
            'id' => 86,
            'unit_id' => 69,
            'specialisation_id' => 2
        ],
        [
            'id' => 87,
            'unit_id' => 69,
            'specialisation_id' => 4
        ],
        [
            'id' => 88,
            'unit_id' => 70,
            'specialisation_id' => 4
        ],
        [
            'id' => 89,
            'unit_id' => 71,
            'specialisation_id' => 2
        ],
        [
            'id' => 90,
            'unit_id' => 71,
            'specialisation_id' => 3
        ],
        [
            'id' => 91,
            'unit_id' => 72,
            'specialisation_id' => 5
        ],
        [
            'id' => 92,
            'unit_id' => 73,
            'specialisation_id' => 2
        ],
        [
            'id' => 93,
            'unit_id' => 74,
            'specialisation_id' => 2
        ],
        [
            'id' => 94,
            'unit_id' => 74,
            'specialisation_id' => 7
        ],
        [
            'id' => 95,
            'unit_id' => 75,
            'specialisation_id' => 1
        ],
        [
            'id' => 96,
            'unit_id' => 75,
            'specialisation_id' => 4
        ],
        [
            'id' => 97,
            'unit_id' => 76,
            'specialisation_id' => 1
        ],
        [
            'id' => 98,
            'unit_id' => 76,
            'specialisation_id' => 2
        ],
        [
            'id' => 99,
            'unit_id' => 77,
            'specialisation_id' => 7
        ],
        [
            'id' => 100,
            'unit_id' => 78,
            'specialisation_id' => 4
        ],
        [
            'id' => 101,
            'unit_id' => 79,
            'specialisation_id' => 1
        ],
        [
            'id' => 102,
            'unit_id' => 80,
            'specialisation_id' => 5
        ],
        [
            'id' => 103,
            'unit_id' => 81,
            'specialisation_id' => 5
        ],
        [
            'id' => 104,
            'unit_id' => 82,
            'specialisation_id' => 5
        ],
        [
            'id' => 105,
            'unit_id' => 83,
            'specialisation_id' => 5
        ],
    ];
}
