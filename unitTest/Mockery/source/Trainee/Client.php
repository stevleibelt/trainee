<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Trainee;

use RuntimeException;

/**
 * Class Client
 * @package Trainee
 */
class Client implements ClientInterface
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var NetworkInterface
     */
    private $network;

    /**
     * @var Response
     */
    private $response;

    /**
     * @var string
     */
    private $url;

    public function __construct($identifier, $url)
    {
        $this->identifier = $identifier;
        $this->url = $url;
    }

    /**
     * @return boolean
     */
    public function isOk()
    {
        return ($this->response->getStatusCode() < 400);
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return null|Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @throws RuntimeException
     */
    public function ping()
    {
        $this->response = $this->network->pull($this->url);
    }

    /**
     * @param NetworkInterface $network
     * @return $this
     */
    public function setNetwork(NetworkInterface $network)
    {
        $this->network = $network;

        return $this;
    }
} 