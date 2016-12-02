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

/**
 * Gets an environment variable from available sources.
 * @param string $key Environment variable
 * @param [mix] $default 
 * @return [mix] types
 */
function env(string $key, $default)
{
	$env = [];
	$aux = [];
	$i = 0;
    
	$file = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . '.appdata';
    if(is_readable($file)):
        $file = fopen($file, 'r');
        
        while(!feof ($file)):
        	$row = fgets($file);
            $aux[$i] = $row;         
            $i++;
        endwhile;      
        fclose($file);
        
        $aux = array_map('htmlentities', $aux);
        $aux = array_map('strip_tags', $aux);
        $aux = array_map('trim', $aux);

        for($y = 0; $y <= count($aux)-1; $y++):
        	if(strcasecmp($aux[$y], strstr($aux[$y], '#'))):
                $str = explode('=', $aux[$y]);
                $env[$str[0]] = $str[1];
                $env[$str[0]] = ($str[1] == 'null')?null:$str[1];
            endif;
        endfor;
    endif;
    
    unset($aux);
    unset($file);
    $env = array_map('trim', $env);
    
    if((array_key_exists($key, $env)) && (substr($env[$key], -1) !== '')):
    	return $env[$key];
    endif;

    return $default;
}

