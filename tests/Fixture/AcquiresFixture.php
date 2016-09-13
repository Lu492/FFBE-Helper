<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AcquiresFixture
 *
 */
class AcquiresFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'unit_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'level' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rarity_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_acquired_units_idx' => ['type' => 'index', 'columns' => ['unit_id'], 'length' => []],
            'fk_acquired_users' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_acquired_units' => ['type' => 'foreign', 'columns' => ['unit_id'], 'references' => ['units', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_acquired_users' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'user_id' => 1,
            'unit_id' => 1,
            'level' => 66,
            'rarity_id' => 5,
            'created' => '2016-09-02 09:57:35',
            'modified' => '2016-09-06 08:44:25'
        ],
        [
            'id' => 3,
            'user_id' => 1,
            'unit_id' => 2,
            'level' => 25,
            'rarity_id' => 5,
            'created' => '2016-09-02 13:22:16',
            'modified' => '2016-09-06 08:51:44'
        ],
        [
            'id' => 4,
            'user_id' => 1,
            'unit_id' => 76,
            'level' => 70,
            'rarity_id' => 5,
            'created' => '2016-09-02 13:23:24',
            'modified' => '2016-09-13 17:49:28'
        ],
        [
            'id' => 5,
            'user_id' => 1,
            'unit_id' => 3,
            'level' => 57,
            'rarity_id' => 5,
            'created' => '2016-09-02 13:23:45',
            'modified' => '2016-09-13 17:48:51'
        ],
        [
            'id' => 6,
            'user_id' => 1,
            'unit_id' => 28,
            'level' => 36,
            'rarity_id' => 4,
            'created' => '2016-09-02 13:24:00',
            'modified' => '2016-09-06 08:54:33'
        ],
        [
            'id' => 7,
            'user_id' => 1,
            'unit_id' => 52,
            'level' => 45,
            'rarity_id' => 5,
            'created' => '2016-09-02 13:24:14',
            'modified' => '2016-09-13 17:49:07'
        ],
        [
            'id' => 8,
            'user_id' => 1,
            'unit_id' => 60,
            'level' => 55,
            'rarity_id' => 4,
            'created' => '2016-09-02 13:27:51',
            'modified' => '2016-09-09 11:36:35'
        ],
        [
            'id' => 9,
            'user_id' => 1,
            'unit_id' => 23,
            'level' => 25,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:28:03',
            'modified' => '2016-09-13 18:05:26'
        ],
        [
            'id' => 10,
            'user_id' => 1,
            'unit_id' => 31,
            'level' => 23,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:28:15',
            'modified' => '2016-09-06 08:52:01'
        ],
        [
            'id' => 11,
            'user_id' => 1,
            'unit_id' => 7,
            'level' => 30,
            'rarity_id' => 2,
            'created' => '2016-09-02 13:28:24',
            'modified' => '2016-09-06 08:57:59'
        ],
        [
            'id' => 12,
            'user_id' => 1,
            'unit_id' => 8,
            'level' => 30,
            'rarity_id' => 2,
            'created' => '2016-09-02 13:28:36',
            'modified' => '2016-09-06 08:58:13'
        ],
        [
            'id' => 13,
            'user_id' => 1,
            'unit_id' => 16,
            'level' => 23,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:28:47',
            'modified' => '2016-09-09 12:00:22'
        ],
        [
            'id' => 14,
            'user_id' => 1,
            'unit_id' => 56,
            'level' => 6,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:28:57',
            'modified' => '2016-09-09 11:33:49'
        ],
        [
            'id' => 15,
            'user_id' => 1,
            'unit_id' => 57,
            'level' => 1,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:29:06',
            'modified' => '2016-09-06 09:02:19'
        ],
        [
            'id' => 16,
            'user_id' => 1,
            'unit_id' => 27,
            'level' => 10,
            'rarity_id' => 4,
            'created' => '2016-09-02 13:29:17',
            'modified' => '2016-09-02 13:29:17'
        ],
        [
            'id' => 17,
            'user_id' => 1,
            'unit_id' => 33,
            'level' => 60,
            'rarity_id' => 4,
            'created' => '2016-09-02 13:29:27',
            'modified' => '2016-09-02 13:29:27'
        ],
        [
            'id' => 18,
            'user_id' => 1,
            'unit_id' => 35,
            'level' => 60,
            'rarity_id' => 4,
            'created' => '2016-09-02 13:29:40',
            'modified' => '2016-09-02 13:29:40'
        ],
        [
            'id' => 19,
            'user_id' => 1,
            'unit_id' => 37,
            'level' => 8,
            'rarity_id' => 4,
            'created' => '2016-09-02 13:29:52',
            'modified' => '2016-09-02 13:29:52'
        ],
        [
            'id' => 20,
            'user_id' => 1,
            'unit_id' => 66,
            'level' => 3,
            'rarity_id' => 5,
            'created' => '2016-09-02 13:30:02',
            'modified' => '2016-09-06 08:53:37'
        ],
        [
            'id' => 21,
            'user_id' => 1,
            'unit_id' => 78,
            'level' => 1,
            'rarity_id' => 4,
            'created' => '2016-09-02 13:30:16',
            'modified' => '2016-09-02 13:30:16'
        ],
        [
            'id' => 22,
            'user_id' => 1,
            'unit_id' => 13,
            'level' => 1,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:30:26',
            'modified' => '2016-09-02 13:30:26'
        ],
        [
            'id' => 23,
            'user_id' => 1,
            'unit_id' => 15,
            'level' => 40,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:30:35',
            'modified' => '2016-09-02 13:30:35'
        ],
        [
            'id' => 24,
            'user_id' => 1,
            'unit_id' => 18,
            'level' => 1,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:30:47',
            'modified' => '2016-09-02 13:30:47'
        ],
        [
            'id' => 25,
            'user_id' => 1,
            'unit_id' => 19,
            'level' => 16,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:30:58',
            'modified' => '2016-09-13 18:30:54'
        ],
        [
            'id' => 26,
            'user_id' => 1,
            'unit_id' => 20,
            'level' => 13,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:31:09',
            'modified' => '2016-09-02 13:31:09'
        ],
        [
            'id' => 27,
            'user_id' => 1,
            'unit_id' => 26,
            'level' => 1,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:31:20',
            'modified' => '2016-09-02 13:31:20'
        ],
        [
            'id' => 28,
            'user_id' => 1,
            'unit_id' => 29,
            'level' => 1,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:31:30',
            'modified' => '2016-09-02 13:31:30'
        ],
        [
            'id' => 29,
            'user_id' => 1,
            'unit_id' => 30,
            'level' => 21,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:31:41',
            'modified' => '2016-09-13 18:05:39'
        ],
        [
            'id' => 30,
            'user_id' => 1,
            'unit_id' => 32,
            'level' => 18,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:31:50',
            'modified' => '2016-09-09 12:02:24'
        ],
        [
            'id' => 31,
            'user_id' => 1,
            'unit_id' => 36,
            'level' => 1,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:32:00',
            'modified' => '2016-09-02 13:32:00'
        ],
        [
            'id' => 32,
            'user_id' => 1,
            'unit_id' => 55,
            'level' => 12,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:32:09',
            'modified' => '2016-09-09 11:38:29'
        ],
        [
            'id' => 33,
            'user_id' => 1,
            'unit_id' => 58,
            'level' => 18,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:32:29',
            'modified' => '2016-09-13 18:13:55'
        ],
        [
            'id' => 34,
            'user_id' => 1,
            'unit_id' => 4,
            'level' => 30,
            'rarity_id' => 2,
            'created' => '2016-09-02 13:37:15',
            'modified' => '2016-09-02 13:37:15'
        ],
        [
            'id' => 35,
            'user_id' => 1,
            'unit_id' => 5,
            'level' => 30,
            'rarity_id' => 2,
            'created' => '2016-09-02 13:37:51',
            'modified' => '2016-09-02 13:37:51'
        ],
        [
            'id' => 36,
            'user_id' => 1,
            'unit_id' => 6,
            'level' => 30,
            'rarity_id' => 2,
            'created' => '2016-09-02 13:38:00',
            'modified' => '2016-09-02 13:38:00'
        ],
        [
            'id' => 37,
            'user_id' => 1,
            'unit_id' => 9,
            'level' => 30,
            'rarity_id' => 2,
            'created' => '2016-09-02 13:38:11',
            'modified' => '2016-09-02 13:38:11'
        ],
        [
            'id' => 38,
            'user_id' => 1,
            'unit_id' => 10,
            'level' => 30,
            'rarity_id' => 2,
            'created' => '2016-09-02 13:38:20',
            'modified' => '2016-09-02 13:38:20'
        ],
        [
            'id' => 39,
            'user_id' => 1,
            'unit_id' => 11,
            'level' => 30,
            'rarity_id' => 2,
            'created' => '2016-09-02 13:38:29',
            'modified' => '2016-09-02 13:38:29'
        ],
        [
            'id' => 40,
            'user_id' => 1,
            'unit_id' => 12,
            'level' => 1,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:38:37',
            'modified' => '2016-09-09 11:59:30'
        ],
        [
            'id' => 41,
            'user_id' => 1,
            'unit_id' => 14,
            'level' => 1,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:38:45',
            'modified' => '2016-09-09 11:59:46'
        ],
        [
            'id' => 42,
            'user_id' => 1,
            'unit_id' => 17,
            'level' => 19,
            'rarity_id' => 3,
            'created' => '2016-09-02 13:38:53',
            'modified' => '2016-09-13 18:01:05'
        ],
        [
            'id' => 43,
            'user_id' => 1,
            'unit_id' => 53,
            'level' => 30,
            'rarity_id' => 2,
            'created' => '2016-09-02 13:39:01',
            'modified' => '2016-09-06 08:58:50'
        ],
        [
            'id' => 44,
            'user_id' => 1,
            'unit_id' => 69,
            'level' => 44,
            'rarity_id' => 4,
            'created' => '2016-09-05 14:20:38',
            'modified' => '2016-09-13 18:00:49'
        ],
        [
            'id' => 45,
            'user_id' => 1,
            'unit_id' => 67,
            'level' => 40,
            'rarity_id' => 3,
            'created' => '2016-09-06 08:40:40',
            'modified' => '2016-09-13 18:14:17'
        ],
        [
            'id' => 46,
            'user_id' => 1,
            'unit_id' => 80,
            'level' => 18,
            'rarity_id' => 3,
            'created' => '2016-09-06 09:02:57',
            'modified' => '2016-09-13 18:14:34'
        ],
        [
            'id' => 49,
            'user_id' => 1,
            'unit_id' => 59,
            'level' => 18,
            'rarity_id' => 2,
            'created' => '2016-09-09 11:59:09',
            'modified' => '2016-09-13 18:15:58'
        ],
        [
            'id' => 50,
            'user_id' => 1,
            'unit_id' => 21,
            'level' => 18,
            'rarity_id' => 2,
            'created' => '2016-09-13 18:15:19',
            'modified' => '2016-09-13 18:15:19'
        ],
        [
            'id' => 51,
            'user_id' => 1,
            'unit_id' => 54,
            'level' => 18,
            'rarity_id' => 2,
            'created' => '2016-09-13 18:15:42',
            'modified' => '2016-09-13 18:15:42'
        ],
        [
            'id' => 52,
            'user_id' => 1,
            'unit_id' => 81,
            'level' => 1,
            'rarity_id' => 5,
            'created' => '2016-09-13 18:29:47',
            'modified' => '2016-09-13 18:29:47'
        ],
    ];
}
