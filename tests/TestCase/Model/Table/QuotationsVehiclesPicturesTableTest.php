<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuotationsVehiclesPicturesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuotationsVehiclesPicturesTable Test Case
 */
class QuotationsVehiclesPicturesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuotationsVehiclesPicturesTable
     */
    public $QuotationsVehiclesPictures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.quotations_vehicles_pictures',
        'app.quotations',
        'app.agents',
        'app.places',
        'app.agents_places',
        'app.companies',
        'app.companies_ads',
        'app.companies_groups',
        'app.companies_parameters',
        'app.companies_vehicles',
        'app.employees',
        'app.companies_agents',
        'app.answers',
        'app.companies_answers',
        'app.questions',
        'app.companies_questions',
        'app.companies_groups_agents',
        'app.customers',
        'app.documents_types',
        'app.iva_types',
        'app.quotations_proposals',
        'app.quotations_answers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('QuotationsVehiclesPictures') ? [] : ['className' => QuotationsVehiclesPicturesTable::class];
        $this->QuotationsVehiclesPictures = TableRegistry::get('QuotationsVehiclesPictures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QuotationsVehiclesPictures);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
