<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompaniesAgentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompaniesAgentsTable Test Case
 */
class CompaniesAgentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompaniesAgentsTable
     */
    public $CompaniesAgents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.companies_agents',
        'app.companies',
        'app.companies_ads',
        'app.companies_groups',
        'app.companies_parameters',
        'app.companies_vehicles',
        'app.employees',
        'app.quotations',
        'app.agents',
        'app.places',
        'app.agents_places',
        'app.companies_groups_agents',
        'app.answers',
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
        $config = TableRegistry::exists('CompaniesAgents') ? [] : ['className' => CompaniesAgentsTable::class];
        $this->CompaniesAgents = TableRegistry::get('CompaniesAgents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompaniesAgents);

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
