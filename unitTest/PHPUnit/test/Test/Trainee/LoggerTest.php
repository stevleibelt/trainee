<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-16
 */

namespace Test\Trainee;

use PHPUnit_Framework_TestCase;
use Trainee\Logger;

/**
 * Class LoggerTest
 * @package Test\Trainee
 */
class LoggerTest extends PHPUnit_Framework_TestCase
{
    //begin of test
    public function testSetOutput()
    {
        $this->markTestIncomplete(
            'implement a test that validates if setOutput is working as expected'
        );
    }

    public function testLogWithoutSettingOutput()
    {
        $this->markTestIncomplete(
            'implement a test that validates if an exception is thrown if you want to log without an output'
        );
    }

    public function testLogWithoutContext()
    {
        $this->markTestIncomplete(
            'implement a test that validates if the output is as expected'
        );
    }

    public function testLogWithContext()
    {
        $this->markTestIncomplete(
            'implement a test that validates if the output is as expected with a context'
        );
    }
    //end of test

    //begin of helper
    private function getNewLogger()
    {
        return new Logger();
    }
    //end of helper
}