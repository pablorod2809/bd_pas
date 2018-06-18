<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnswersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnswersTable Test Case
 */
class AnswersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnswersTable
     */
    public $Answers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.answers',
        'app.questions',
        'app.quotations_answers',
        'app.quotations',
        'app.agents',
        'app.places',
        'app.agents_places',
        'app.customers',
        'app.documents_types',
        'app.iva_types',
        'app.companies',
        'app.companies_ads',
        'app.companies_groups',
        'app.companies_parameters',
        'app.companies_vehicles',
        'app.employees',
        'app.companies_agents',
        'app.companies_answers',
        'app.companies_questions',
        'app.companies_groups_agents',
        'app.quotations_proposals',
        'app.quotations_vehicles_pictures'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Answers') ? [] : ['className' => AnswersTable::class];
        $this->Answers = TableRegistry::get('Answers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Answers);

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
