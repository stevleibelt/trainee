<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18
 */

namespace Trainee;

use InvalidArgumentException;
use RuntimeException;

/**
 * Class Filesystem
 * @package Trainee
 */
class Filesystem
{
    /**
     * @var string
     */
    private $rootPath;

    /**
     * @param null|string $rootPath
     * @throws InvalidArgumentException
     */
    public function __construct($rootPath = '')
    {
        if (!is_null($rootPath)) {
            $this->setRootPath($rootPath);
        }
    }

    /**
     * @param string $rootPath
     * @throws InvalidArgumentException
     */
    public function setRootPath($rootPath)
    {
        if (!is_dir($rootPath)) {
            throw new InvalidArgumentException(
                'provided root path is not a directory'
            );
        }

        $this->rootPath = realpath($rootPath);
    }

    /**
     * @param string $name
     * @return string
     * @throws RuntimeException
     * @todo add validation if directory exist
     */
    public function create($name)
    {
        if (!is_writeable($this->rootPath)) {
            throw new RuntimeException(
                'current path "' . $this->rootPath . '" is not writable'
            );
        }

        $path = $this->rootPath . DIRECTORY_SEPARATOR . $name;

        if (mkdir($path) === false) {
            throw new RuntimeException(
                'could not create directory "' . $path . '"'
            );
        }

        return $path;
    }

    /**
     * @param string $name
     * @throws RuntimeException|InvalidArgumentException
     * @todo add validation if destination is writable
     */
    public function delete($name)
    {
        $path = $this->rootPath . DIRECTORY_SEPARATOR . $name;

        if (is_dir($path)) {
            if (rmdir($path) === false) {
                throw new RuntimeException(
                    'could not delete directory "' . $path . '"'
                );
            }
        } else if (is_file($path)) {
            if (unlink($path) === false) {
                throw new RuntimeException(
                    'could not delete file "' . $path . '"'
                );
            }
        } else {
            throw new InvalidArgumentException(
                'unsupported resource provided by path "' . $path . '"'
            );
        }
    }

    /**
     * @param string $name
     * @return array|string
     * @throws \InvalidArgumentException
     * @todo replace with \FilesystemIterator
     */
    public function read($name)
    {
        $path = $this->rootPath . DIRECTORY_SEPARATOR . $name;

        if (is_dir($path)) {
            $blackList = array(
                '.',
                '..'
            );
            $content = array(
                'directories' => array(),
                'files' => array()
            );

            if ($directoryHandle = opendir($path)) {
                while (false !== ($name = readdir($directoryHandle))) {
                    if (!in_array($name, $blackList)) {
                        if (is_dir($name)) {
                            $content['directories'][] = $name;
                        } else if (is_file($name)) {
                            $content['files'][] = $name;
                        }
                    }
                }
                closedir($directoryHandle);
            }
        } else if (is_file($path)) {
            $content = file_get_contents($path);
        } else {
            throw new InvalidArgumentException(
                'unsupported resource provided by path "' . $path . '"'
            );
        }

        return $content;
    }

    /**
     * @param string $source
     * @param string $destination
     * @param boolean $recursive
     * @throws \RuntimeException
     * @todo implement usage of $recursive if $source is a directory
     */
    public function copy($source, $destination, $recursive)
    {
        $destinationPath = $this->rootPath . DIRECTORY_SEPARATOR . $destination;
        $sourcePath = $this->rootPath . DIRECTORY_SEPARATOR . $source;

        if (copy($sourcePath, $destinationPath) === false) {
            throw new RuntimeException(
                'could not copy "' . $sourcePath . '" to "' . $destinationPath . '"'
            );
        }
    }

    /**
     * @param string $source
     * @param string $destination
     * @throws \RuntimeException
     */
    public function move($source, $destination)
    {
        $destinationPath = $this->rootPath . DIRECTORY_SEPARATOR . $destination;
        $sourcePath = $this->rootPath . DIRECTORY_SEPARATOR . $source;

        if (rename($sourcePath, $destinationPath) === false) {
            throw new RuntimeException(
                'could not move "' . $sourcePath . '" to "' . $destinationPath . '"'
            );
        }
    }

    /**
     * @param string $filename
     * @throws \RuntimeException
     */
    public function touch($filename)
    {
        $path = $this->rootPath . DIRECTORY_SEPARATOR . $filename;

        if (touch($path) === false) {
            throw new RuntimeException(
                'could not touch "' . $path . '"'
            );
        }
    }

    /**
     * @param $filename
     * @throws \RuntimeException
     */
    public function truncate($filename)
    {
        $this->write($filename, '');
    }

    /**
     * @param string $filename
     * @param mixed $data
     * @throws \RuntimeException
     */
    public function append($filename, $data)
    {
        $path = $this->rootPath . DIRECTORY_SEPARATOR . $filename;

        if (file_put_contents($path, $data, FILE_APPEND) === false) {
            throw new RuntimeException(
                'could not append data into "' . $path . '"'
            );
        }
    }

    /**
     * @param string $filename
     * @param mixed $data
     * @throws \RuntimeException
     */
    public function prepend($filename, $data)
    {
        $existingData = $this->read($filename);

        if (is_array($existingData)) {
            array_unshift($existingData, $data);
        }

        $this->write($filename, $existingData);
    }

    /**
     * @param string $filename
     * @param mixed $data
     * @throws \RuntimeException
     */
    public function write($filename, $data)
    {
        $path = $this->rootPath . DIRECTORY_SEPARATOR . $filename;

        if (file_put_contents($path, $data) === false) {
            throw new RuntimeException(
                'could not write data into "' . $path . '"'
            );
        }
    }
}