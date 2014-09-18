<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Test\Trainee;

use PHPUnit_Framework_TestCase;
use Trainee\Client;

/**
 * Class ServerTest
 * @package Test\Trainee
 */
class ServerTest extends PHPUnit_Framework_TestCase
{
    //begin of tests
    public function testAddClient()
    {
        $this->markTestIncomplete();
    }

    public function testSetNetwork()
    {
        $this->markTestIncomplete();
    }

    public function testSetStorage()
    {
        $this->markTestIncomplete();
    }

    public function testSetTimer()
    {
        $this->markTestIncomplete();
    }

    public function testPingWithNoAddedClients()
    {
        $this->markTestIncomplete();
    }

    public function testPingWithAddedClientsUsingGetMockOfClient()
    {
        $this->markTestIncomplete();
    }

    public function testPingWithAddedClientsUsingGetNewClient()
    {
        $this->markTestIncomplete();
    }

    public function testPingWithAddedClientsOneIsFailingAfterThreePings()
    {
        $this->markTestIncomplete();
    }

    public function testPingWithAddedClientsAndBrokenNetwork()
    {
        $this->markTestIncomplete();
    }
    //end of tests

    //begin of helpers
    private function getMockOfClient()
    {
        //@todo
    }

    /**
     * @param string $identifier
     * @param string $url
     * @return Client
     */
    public function getNewClient($identifier, $url)
    {
        return new Client($identifier, $url);
    }
    //end of helpers
}