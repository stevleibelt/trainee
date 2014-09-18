<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Trainee;

use RuntimeException;

/**
 * Interface StorageInterface
 * @package Trainee
 */
interface StorageInterface
{
    /**
     * @param $data
     * @return $this
     * @throws RuntimeException
     */
    public function store($data);
} 