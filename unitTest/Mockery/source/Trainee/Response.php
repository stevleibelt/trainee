<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Trainee;

/**
 * Class Response
 * @package Trainee
 * @see
 *  https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
 */
class Response
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var int
     */
    private $statusCode;

    public function __construct()
    {
        $this->reset();
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function reset()
    {
        $this->data = array();
        $this->statusCode = 0;
    }
} 