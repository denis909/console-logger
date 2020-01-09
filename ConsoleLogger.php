<?php
/**
 * @author denis909 <dev@denis909.spb.ru>
 * @license MIT
 * @link http://denis909.spb.ru
 */
namespace Denis909\ConsoleLogger;

use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

class ConsoleLogger extends AbstractLogger
{

    public $levels = [
        LogLevel::EMERGENCY,
        LogLevel::ALERT,
        LogLevel::CRITICAL,
        LogLevel::ERROR,
        LogLevel::WARNING,
        LogLevel::NOTICE,
        LogLevel::INFO,
        LogLevel::DEBUG
    ];

    public function log($level, $message, array $context = [])
    {
        if (array_search($level, $this->levels) === false)
        {
            return;
        }

        if ($message === null)
        {
            print_r($context);

            return;
        }

        echo strtr($message, $context) . PHP_EOL;
    }

}