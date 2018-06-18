<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IvaTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IvaTypesTable Test Case
 */
class IvaTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IvaTypesTable
     */
    public $IvaTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.iva_types',
        'app.customers',
        'app.documents_types',
        'app.places',
        'app.quotations',
        'app.agents',
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
        $config = TableRegistry::exists('IvaTypes') ? [] : ['className' => IvaTypesTable::class];
        $this->IvaTypes = TableRegistry::get('IvaTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IvaTypes);

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
}
