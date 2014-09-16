<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-16
 */

namespace Trainee;

/**
 * Class ConsoleOutput
 * @package Trainee
 */
class ConsoleOutput implements OutputInterface
{
    /**
     * @param string $content
     */
    public function write($content)
    {
        echo $content;
    }

    /**
     * @param string $line
     */
    public function writeLine($line)
    {
        $this->write($line . PHP_EOL);
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