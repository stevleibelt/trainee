<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Test\Trainee;

use PHPUnit_Framework_TestCase;
use Trainee\Response;

/**
 * Class ResponseTest
 * @package Test\Trainee
 */
class ResponseTest extends PHPUnit_Framework_TestCase
{
    //begin of tests
    public function testConstruct()
    {
        $response = $this->getNewResponse();

        $this->assertEquals(0, $response->getStatusCode());
        $this->assertEquals(0, count($response->getData()));
    }

    /**
     * @depends testSetData
     */
    public function testGetData()
    {
        $data = array('foo' => 'bar');
        $response = $this->getNewResponse();

        $response->setData($data);

        $this->assertEquals($data, $response->getData());
    }

    /**
     * @depends testSetStatusCode
     */
    public function testGetStatusCode()
    {
        $response = $this->getNewResponse();
        $statusCode = __LINE__;

        $response->setStatusCode($statusCode);

        $this->assertEquals($statusCode, $response->getStatusCode());
    }

    public function testSetData()
    {
        $data = array('foo' => 'bar');
        $response = $this->getNewResponse();

        $this->assertEquals($response, $response->setData($data));
    }

    public function testSetStatusCode()
    {
        $response = $this->getNewResponse();
        $statusCode = __LINE__;

        $this->assertEquals($response, $response->setStatusCode($statusCode));
    }

    public function testReset()
    {
        $data = array('foo' => 'bar');
        $response = $this->getNewResponse();
        $statusCode = __LINE__;

        $response->setData($data);
        $response->setStatusCode($statusCode);
        $response->reset();

        $this->assertEquals(0, $response->getStatusCode());
        $this->assertEquals(0, count($response->getData()));
    }
    //end of tests

    //begin of helpers
    /**
     * @return Response
     */
    private function getNewResponse()
    {
        return new Response();
    }
    //end of helpers
}