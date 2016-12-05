<?php

/**
 * System Global Env
 * Core function for including other source files, loading models, etc...
 * 
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \System\Kernel;
 * @copyright 2016 
 * @version 1.0.0
 */

/**
 * Get the content of file to manipulation and filtration of data.
 * @param mixed $default 
 * @return mixed
 */
function env(string $key, $default)
{
	/**
     * Get the values.
     * @var array
	 */
	$env = [];
	$aux = [];
	
	$i = 0;
    
	$file = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . '.appdata';
    if(is_readable($file)):
        $file = fopen($file, 'rb');
        
        /**
         * Get the content of file to manipulation.
	     */
        while(!feof ($file)):
        	$row = fgets($file);
            $aux[$i] = $row;         
            $i++;
        endwhile;      
        fclose($file);
        
        /**
         * Filtration of data.
         * @var array
	     */
        $aux = array_map('htmlentities', $aux);
        $aux = array_map('strip_tags', $aux);
        $aux = array_map('trim', $aux);

        for($y = 0; $y <= count($aux)-1; $y++):
        	
        	/**
        	 * Ignores strings started by a '#' for comments in the file.
        	 */
        	if(strcasecmp($aux[$y], strstr($aux[$y], '#'))):
                $str = explode('=', $aux[$y]);
                $env[$str[0]] = $str[1];
                //Validation of types
                $env[$str[0]] = $str[1] == 'true'  ? true  : $str[1];
                $env[$str[0]] = $str[1] == 'false' ? false : $str[1];
                $env[$str[0]] = $str[1] == 'null'  ? null  : $str[1];
            endif;
        endfor;
    endif;
    
    unset($aux);
    unset($file);
    
    $env = array_map('trim', $env);
    if((array_key_exists($key, $env)) && (substr($env[$key], -1) !== '')):
    	
    	/**
    	 * Checks and adds an 'underscore' with prefix to the database.
    	 */
    	if((substr($env['DB_PREFIX'], -1) !== '_') && (substr($env['DB_PREFIX'], -1) !== '-')):
            $env['DB_PREFIX'] .= '_';
    	endif;

        /**
         * Checks and adds an 'pdo_' in driver prefix to the database.
         */
        if((substr($env['DB_DRIVER'], 0, 4) !== 'pdo_')):
            $env['DB_DRIVER'] = 'pdo_' . $env['DB_DRIVER'];
        endif;

    	return $env[$key];
    endif;


    return $default;
}