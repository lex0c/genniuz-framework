<?php namespace Bootstrap;

/*
 ===========================================================================
 = Inicializa a Aplicação
 ===========================================================================
 =
 = Carrega os serviços, variaveis e componentes necessarios para 
 = inicializar a aplicação.
 = 
 */

use \RuntimeException;
use \System\Interfaces\IRunnable;

/**
 * Application Start
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \Bootstrap;
 * @copyright 2016 
 * @version 1.0.0
 */
class App implements IRunnable
{
	/**
     * Verifica se a aplicação já está rodando.
     * @var boolean
	 */
	private static $running = false;

    /**
     * Caminho para os arquivos de configurações
     * @var string
     */
    private static $path = '/../configs/';

    /**
     * Arquivos de configurações
     * @var array
     */
    protected static $appFile   = [];
    protected static $dbFile    = [];
    protected static $mailFile  = [];
    protected static $aliasFile = [];

    /**
     * AppStart
     * @param array [optional]
     * @return boolean
     * @throws RuntimeException
     */
    public static function run(array $data = []):bool
    {
        /**
         * Concatena o caminho completo até a pasta '/config'
         * @var string
         */
        self::$path = __DIR__ . self::$path;
        
        /**
         * Verifica se a aplicação não está rodando para carregar os módulos
         * apenas uma vez durante o escopo de execução..
         */
    	if(!self::$running):
            self::$running = true;
            
            if((is_readable(self::$path . 'app.php'))
                && (is_readable(self::$path . 'database.php')) 
                && (is_readable(self::$path . 'mail.php')) 
                && (is_readable(self::$path . 'aliases.php'))):
                
                /**
                 * Requisita e carrega as configurações 
                 */
                self::$appFile   = require_once (self::$path . 'app.php');
                self::$dbFile    = require_once (self::$path . 'database.php');
                self::$mailFile  = require_once (self::$path . 'mail.php');
                self::$aliasFile = require_once (self::$path . 'aliases.php');
            else:
                throw new RuntimeException("Essential files of configurations not found in '/configs/'.");
            endif;

            return true;
        endif;

        return false;
    }

    /**
     * AppSleep
     * @param array [optional]
     * @return boolean
     */
    public static function sleep(array $data = []):bool
    {}

    /**
     * AppDestroy
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
     * @return boolean
     */
    protected static function getRunnig():bool
    {
        return self::$running;
    }

}