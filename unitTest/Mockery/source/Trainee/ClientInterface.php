<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Trainee;

/**
 * Interface ClientInterface
 * @package Trainee
 */
interface ClientInterface
{
    public function ping();

    /**
     * @return boolean
     */
    public function isOk();

    /**
     * @return string
     */
    public function getIdentifier();

    /**
     * @return Response
     */
    public function getResponse();

    /**
     * @param NetworkInterface $network
     * @return $this
     */
    public function setNetwork(NetworkInterface $network);
} 