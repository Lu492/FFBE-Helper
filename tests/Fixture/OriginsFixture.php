<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OriginsFixture
 *
 */
class OriginsFixture extends TestFixture
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
        'shortname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
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
            'name' => 'Final Fantasy I',
            'shortname' => 'FF 1',
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 2,
            'name' => 'Final Fantasy II',
            'shortname' => 'FF 2',
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 3,
            'name' => 'Final Fantasy III',
            'shortname' => 'FF 3',
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 4,
            'name' => 'Final Fantasy IV',
            'shortname' => 'FF 4',
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 5,
            'name' => 'Final Fantasy V',
            'shortname' => 'FF 5',
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 6,
            'name' => 'Final Fantasy VI',
            'shortname' => 'FF 6',
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 7,
            'name' => 'Final Fantasy IX',
            'shortname' => 'FF 9',
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 8,
            'name' => 'Final Fantasy XI',
            'shortname' => 'FF 11',
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 9,
            'name' => 'Final Fantasy XII',
            'shortname' => 'FF 12',
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 10,
            'name' => 'Final Fantasy Brave Exvius',
            'shortname' => 'FF BE',
            'created' => '2016-08-31 16:00:00',
            'modified' => '2016-08-31 16:00:00'
        ],
        [
            'id' => 11,
            'name' => 'Final Fantasy Crystal Defenders',
            'shortname' => 'FF CD',
            'created' => '2016-09-13 18:40:16',
            'modified' => '2016-09-13 18:40:16'
        ],
    ];
}
