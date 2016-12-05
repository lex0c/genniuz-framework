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
use \System\Exceptions\SystemFileNotFoundException;

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
     * Paths to system loads.
     * @var string
     */
    protected static $fileExt = '.php';
    protected static $confPath   = ROOT . DS . 'configs' . DS;
    protected static $kernelPath = ROOT . DS . 'system' . DS .'kernel' . DS;

    /**
     * Paths to system loads.
     * @var string
     */
    protected static $fileRegister = [
        'configs' => [
            'app',
            'mail',
            'database',
            'aliases'
        ],
        'kernel' => [
            'commons',
            'configure',
            'fileloader',
            'finder',
            'timer',
            'env'
        ]
    ];

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

            self::loadKernel();
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
        $isOk = false;

        for($i = 0; $i < count(self::$fileRegister['configs']); $i++):
            if(!is_readable(self::$confPath . self::$fileRegister['configs'][$i] . self::$fileExt)):
                throw new SystemFileNotFoundException(
                    "Essential files of configurations not found in 'configs/'.");
            endif;
        endfor;
        
        /**
         * Load the config files.
         */
        self::$appFile   = require_once (self::$confPath . 'app.php');
        self::$dbFile    = require_once (self::$confPath . 'database.php');
        self::$mailFile  = require_once (self::$confPath . 'mail.php');
        self::$aliasFile = require_once (self::$confPath . 'aliases.php');

        return true;
    }

    /**
     * Load the system files.
     * @return boolean
     * 
     * @throws RuntimeException
     */
    protected static function loadKernel():bool
    {
        if(self::checkFiles(self::$kernelPath, 'kernel')):
            for($i = 0; $i < count(self::$fileRegister['kernel']); $i++):
                require_once (self::$kernelPath . self::$fileRegister['kernel'][$i] . self::$fileExt);
            endfor;
            
            return true;
        endif;

        return false;
    }

    private static function checkFiles(string $path, string $key)
    {
        $isOk = false;
        for($i = 0; $i < count(self::$fileRegister[$key]); $i++):
            if(!is_readable($path . self::$fileRegister[$key][$i] . self::$fileExt)):
                throw new SystemFileNotFoundException("Essential files not found in '{$path}/{$key}/'.");
            endif;
        endfor;
        
        return true;
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
                'Your PHP version must be equal or higher than "7.0" to use Genniuz.', E_USER_ERROR);
        endif;

        /*
         * Internationalization extension (further is referred as Intl) is a wrapper 
         * for ICU library, enabling PHP programmers to perform various locale-aware operations 
         * including but not limited to formatting, transliteration, encoding conversion, 
         * calendar operations, » UCA-conformant collation, locating text boundaries and working 
         * with locale identifiers, timezones and graphemes.
         */
        if(!extension_loaded('intl')):
            trigger_error('You must enable the "intl" extension to use Genniuz.', E_USER_ERROR);
        endif;

        /*
         * mbstring provides multibyte specific string functions that help you deal with 
         * multibyte encodings in PHP. In addition to that, mbstring handles character encoding 
         * conversion between the possible encoding pairs. mbstring is designed to handle 
         * Unicode-based * encodings such as UTF-8 and UCS-2 and many single-byte 
         * encodings for convenience.
         */
        if(!extension_loaded('mbstring')):
            trigger_error('You must enable the "mbstring" extension to use Genniuz.', E_USER_ERROR);
        endif;

        /*
         * The PHP Data Objects (PDO) extension defines a lightweight, consistent interface 
         * for accessing databases in PHP. Each database driver that implements the PDO interface 
         * can expose database-specific features as regular extension functions. Note that you cannot 
         * perform any database functions using the PDO extension by itself; you must use a 
         * database-specific PDO driver to access a database server.
         */
        if(!extension_loaded('pdo')):
            trigger_error('You must enable the "PDO" extension to use Genniuz.', E_USER_ERROR);
        endif;

        /*
         * This is an interface to the mcrypt library, which supports a wide variety of block algorithms 
         * such as DES, TripleDES, Blowfish (default), 3-WAY, SAFER-SK64, SAFER-SK128, TWOFISH, TEA, RC2 
         * and GOST in CBC, OFB, CFB and ECB cipher modes. Additionally, it supports RC6 and IDEA which 
         * are considered "non-free". CFB/OFB are 8bit by default.
         */
        if(!extension_loaded('mcrypt')):
            trigger_error('You must enable the "mcrypt" extension to use Genniuz.', E_USER_ERROR);
        endif;

        /*
         * This module uses the functions of OpenSSL for generation and verification of signatures and 
         * for sealing (encrypting) and opening (decrypting) data. OpenSSL offers many features that this 
         * module currently doesn't support. Some of these may be added in the future.
         */
        if(!extension_loaded('openssl')):
            trigger_error('You must enable the "openssl" extension to use Genniuz.', E_USER_ERROR);
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