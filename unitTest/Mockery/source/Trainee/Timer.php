<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Trainee;

/**
 * Class Timer
 * @package Trainee
 */
class Timer
{
    /**
     * @var float
     */
    private $microtimeWhenStarted = 0;

    /**
     * @var float
     */
    private $microtimeWhenStopped = 0;

    /**
     * @return int
     */
    public function getCurrentMicrotime()
    {
        return microtime(true);
    }

    /**
     * @param bool $inMicroseconds
     * @return float|int
     */
    public function getRuntime($inMicroseconds = false)
    {
        $runtimeInMicroseconds = ($this->microtimeWhenStopped - $this->microtimeWhenStarted);

        return (($inMicroseconds) ? $runtimeInMicroseconds : (int) $runtimeInMicroseconds);
    }

    public function reset()
    {
        $this->microtimeWhenStarted = 0;
        $this->microtimeWhenStopped = 0;
    }

    public function start()
    {
        $this->reset();
        $this->microtimeWhenStarted = $this->getCurrentMicrotime();
    }

    public function stop()
    {
        $this->microtimeWhenStopped = $this->getCurrentMicrotime();
    }
}