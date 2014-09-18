<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Test\Trainee;

use PHPUnit_Framework_TestCase;
use Trainee\Timer;

/**
 * Class TimerTest
 * @package Test\Trainee
 */
class TimerTest extends PHPUnit_Framework_TestCase
{
    //begin of tests
    public function testGetCurrentMicrotime()
    {
        $timer = $this->getNewTimer();

        $this->assertGreaterThanOrEqual(
            microtime(true),
            $timer->getCurrentMicrotime()
        );
    }

    public function testGetRuntimeWithoutStart()
    {
        $timer = $this->getNewTimer();

        $this->assertGreaterThanOrEqual(
            0,
            $timer->getRuntime()
        );
        $this->assertGreaterThanOrEqual(
            0,
            $timer->getRuntime(true)
        );
    }

    public function testStartAndStopInMicroseconds()
    {
        $timer = $this->getNewTimer();
        $timer->start();
        usleep(500);
        $timer->stop();

        $this->assertGreaterThanOrEqual(
            0.000500,
            $timer->getRuntime(true)
        );
    }

    public function testStartAndStopInSeconds()
    {
        $timer = $this->getNewTimer();
        $timer->start();
        sleep(1);
        $timer->stop();

        $this->assertEquals(1, $timer->getRuntime());
    }
    //end of tests

    //begin of helpers
    private function getNewTimer()
    {
        return new Timer();
    }
    //end of helpers
}