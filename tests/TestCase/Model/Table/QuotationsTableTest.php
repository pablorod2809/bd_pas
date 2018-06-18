<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuotationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuotationsTable Test Case
 */
class QuotationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuotationsTable
     */
    public $Quotations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.quotations_proposals',
        'app.quotations_vehicles_pictures',
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
        $config = TableRegistry::exists('Quotations') ? [] : ['className' => QuotationsTable::class];
        $this->Quotations = TableRegistry::get('Quotations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Quotations);

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
