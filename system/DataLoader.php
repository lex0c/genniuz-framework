<?php namespace System;

use \System\Interfaces\ConfigLoaderInterface;

/**
 *   
 */

abstract class DataLoader implements ConfigLoaderInterface
{
    /**
     *  
     */
    public static function loader($index, array $conf)
    {
        if((is_string($index)) && (array_key_exists($index, $conf))):
            return $conf[$index];
        endif;

        return null;
    }
}