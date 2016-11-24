<?php namespace System;

/*
 ===========================================================================
 = Variaveis de Ambiente
 ===========================================================================
 =
 = Carrega e disponibiliza para toda a aplicação variaveis úteis para a 
 = personalização dos módulos em runtime.
 = 
 */

use \RuntimeException;
use \InvalidArgumentException;
use \Bootstrap\App as Application;

/**
 * @name Variables of Environment
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \System;
 * @copyright 2016 
 * @version 1.0.0
 */
final class VariablesEnvironment extends Application
{
    /**
     * Retorna as variaveis de ambiente referente a 'app'
     * @param string
     * @return array
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function app($index)
    {
        if(parent::getRunnig()):
            if((is_string($index)) && (array_key_exists($index, parent::$appFile))):
                return parent::$appFile[$index];
            else:
                throw new InvalidArgumentException("Key not found in 'app'!");
            endif;
        else:
            throw new RuntimeException("Application not initialized!");
        endif;

        return [];
    }

    /**
     * Retorna as variaveis de ambiente referente a 'database'
     * @param string
     * @return array
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function db($index)
    {
        if(parent::getRunnig()):
            if((is_string($index)) && (array_key_exists($index, parent::$dbFile))):
                return parent::$dbFile[$index];
            else:
                throw new InvalidArgumentException("Key not found in 'database'!");
            endif;
        else:
            throw new RuntimeException("Application not initialized!");
        endif;

        return [];
    }

    /**
     * Retorna as variaveis de ambiente referente a 'mail'
     * @param string
     * @return array
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function mail($index)
    {
        if(parent::getRunnig()):
            if((is_string($index)) && (array_key_exists($index, parent::$mailFile))):
                return parent::$mailFile[$index];
            else:
                throw new InvalidArgumentException("Key not found in 'mail'!");
            endif;
        else:
            throw new RuntimeException("Application not initialized!");
        endif;

        return [];
    }

    /**
     * Retorna as variaveis de ambiente referente a 'aliases'
     * @param string
     * @return array
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function alias($index)
    {
        if(parent::getRunnig()):
            if((is_string($index)) && (array_key_exists($index, parent::$aliasFile))):
                return parent::$aliasFile[$index];
            else:
                throw new InvalidArgumentException("Key not found in 'aliases'!");
            endif;
        else:
            throw new RuntimeException("Application not initialized!");
        endif;

        return [];
    }
    
}