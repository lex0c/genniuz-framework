<?php //namespace Bootstrap;

require_once (__DIR__ . '/../system/interfaces/RunnableInterface.php');

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
 use \InvalidArgumentException;

/**
 * Application Start
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \Bootstrap;
 * @copyright 2016 
 * @version 1.0.0
 */
final class App implements RunnableInterface
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
    private static $appFile   = [];
    private static $dbFile    = [];
    private static $mailFile  = [];
    private static $aliasFile = [];

    /**
     * AppStart
     * @param array [optional]
     * @return boolean
     * @throws RuntimeException
     */
    public static function run(array $data = [])
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
            
            /**
             * Inicializa o autoloader
             */
            require_once (App::alias('autoload'));
            return true;
        endif;

        return false;
    }

    /**
     * AppSleep
     * @param array [optional]
     * @return boolean
     */
    public static function sleep(array $data = [])
    {}

    /**
     * AppDestroy
     * @return boolean
     */
    public static function destroy()
    {}

    /**
     * Retorna as variaveis de ambiente referente a 'app'
     * @param string
     * @return array
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function get($index)
    {
        if(self::$running):
            if((is_string($index)) && (array_key_exists($index, self::$appFile))):
                return self::$appFile[$index];
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
        if(self::$running):
            if((is_string($index)) && (array_key_exists($index, self::$dbFile))):
                return self::$dbFile[$index];
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
        if(self::$running):
            if((is_string($index)) && (array_key_exists($index, self::$mailFile))):
                return self::$mailFile[$index];
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
        if(self::$running):
            if((is_string($index)) && (array_key_exists($index, self::$aliasFile))):
                return self::$aliasFile[$index];
            else:
                throw new InvalidArgumentException("Key not found in 'aliases'!");
            endif;
        else:
            throw new RuntimeException("Application not initialized!");
        endif;

        return [];
    }

}