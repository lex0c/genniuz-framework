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
     * @return string
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function app(string $index):string
    {
        if(parent::getRunnig()):
            if((array_key_exists($index, parent::$appFile))):
                return parent::$appFile[$index];
            else:
                throw new InvalidArgumentException("Key not found in 'app.php'!");
            endif;
        endif;

        throw new RuntimeException("Application not initialized!");
    }

    /**
     * Retorna as variaveis de ambiente referente a 'database'
     * @param string
     * @return string
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function db(string $index):string
    {
        if(parent::getRunnig()):
            if((array_key_exists($index, parent::$dbFile))):
                return parent::$dbFile[$index];
            else:
                throw new InvalidArgumentException("Key not found in 'database.php'!");
            endif;
        endif;

        throw new RuntimeException("Application not initialized!");
    }

    /**
     * Retorna as variaveis de ambiente referente a 'mail'
     * @param string
     * @return string
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function mail(string $index):string
    {
        if(parent::getRunnig()):
            if((array_key_exists($index, parent::$mailFile))):
                return parent::$mailFile[$index];
            else:
                throw new InvalidArgumentException("Key not found in 'mail.php'!");
            endif;
        endif;

        throw new RuntimeException("Application not initialized!");
    }

    /**
     * Retorna as variaveis de ambiente referente a 'aliases'
     * @param string
     * @return string
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function alias(string $index):string
    {
        if(parent::getRunnig()):
            if((array_key_exists($index, parent::$aliasFile))):
                return parent::$aliasFile[$index];
            else:
                throw new InvalidArgumentException("Key not found in 'aliases.php'!");
            endif;
        endif;

        throw new RuntimeException("Application not initialized!");
    }
    
}