<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-16 
 */

namespace Trainee;

/**
 * Class OutputCache
 * @package Trainee
 */
class OutputCache implements OutputInterface
{
    /**
     * @var array
     */
    private $cache = array();

    /**
     * @return array
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @return $this
     */
    public function resetCache()
    {
        $this->cache = array();

        return $this;
    }

    /**
     * @param string $content
     */
    public function write($content)
    {
        $lastLine = array_pop($this->cache);
        $lastLine .= $content;
        $this->cache[] = $lastLine;
    }

    /**
     * @param string $line
     */
    public function writeLine($line)
    {
        $this->cache[] = $line;
    }

    /**
     * @param array $lines
     * @param string $indention
     */
    public function writeLines(array $lines, $indention = '')
    {
        foreach ($lines as $line) {
            $this->writeLine($indention . $line);
        }
    }
}