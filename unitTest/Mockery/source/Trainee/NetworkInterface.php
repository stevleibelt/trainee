<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Trainee;

use InvalidArgumentException;
use RuntimeException;

/**
 * Interface NetworkInterface
 * @package Trainee
 */
interface NetworkInterface
{
    /**
     * @param string $url
     * @return Response
     * @throws RuntimeException
     */
    public function pull($url);

    /**
     * @param string $url
     * @param mixed $data
     * @return Response
     * @throws InvalidArgumentException|RuntimeException
     */
    public function push($url, $data);
} 