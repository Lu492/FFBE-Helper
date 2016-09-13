<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RaritiesFixture
 *
 */
class RaritiesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'stars' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'max_level' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '10', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'level' => ['type' => 'index', 'columns' => ['max_level'], 'length' => []],
        ],
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
            'stars' => 1,
            'max_level' => 15,
            'created' => '2016-09-02 12:08:11',
            'modified' => '2016-09-02 12:08:11'
        ],
        [
            'id' => 2,
            'stars' => 2,
            'max_level' => 30,
            'created' => '2016-09-02 12:08:16',
            'modified' => '2016-09-02 12:08:16'
        ],
        [
            'id' => 3,
            'stars' => 3,
            'max_level' => 40,
            'created' => '2016-09-02 12:08:24',
            'modified' => '2016-09-02 12:08:24'
        ],
        [
            'id' => 4,
            'stars' => 4,
            'max_level' => 60,
            'created' => '2016-09-02 12:08:30',
            'modified' => '2016-09-02 12:08:30'
        ],
        [
            'id' => 5,
            'stars' => 5,
            'max_level' => 80,
            'created' => '2016-09-02 12:08:36',
            'modified' => '2016-09-02 12:08:36'
        ],
    ];
}
