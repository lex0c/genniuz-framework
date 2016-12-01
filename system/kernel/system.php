<?php

/**
 * System Functionalities
 * Core functions for including other source files, loading models, etc...
 * 
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \Bootstrap;
 * @copyright 2016 
 * @version 1.0.0
 */

/**
 * Basic defines for timing functions.
 */
define('SECOND', 1);
define('MINUTE', 60);
define('HOUR', 3600);
define('DAY', 86400);
define('WEEK', 604800);
define('MONTH', 2592000);
define('YEAR', 31536000);

define('DS', DIRECTORY_SEPARATOR);

/**
 * Gets an environment variable from available sources.
 * @param string $key Environment variable
 * @return string
 */
function env(string $key, string $default):string 
{
    $path = dirname(dirname(__DIR__)) . '/.appdata';
    
}

