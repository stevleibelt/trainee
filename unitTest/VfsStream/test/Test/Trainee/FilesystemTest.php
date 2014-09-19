<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-18
 */

namespace Test\Trainee;

use PHPUnit_Framework_TestCase;
use Trainee\Filesystem;

/**
 * Class FilesystemTest
 * @package Test\Trainee
 */
class FilesystemTest extends PHPUnit_Framework_TestCase
{
    //begin of test
    public function testSetRootPath()
    {
        $this->markTestIncomplete();
    }

    public function testCreateWithNotWritableRoot()
    {
        $this->markTestIncomplete();
    }

    public function testCreateWithWritableRoot()
    {
        $this->markTestIncomplete();
    }

    public function testDeleteWithDirectory()
    {
        $this->markTestIncomplete();
    }

    public function testDeleteWithFile()
    {
        $this->markTestIncomplete();
    }

    public function testDeleteWithUnsupportedResource()
    {
        $this->markTestIncomplete();
    }

    public function testReadWithEmptyDirectory()
    {
        $this->markTestIncomplete();
    }

    public function testReadWithNotEmptyDirectory()
    {
        $this->markTestIncomplete();
    }

    public function testReadWithEmptyFile()
    {
        $this->markTestIncomplete();
    }

    public function testReadWithNotEmptyFile()
    {
        $this->markTestIncomplete();
    }

    public function testReadWithUnsupportedResource()
    {
        $this->markTestIncomplete();
    }

    public function testCopy()
    {
        $this->markTestIncomplete();
    }

    public function testMove()
    {
        $this->markTestIncomplete();
    }

    public function testTouch()
    {
        $this->markTestIncomplete();
    }

    public function testTruncate()
    {
        $this->markTestIncomplete();
    }

    public function testAppend()
    {
        $this->markTestIncomplete();
    }

    public function testPrepend()
    {
        $this->markTestIncomplete();
    }

    public function testWrite()
    {
        $this->markTestIncomplete();
    }
    //end of test
    //begin of helper
    /**
     * @param string $rootPath
     * @return Filesystem
     */
    private function getNewFilesystem($rootPath = '')
    {
        return new Filesystem($rootPath);
    }
    //end of helper
}