<?php namespace System;

/*
 ===========================================================================
 = Application Loader
 ===========================================================================
 =
 = Load all files, services, modules and components to initialize 
 = the ecosystem.
 = 
 */

use \RuntimeException;
use \System\Interfaces\RunnableInterface;

/**
 * Application Start
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \Bootstrap;
 * @copyright 2016 
 * @version 1.0.0
 */
class Application implements RunnableInterface
{
	/**
     * Check then app loaded.
     * @var boolean
	 */
	private static $running = false;

    /**
     * Path to config files.
     * @var string
     */
    private static $path = ROOT . DS . 'configs' . DS;

    /**
     * Config files.
     * @var array
     */
    protected static $appFile   = [];
    protected static $dbFile    = [];
    protected static $mailFile  = [];
    protected static $aliasFile = [];

    /**
     * Loader.
     * @param array [optional]
     * @return boolean
     * 
     * @throws RuntimeException
     */
    public static function run(array $data = []):bool
    {        
    	if((self::checkEssentialsRequires()) && (!self::$running)):
            self::$running = true;        
            self::loadEssentialFiles();
            return true;
        endif;

        return false;
    }

    /**
     * Load the essentials files of configs.
     * @return boolean
     * 
     * @throws RuntimeException
     */
    protected static function loadEssentialFiles()
    {   
        //Check and load...
        if((is_readable(self::$path . 'app.php')) && (is_readable(self::$path . 'database.php')) 
            && (is_readable(self::$path . 'mail.php')) && (is_readable(self::$path . 'aliases.php'))):
            
            $kernelSystem = (__DIR__) . DS . 'kernel' . DS . 'system.php';
            if(is_readable($kernelSystem)):
                require_once ($kernelSystem);
            else:
                throw new RuntimeException('System file not found..');
                die();
            endif;

            /**
             * Load the config files.
             */
            self::$appFile   = require_once (self::$path . 'app.php');
            self::$dbFile    = require_once (self::$path . 'database.php');
            self::$mailFile  = require_once (self::$path . 'mail.php');
            self::$aliasFile = require_once (self::$path . 'aliases.php');

            return true;
        endif;
        
        throw new RuntimeException("Essential files of configurations not found in 'configs'.");
    }

    /**
     * Check the essentials requires for initialize genniuz.
     * @return boolean
     * 
     * @throws trigger_error
     */
    private static function checkEssentialsRequires():bool
    {
        /*
         * Genius is developed on the core of PHP7.0, but is supported backward 
         * compatibility with modules in versions below 7.0, so it is necessary PHP7.0 
         * to maintain the stability of the framework and its dependencies.
         */
        if(version_compare(PHP_VERSION, '7.0') < 0):
            trigger_error(
                'Your PHP version must be equal or higher than 7.0 to use Genniuz.', E_USER_ERROR);
        endif;

        /*
         * Internationalization extension (further is referred as Intl) is a wrapper 
         * for ICU library, enabling PHP programmers to perform various locale-aware operations 
         * including but not limited to formatting, transliteration, encoding conversion, 
         * calendar operations, » UCA-conformant collation, locating text boundaries and working 
         * with locale identifiers, timezones and graphemes.
         */
        if(!extension_loaded('intl')):
            trigger_error('You must enable the intl extension to use Genniuz.', E_USER_ERROR);
        endif;

        /*
         * mbstring provides multibyte specific string functions that help you deal with 
         * multibyte encodings in PHP. In addition to that, mbstring handles character encoding 
         * conversion between the possible encoding pairs. mbstring is designed to handle 
         * Unicode-based * encodings such as UTF-8 and UCS-2 and many single-byte 
         * encodings for convenience.
         */
        if(!extension_loaded('mbstring')):
            trigger_error('You must enable the mbstring extension to use Genniuz.', E_USER_ERROR);
        endif;

        /*
         * The PHP Data Objects (PDO) extension defines a lightweight, consistent interface 
         * for accessing databases in PHP. Each database driver that implements the PDO interface 
         * can expose database-specific features as regular extension functions. Note that you cannot 
         * perform any database functions using the PDO extension by itself; you must use a 
         * database-specific PDO driver to access a database server.
         */
        if(!extension_loaded('pdo')):
            trigger_error('You must enable the PDO extension to use Genniuz.', E_USER_ERROR);
        endif;
       
       return true;
    }

    /**
     * Application Sleep.
     * @param array [optional]
     * @return boolean
     */
    public static function sleep(array $data = []):bool
    {}

    /**
     * Application Destroy.
     * @return boolean
     */
    public static function destroy():bool
    {
        if(self::$running):
            self::$appFile   = [];
            self::$dbFile    = [];
            self::$mailFile  = [];
            self::$aliasFile = [];
            self::$running = false;
            return true;
        endif;

        return false;
    }

    /**
     * Application Status. 
     * @return boolean
     */
    protected static function getRunnig():bool
    {
        return self::$running;
    }

}