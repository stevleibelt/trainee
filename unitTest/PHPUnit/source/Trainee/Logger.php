<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-09-16
 */

namespace Trainee;

use Psr\Log\AbstractLogger;
use Exception;

/**
 * Class Logger
 * @package Trainee
 */
class Logger extends AbstractLogger
{
    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * @param OutputInterface $output
     * @return $this
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     * @throws Exception
     */
    public function log($level, $message, array $context = array())
    {
        $this->throwExceptionIfNotAllMandatoryPropertiesAreSet();

        $this->output->writeLine($level . ': ' . $message);

        if (!empty($context)) {
            $indention = '  ';
            $this->output->writeLine($indention . 'context:');
            $this->output->writeLines($context, $indention . $indention);
        }
    }

    /**
     * @throws Exception
     */
    private function throwExceptionIfNotAllMandatoryPropertiesAreSet()
    {
        if (!($this->output instanceof OutputInterface)) {
            throw new Exception(
                'output is mandatory property'
            );
        }
    }
}