<?php namespace System\Core\Logger;

/*
 ===========================================================================
 = Serviço de Logs
 ===========================================================================
 =
 = Disponibiliza para toda a aplicação uma interface simples de logs para 
 = registro e depuração de erros.
 = 
 */

use \Monolog\Logger as MonologLogger;
use \Monolog\Formatter\LineFormatter;
use \Monolog\Handler\SyslogHandler;
use \Monolog\Handler\StreamHandler;
use \Monolog\Handler\ErrorLogHandler;

use \Psr\Log\LoggerInterface as PSRLogInterface;
use \System\Interfaces\LoggerInterface as GenniuzLogInterface;

use \RuntimeException;
use \InvalidArgumentException;

/**
 * Logger Writer
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package System\Core\Logger;
 * @copyright 2016 
 * @version 1.0.0
 */
class LogWriter implements PSRLoggerInterface, GenniuzLogInterface
{
    /**
     * Log levels
     * @var array
     */
    protected $levels = [
        'info'       => MonologLogger::INFO,
        'notice'     => MonologLogger::NOTICE,
        'alert'      => MonologLogger::ALERT,
        'emergency'  => MonologLogger::EMERGENCY,
        'warning'    => MonologLogger::WARNING,
        'error'      => MonologLogger::ERROR,
        'critical'   => MonologLogger::CRITICAL,
        'debug'      => MonologLogger::DEBUG
    ];

    
    
    

}