<?php namespace Installers;

/*
 ===========================================================================
 = Application Installer
 ===========================================================================
 =
 = Create and configure files, directories for run application.
 = 
 */

use Composer\Script\Event;
use \RuntimeException;

/**
 * Genniuz Installer
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \Installers;
 * @copyright 2016 
 * @version 1.0.0
 */
final class GenniuzInstaller
{
    /**
     * Create the '.appdata' file if it does not exist.
     *
     * @param string $dir The application's root directory.
     * @param IOInterface $io IO interface to write to console.
     * @return void
     */
    public static function createAppdata(string $dir, IOInterface $io):void
    {
        $default = ROOT . DS . '.app.example';
        $pointAppdata = ROOT . DS . '.appdata';
        
        if(is_readable($default)):
            copy($default, $pointAppdata);
            $io->write('Created `.appdata` file');
        endif;
    }

    /**
     * Create the dirs if it does not exist.
     *
     * @param string $dir The application's root directory.
     * @param IOInterface $io IO interface to write to console.
     * @return void
     */
    public static function createDirectories(string $dir, IOInterface $io):void
    {
        $paths = [
            'logs',
            'system/plugins',
            'tmp/compileds'
        ];

        
    }
    

    //...    

}