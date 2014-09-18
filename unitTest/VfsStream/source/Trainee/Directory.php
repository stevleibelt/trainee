<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18 
 */

namespace Trainee;

use InvalidArgumentException;

/**
 * Class Directory
 * @package Trainee
 */
class Directory
{
    /**
     * @var string
     */
    private $rootPath;

    /**
     * @param null|string $rootPath
     * @throws InvalidArgumentException
     */
    public function __construct($rootPath)
    {
        if (!is_null($rootPath)) {
            $this->setRootPath($rootPath);
        }
    }

    /**
     * @param string $rootPath
     * @throws \InvalidArgumentException
     */
    public function setRootPath($rootPath)
    {
        if (!is_dir($rootPath)) {
            throw new InvalidArgumentException(
                'provided root path is not a directory'
            );
        }

        $this->rootPath = $rootPath;
    }

    public function create($name)
    {
        $path = $this->rootPath . DIRECTORY_SEPARATOR . $name;

        mkdir($path);

        $directory = clone $this;
        $directory->setRootPath($path);

        return $directory;
    }

    public function read()
    {

    }

    public function delete($name)
    {

    }

    public function move($oldName, $newName)
    {

    }
} 