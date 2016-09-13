<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JobsFixture
 *
 */
class JobsFixture extends TestFixture
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
            'id' => 2,
            'name' => 'Black Mage',
            'created' => '2016-08-31 15:57:03',
            'modified' => '2016-08-31 15:57:03'
        ],
        [
            'id' => 3,
            'name' => 'Knight',
            'created' => '2016-08-31 17:01:11',
            'modified' => '2016-08-31 17:01:11'
        ],
        [
            'id' => 4,
            'name' => 'White Magus',
            'created' => '2016-08-31 17:01:59',
            'modified' => '2016-08-31 17:01:59'
        ],
        [
            'id' => 5,
            'name' => 'Warrior',
            'created' => '2016-08-31 17:04:23',
            'modified' => '2016-08-31 17:04:23'
        ],
        [
            'id' => 6,
            'name' => 'White Mage',
            'created' => '2016-08-31 17:05:16',
            'modified' => '2016-08-31 17:05:16'
        ],
        [
            'id' => 7,
            'name' => 'Thief',
            'created' => '2016-08-31 16:14:15',
            'modified' => '2016-08-31 16:14:15'
        ],
        [
            'id' => 8,
            'name' => 'Monk',
            'created' => '2016-08-31 16:16:53',
            'modified' => '2016-08-31 16:16:53'
        ],
        [
            'id' => 9,
            'name' => 'Ranger',
            'created' => '2016-08-31 16:18:04',
            'modified' => '2016-08-31 16:18:04'
        ],
        [
            'id' => 10,
            'name' => 'Gunner',
            'created' => '2016-08-31 16:19:02',
            'modified' => '2016-08-31 16:19:02'
        ],
        [
            'id' => 11,
            'name' => 'Bard',
            'created' => '2016-08-31 16:21:15',
            'modified' => '2016-08-31 16:21:15'
        ],
        [
            'id' => 12,
            'name' => 'Imperial',
            'created' => '2016-08-31 16:22:35',
            'modified' => '2016-08-31 16:22:35'
        ],
        [
            'id' => 13,
            'name' => 'Bandit',
            'created' => '2016-08-31 16:39:54',
            'modified' => '2016-08-31 16:39:54'
        ],
        [
            'id' => 14,
            'name' => 'High Priest',
            'created' => '2016-08-31 16:41:53',
            'modified' => '2016-08-31 16:41:53'
        ],
        [
            'id' => 15,
            'name' => 'Songstress',
            'created' => '2016-08-31 16:44:30',
            'modified' => '2016-08-31 16:44:30'
        ],
        [
            'id' => 16,
            'name' => 'Samurai',
            'created' => '2016-08-31 16:47:13',
            'modified' => '2016-08-31 16:47:13'
        ],
        [
            'id' => 17,
            'name' => 'Green Mage',
            'created' => '2016-08-31 16:48:32',
            'modified' => '2016-08-31 16:48:32'
        ],
        [
            'id' => 18,
            'name' => 'Spellblade',
            'created' => '2016-08-31 16:49:43',
            'modified' => '2016-08-31 16:49:43'
        ],
        [
            'id' => 19,
            'name' => 'Salve-maker',
            'created' => '2016-08-31 16:51:48',
            'modified' => '2016-08-31 16:51:48'
        ],
        [
            'id' => 20,
            'name' => 'Dancer',
            'created' => '2016-08-31 16:55:33',
            'modified' => '2016-08-31 16:55:33'
        ],
        [
            'id' => 21,
            'name' => 'Assassin',
            'created' => '2016-08-31 16:59:36',
            'modified' => '2016-08-31 16:59:36'
        ],
        [
            'id' => 22,
            'name' => 'Red Mage',
            'created' => '2016-08-31 17:00:54',
            'modified' => '2016-08-31 17:00:54'
        ],
        [
            'id' => 23,
            'name' => 'Dragoon',
            'created' => '2016-08-31 17:02:29',
            'modified' => '2016-08-31 17:02:29'
        ],
        [
            'id' => 24,
            'name' => 'Machinist',
            'created' => '2016-08-31 17:04:12',
            'modified' => '2016-08-31 17:04:12'
        ],
        [
            'id' => 25,
            'name' => 'Sky Pirate',
            'created' => '2016-08-31 17:05:44',
            'modified' => '2016-08-31 17:05:44'
        ],
        [
            'id' => 26,
            'name' => 'Professor',
            'created' => '2016-08-31 17:07:38',
            'modified' => '2016-08-31 17:07:38'
        ],
        [
            'id' => 27,
            'name' => 'Summoner',
            'created' => '2016-08-31 17:12:27',
            'modified' => '2016-08-31 17:12:27'
        ],
        [
            'id' => 28,
            'name' => 'Chaos Knight',
            'created' => '2016-09-01 08:43:20',
            'modified' => '2016-09-01 08:43:20'
        ],
        [
            'id' => 29,
            'name' => 'Dark Mage',
            'created' => '2016-09-01 08:45:56',
            'modified' => '2016-09-01 08:45:56'
        ],
        [
            'id' => 30,
            'name' => 'Reaper',
            'created' => '2016-09-01 08:48:06',
            'modified' => '2016-09-01 08:48:06'
        ],
        [
            'id' => 31,
            'name' => 'Ravager',
            'created' => '2016-09-01 08:50:54',
            'modified' => '2016-09-01 08:50:54'
        ],
        [
            'id' => 32,
            'name' => 'Paladin',
            'created' => '2016-09-01 08:52:48',
            'modified' => '2016-09-01 08:52:48'
        ],
        [
            'id' => 33,
            'name' => 'Magic Warrior',
            'created' => '2016-09-01 08:54:11',
            'modified' => '2016-09-01 08:54:11'
        ],
        [
            'id' => 34,
            'name' => 'Adventurer',
            'created' => '2016-09-01 08:59:49',
            'modified' => '2016-09-01 08:59:49'
        ],
        [
            'id' => 35,
            'name' => 'Warmage',
            'created' => '2016-09-01 09:09:17',
            'modified' => '2016-09-01 09:09:17'
        ],
        [
            'id' => 36,
            'name' => 'Black Belt',
            'created' => '2016-09-01 09:15:08',
            'modified' => '2016-09-01 09:15:08'
        ],
        [
            'id' => 37,
            'name' => 'Viking',
            'created' => '2016-09-01 09:16:15',
            'modified' => '2016-09-01 09:16:15'
        ],
        [
            'id' => 38,
            'name' => 'Gladiator',
            'created' => '2016-09-01 09:19:58',
            'modified' => '2016-09-01 09:19:58'
        ],
        [
            'id' => 39,
            'name' => 'Ninja',
            'created' => '2016-09-01 09:20:53',
            'modified' => '2016-09-01 09:20:53'
        ],
        [
            'id' => 40,
            'name' => 'Mage',
            'created' => '2016-09-01 09:22:55',
            'modified' => '2016-09-01 09:22:55'
        ],
        [
            'id' => 41,
            'name' => 'General',
            'created' => '2016-09-01 09:29:37',
            'modified' => '2016-09-01 09:29:37'
        ],
        [
            'id' => 42,
            'name' => 'Rune Knight',
            'created' => '2016-09-01 09:31:49',
            'modified' => '2016-09-01 09:31:49'
        ],
        [
            'id' => 43,
            'name' => 'Archmage',
            'created' => '2016-09-01 09:33:07',
            'modified' => '2016-09-01 09:33:07'
        ],
        [
            'id' => 44,
            'name' => 'Warrior of Light',
            'created' => '2016-09-01 09:36:59',
            'modified' => '2016-09-01 09:36:59'
        ],
        [
            'id' => 45,
            'name' => 'Sage',
            'created' => '2016-09-01 09:38:36',
            'modified' => '2016-09-01 09:38:36'
        ],
        [
            'id' => 46,
            'name' => 'Princess',
            'created' => '2016-09-01 09:39:48',
            'modified' => '2016-09-01 09:39:48'
        ],
        [
            'id' => 47,
            'name' => 'Juggler',
            'created' => '2016-09-13 17:44:43',
            'modified' => '2016-09-13 17:44:43'
        ],
        [
            'id' => 48,
            'name' => 'Fencer',
            'created' => '2016-09-13 17:46:46',
            'modified' => '2016-09-13 17:46:46'
        ],
    ];
}
