<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-16
 */

namespace Trainee;

/**
 * Interface OutputInterface
 * @package Trainee
 */
interface OutputInterface
{
    /**
     * @param string $content
     */
    public function write($content);

    /**
     * @param string $line
     */
    public function writeLine($line);

    /**
     * @param array $lines
     * @param string $indention
     */
    public function writeLines(array $lines, $indention = '');
}