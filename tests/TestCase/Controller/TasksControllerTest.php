<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TasksController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TasksController Test Case
 */
class TasksControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tasks',
        'app.donors',
        'app.users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getMonthTasks route without args; method
     *
     * @return void
     */
    public function testCanGetMonthTasksWithoutArgs()
    {
        $this->get('/tasks/getMonthTasks');
        $this->assertResponseOk();
        $this->assertResponseContains('tasks');
    }

    /**
     * Test getMonthTasks route with args; method
     *
     * @return void
     */
    public function testCanGetMonthTasksWithArgs()
    {
        //create start and end dates
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('+1 month'));

        $this->get("/tasks/getMonthTasks?start_date=$start_date&end_date=$end_date");
        $this->assertResponseOk();
        $this->assertResponseContains('tasks');
    }
}
