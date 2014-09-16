<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-16 
 */

namespace Trainee;

/**
 * Interface StringHelperInterface
 * @package Trainee
 */
interface StringHelperInterface
{
    /**
     * @param string $string
     * @param string $search
     * @return boolean
     */
    public function contains($string, $search);

    /**
     * @param string $string
     * @param string $suffix
     * @return boolean
     */
    public function endsWith($string, $suffix);

    /**
     * @param string $string
     * @param string $prefix
     * @return boolean
     */
    public function startsWith($string, $prefix);
}