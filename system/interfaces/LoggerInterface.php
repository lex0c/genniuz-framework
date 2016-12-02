<?php namespace System\Interfaces;

/**
 * Loggger Interface
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package System\Interfaces;
 * @copyright 2016 
 * @version 1.0.0
 */
interface LogggerInterface
{
    /**
     * Informational message for logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function info(string $message, array $context = []):void;

    /**
     * Notice for logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function notice(string $message, array $context = []):void;

    /**
     * Alert message for logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function alert(string $message, array $context = []):void;


    /**
     * Notice for logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function emergency(string $message, array $context = []):void;

    /**
     * Warning message for logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function warning(string $message, array $context = []):void;

    /**
     * Error message for logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function error(string $message, array $context = []):void;

    /**
     * Critical message for logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function critical(string $message, array $context = []):void;

    /**
     * Debug message for logs.
     * @param string $message
     * @param array $context
     * @return void
     */
    public function debug(string $message, array $context = []):void;

}