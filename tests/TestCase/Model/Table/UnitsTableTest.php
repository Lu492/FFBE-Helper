<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnitsTable;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UnitsTable Test Case
 */
class UnitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UnitsTable
     */
    public $Units;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.units',
        'app.origins',
        'app.races',
        'app.jobs',
        'app.genders',
        'app.rarities',
        'app.acquires',
        'app.users',
        'app.rarities',
        'app.specialisations',
        'app.practises'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Units') ? [] : ['className' => 'App\Model\Table\UnitsTable'];
        $this->Units = TableRegistry::get('Units', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Units);
        TableRegistry::clear();

        parent::tearDown();
    }

    public function providerSelectUnit()
    {
        return [
            [
                [],
                'expected' => [
                    'unit' => '\App\Model\Entity\Unit',
                    'acquire' => '\App\Model\Entity\Acquire',
                    'name' => 'Rain',
                    'party' => [1]
                ]
            ],
            [
                [
                    'specialisationId' => 1, // Healer
                ],
                'expected' => [
                    'unit' => '\App\Model\Entity\Unit',
                    'acquire' => '\App\Model\Entity\Acquire',
                    'name' => 'Lenna',
                    'party' => [4]
                ]
            ],
            [
                [
                    'specialisationId' => 2, // Support,
                    'fallback' => false
                ],
                'expected' => [
                    'unit' => '\App\Model\Entity\Unit',
                    'acquire' => '\App\Model\Entity\Acquire',
                    'name' => 'Celes',
                    'party' => [44]
                ]
            ],
            [
                [
                    'stats' => ['hp' => 'desc', 'mag' => 'desc'],
                    'fallback' => false
                ],
                'expected' => [
                    'unit' => '\App\Model\Entity\Unit',
                    'acquire' => '\App\Model\Entity\Acquire',
                    'name' => 'Juggler',
                    'party' => [52]
                ]
            ],
            [
                [
                    'minRarity' => 4,
                    'fallback' => false
                ],
                'expected' => [
                    'unit' => '\App\Model\Entity\Unit',
                    'acquire' => '\App\Model\Entity\Acquire',
                    'name' => 'Juggler',
                    'party' => [52]
                ]
            ],
            [
                [
                    'minRarity' => 3,
                    'maxRarity' => 4,
                    'fallback' => false
                ],
                'expected' => [
                    'unit' => '\App\Model\Entity\Unit',
                    'acquire' => '\App\Model\Entity\Acquire',
                    'name' => 'Kain',
                    'party' => [6]
                ]
            ],
            [
                [
                    'rarity' => 4,
                    'fallback' => false
                ],
                'expected' => [
                    'unit' => '\App\Model\Entity\Unit',
                    'acquire' => '\App\Model\Entity\Acquire',
                    'name' => 'Kain',
                    'party' => [6]
                ]
            ],
            [
                [
                    'rarity' => 4,
                    'specialisationId' => 7 // Tank
                ],
                'expected' => [
                    'unit' => '\App\Model\Entity\Unit',
                    'acquire' => '\App\Model\Entity\Acquire',
                    'name' => 'Russell',
                    'party' => [8]
                ]
            ],
            [
                [
                    'unitId' => 19
                ],
                'expected' => [
                    'unit' => '\App\Model\Entity\Unit',
                    'acquire' => '\App\Model\Entity\Acquire',
                    'name' => 'Mizell',
                    'party' => [25] // Acquire id
                ]
            ],
        ];
    }

    /**
     * Test finding an acquired unit
     *
     * @dataProvider providerSelectUnit
     *
     * @param array $options Array of options for the method
     * @param array $expected Expected method returns
     */
    public function testSelectUnit($options, $expected)
    {
        $acquire = $this->Units->selectUnit(1, $options);

        $this->assertInstanceOf($expected['acquire'], $acquire);
        $this->assertInstanceOf($expected['unit'], $acquire->unit);
        $this->assertEquals($expected['name'], $acquire->unit->name);
        $this->assertEquals($expected['party'], $this->Units->party);
    }

    /**
     * Try and cause the method to not find a unit due to invalid rarity settings
     */
    public function testSelectUnitInvalidRarity()
    {
        $options = [
            'minRarity' => 2,
            'maxRarity' => 3,
            'rarity' => 4,
            'fallback' => false
        ];
        $acquire = $this->Units->selectUnit(1, $options);

        $this->assertEquals(null, $acquire);
    }

    /**
     * Build a party with the method to prevent selecting the same acquired unit twice
     */
    public function testSelectParty()
    {
        $first = $this->Units->selectUnit(1, ['specialisationId' => 1]);
        $second = $this->Units->selectUnit(1, ['specialisationId' => 1]);

        $this->assertNotEquals($first, $second);
        $this->assertEquals([4, 5], $this->Units->party);
    }

    /**
     * Try creating a party whilst not storing the units being selected so the same unit is selected twice
     */
    public function testSelectPartyWithoutPartyOption()
    {
        $first = $this->Units->selectUnit(1, ['specialisationId' => 1, 'party' => false]);
        $second = $this->Units->selectUnit(1, ['specialisationId' => 1, 'party' => false]);

        $this->assertEquals($first, $second);
        $this->assertEquals([], $this->Units->party);
    }
}
