<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SpecialisationsFixture
 *
 */
class SpecialisationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'stats' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'team_pick_order' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'name' => 'Healing',
            'stats' => 'spr,mag,hp',
            'team_pick_order' => 4,
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 2,
            'name' => 'Support',
            'stats' => 'mag,def,mp',
            'team_pick_order' => 5,
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 3,
            'name' => 'Hybrid damage',
            'stats' => 'atk,mag,mp',
            'team_pick_order' => 6,
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 4,
            'name' => 'Magic damage',
            'stats' => 'mag,spr,mp',
            'team_pick_order' => 3,
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 5,
            'name' => 'Physical damage',
            'stats' => 'atk,def,hp',
            'team_pick_order' => 2,
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 7,
            'name' => 'Tank',
            'stats' => 'def,spr,hp',
            'team_pick_order' => 1,
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
    ];
}
