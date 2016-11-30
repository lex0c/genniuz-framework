<?php namespace System\Interfaces;

/**
 * Runnable Interface
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package System\Interfaces;
 * @copyright 2016 
 * @version 1.0.0
 */
Interface RunnableInterface
{
    /**
     * Initialize of resources.
     * @param array $data
     * @return boolean
     */
    public static function run(array $data):bool;
     
    /**
     * Pause the status of a resource.
     * @param array $data
     * @return boolean
     */
    public static function sleep(array $data):bool;

    /**
     * Destroyer of resource and yours instances.
     * @return boolean
     */
    public static function destroy():bool;
    
}