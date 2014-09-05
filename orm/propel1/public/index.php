<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-04 
 */

//use composer autoloader
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$isCalledFromCommandLineInterface = (PHP_SAPI === 'cli');

$lineEnding = ($isCalledFromCommandLineInterface) ? PHP_EOL : '<br />';

//start your implementation here
echo 'Start your basic implementation here.' . $lineEnding;
echo 'It does not matter (and it is not important) if you implement a MVC on your own, use a framework or something else.' . $lineEnding;
echo '----------------' . $lineEnding;
echo 'Stay focused on learning the propel orm.' . $lineEnding;
