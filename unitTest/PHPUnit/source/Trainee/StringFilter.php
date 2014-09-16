<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-16
 */

namespace Trainee;

use InvalidArgumentException;

/**
 * Class Validator
 * @package Trainee
 */
class StringFilter
{
    /**
     * @var array
     */
    private $search = array(
        'foo',
        'bar',
        'foobar'
    );

    /**
     * @param string $string
     * @return string
     * @throws \InvalidArgumentException
     */
    public function filter($string)
    {
        if (!is_string($string)) {
            throw new InvalidArgumentException(
                'only string supported'
            );
        }

        $stringAfterReplacement = str_replace($this->search, '', $string);
        $stringWithSpecialChars = htmlentities($stringAfterReplacement);
        $stringWithSlashes = addslashes($stringWithSpecialChars);

        return $stringWithSlashes;
    }
} 