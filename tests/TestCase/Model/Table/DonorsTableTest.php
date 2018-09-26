<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DonorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DonorsTable Test Case
 */
class DonorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DonorsTable
     */
    public $Donors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.donors',
        'app.activities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Donors') ? [] : ['className' => DonorsTable::class];
        $this->Donors = TableRegistry::getTableLocator()->get('Donors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Donors);

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
