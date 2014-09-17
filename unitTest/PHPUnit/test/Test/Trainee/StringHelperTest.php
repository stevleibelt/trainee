<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-16 
 */

namespace Test\Trainee;

use PHPUnit_Framework_TestCase;
use Trainee\StringHelper;

/**
 * Class StringHelperTest
 * @package Test\Trainee
 */
class StringHelperTest extends PHPUnit_Framework_TestCase
{
    //begin of test
    public function testImplements()
    {
        $helper = $this->getNewStringHelper();

        $this->assertInstanceOf(
            'Trainee\\StringHelperInterface',
            $helper
        );
    }

    /**
     * @dataProvider containsProvider
     * @param string $string
     * @param string $contains
     * @param boolean $expectedResult
     */
    public function testContains($string, $contains, $expectedResult)
    {
        $helper = $this->getNewStringHelper();
        $result = $helper->contains($string, $contains);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider endsWithProvider
     * @param string $string
     * @param string $suffix
     * @param boolean $expectedResult
     */
    public function testEndsWith($string, $suffix, $expectedResult)
    {
        $helper = $this->getNewStringHelper();
        $result = $helper->endsWith($string, $suffix);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider startsWithProvider
     * @param string $string
     * @param string $prefix
     * @param boolean $expectedResult
     */
    public function testStartsWith($string, $prefix, $expectedResult)
    {
        $helper = $this->getNewStringHelper();
        $result = $helper->startsWith($string, $prefix);

        $this->assertEquals($expectedResult, $result);
    }
    //end of test

    //begin of data providers
    /**
     * @return array
     */
    public function containsProvider()
    {
        return array(
            array('there is no foo without a bar', 'foo', true),
            array('there is no foo without a bar', ' ', true),
            array('there is no foo without a bar', ' foo', true),
            array('there is no foo without a bar', ' foo ', true),
            array('there is no foo without a bar', ' fOo ', false),
            array('there is no foo without a bar', ' F', false),
            array('there is no foo without a bar', 'foobar', false)
        );
    }

    /**
     * @return array
     */
    public function endsWithProvider()
    {
        return array(
            array('there is no foo without a bar', 'bar', true),
            array('there is no foo without a bar', ' bar', true),
            array('there is no foo without a bar', 'a bar', true),
            array('there is no foo without a bar', '  bar', false),
            array('there is no foo without a bar', 'foobar', false),
            array('there is no foo without a bar', ' ', false),
            array('there is no foo without a bar', 'bar ', false)
        );
    }

    /**
     * @return array
     */
    public function startsWithProvider()
    {
        return array(
            array('there is no foo without a bar', 't', true),
            array('there is no foo without a bar', 'there', true),
            array('there is no foo without a bar', 'there ', true),
            array('there is no foo without a bar', ' ', false),
            array('there is no foo without a bar', 'there Is', false),
            array('there is no foo without a bar', 'there\'s', false),
            array('there is no foo without a bar', 'T', false)
        );
    }
    //end of data providers

    //begin of helper
    /**
     * @return \Trainee\StringHelperInterface
     */
    private function getNewStringHelper()
    {
        return new StringHelper();
    }
    //end of helper
}