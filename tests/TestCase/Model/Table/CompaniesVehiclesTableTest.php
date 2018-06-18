<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompaniesVehiclesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompaniesVehiclesTable Test Case
 */
class CompaniesVehiclesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompaniesVehiclesTable
     */
    public $CompaniesVehicles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.companies_vehicles',
        'app.companies',
        'app.companies_ads',
        'app.companies_groups',
        'app.companies_parameters',
        'app.employees',
        'app.quotations',
        'app.agents',
        'app.places',
        'app.agents_places',
        'app.companies_agents',
        'app.companies_groups_agents',
        'app.customers',
        'app.documents_types',
        'app.iva_types',
        'app.quotations_proposals',
        'app.quotations_vehicles_pictures',
        'app.answers',
        'app.quotations_answers',
        'app.companies_answers',
        'app.questions',
        'app.companies_questions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CompaniesVehicles') ? [] : ['className' => CompaniesVehiclesTable::class];
        $this->CompaniesVehicles = TableRegistry::get('CompaniesVehicles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompaniesVehicles);

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
