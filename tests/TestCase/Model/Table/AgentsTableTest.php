<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgentsTable Test Case
 */
class AgentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AgentsTable
     */
    public $Agents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.agents',
        'app.places',
        'app.agents_places',
        'app.quotations',
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
        'app.companies_groups_agents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Agents') ? [] : ['className' => AgentsTable::class];
        $this->Agents = TableRegistry::get('Agents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Agents);

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
