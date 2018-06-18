<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AgentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AgentsController Test Case
 */
class AgentsControllerTest extends IntegrationTestCase
{

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
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
