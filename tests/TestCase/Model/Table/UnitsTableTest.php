<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnitsTable;
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

        parent::tearDown();
    }

    public function dataProviderSelectUnit()
    {
        return [
            [
                'options' => [],
                'Eldin'
            ]
        ];
    }

    /**
     * Test selectUnit method
     *
     * @dataProvider dataProviderSelectUnit
     *
     * @return void
     */
    public function testSelectUnit($options, $expected)
    {
        $unitsTable = TableRegistry::get('Units');
        $acquire = $unitsTable->selectUnit(1, $options);

        $this->assertInstanceOf('\Cake\Datasource\EntityInterface', $acquire);
        $this->assertInstanceOf('\App\Model\Entity\Acquire', $acquire);
        $this->assertInstanceOf('\App\Model\Entity\Unit', $acquire->unit);
        $this->assertEquals($expected, $acquire->unit->name);

    }
}
