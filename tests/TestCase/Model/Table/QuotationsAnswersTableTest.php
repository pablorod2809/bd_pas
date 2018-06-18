<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuotationsAnswersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuotationsAnswersTable Test Case
 */
class QuotationsAnswersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuotationsAnswersTable
     */
    public $QuotationsAnswers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.answers',
        'app.companies_answers',
        'app.questions',
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
        $config = TableRegistry::exists('QuotationsAnswers') ? [] : ['className' => QuotationsAnswersTable::class];
        $this->QuotationsAnswers = TableRegistry::get('QuotationsAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QuotationsAnswers);

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
