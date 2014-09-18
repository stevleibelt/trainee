<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Trainee;

use InvalidArgumentException;
use RuntimeException;

/**
 * Class Server
 * @package Trainee
 */
class Server
{
    /**
     * @var array|ClientInterface[]
     */
    private $clients = array();

    /**
     * @var NetworkInterface
     */
    private $network;

    /**
     * @var StorageInterface
     */
    private $storage;

    /**
     * @var Timer
     */
    private $timer;

    /**
     * @param ClientInterface $client
     */
    public function addClient(ClientInterface $client)
    {
        $this->clients[] = $client;
    }

    /**
     * @param \Trainee\NetworkInterface $network
     */
    public function setNetwork($network)
    {
        $this->network = $network;
    }

    /**
     * @param \Trainee\StorageInterface $storage
     */
    public function setStorage(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param mixed $timer
     */
    public function setTimer($timer)
    {
        $this->timer = $timer;
    }

    /**
     * @throws InvalidArgumentException|RuntimeException
     */
    public function ping()
    {
        foreach ($this->clients as $client) {
            $this->timer->start();
            $client->setNetwork($this->network);
            $client->ping();
            $this->timer->stop();

            if ($client->isOk()) {
                $data = array(
                    'runtime' => array(
                        'seconds' => $this->timer->getRuntime(),
                        'microseconds' => $this->timer->getRuntime(true)
                    ),
                    'statusCode' => $client->getResponse()->getStatusCode(),
                    'data' => json_encode($client->getResponse()->getData())
                );

                $this->storage->store($data);
            } else {
                throw new RuntimeException(
                    $client->getIdentifier() . ' ping returns a not ok' . PHP_EOL .
                    'status code: ' . $client->getResponse()->getStatusCode()
                );
            }
        }
    }
} 