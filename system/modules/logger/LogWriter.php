<?php namespace System\Modules\Logger;

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
     * Monolog instance
     * @var \Monolog\Logger
     */
	protected $monolog = null;

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

    /**
     * Create a new log writer instance.
     * @param MonologLogger $monolog
     * @return void
     */
    public function __construct(MonologLogger $monolog)
    {
        $this->monolog = $monolog;
    }

    /**
     * Interesting events.
     * Info message to the logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function info(string $message, array $context = []):void
    {}
    
    /**
     * Normal but significant events.
     * Notice message to the logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function notice(string $message, array $context = []):void
    {}
    
    /**
     * Action must be taken immediately.
     * Alert message to the logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function alert(string $message, array $context = []):void
    {}
    
    /**
     * System is unusable.
     * Emergency message to the logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function emergency(string $message, array $context = []):void
    {}

    /**
     * Exceptional occurrences that are not errors.
     * Warning message to the logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function warning(string $message, array $context = []):void
    {}

    /**
     * Runtime errors that do not require immediate action.
     * Error message to the logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function error(string $message, array $context = []):void
    {}
    
    /**
     * Critical conditions.
     * Critical message to the logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function critical(string $message, array $context = []):void
    {}
    
    /**
     * Detailed debug information.
     * Debug message to the logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function debug(string $message, array $context = []):void
    {}

    /**
     * Logs with an arbitrary level.
     * Log message to the logs.
     * @param string $level
     * @param string $message
     * @param array $context
     * @return void
     */
    public function log(string $level, string $message, array $context = []):void
    {}

    /**
     * Get Monolog instance
     * @return MonologLogger
     */
    public function getMonolog():MonologLogger
    {
    	return $this->monolog;
    }

    /**
     * Get level into a Monolog constant
     * @param string $level
     * @return int
     * 
     * @throws InvalidArgumentException
     */
    public function getLevel(string $level):int
    {
    	if(array_key_exists($level, $this->levels)):
            return $this->levels[$level];
    	endif;

    	throw new InvalidArgumentException('Key not found in array "levels".');
    }

}