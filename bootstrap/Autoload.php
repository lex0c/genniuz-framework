<?php //namespace Bootstrap;

require_once (__DIR__ . '/../system/AppDataLoader.php');
use \RuntimeException;

/**
 * Autoload
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @copyright 2016 Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package Genniuz/Loader/
 */

class Autoload extends AppDataLoader
{
    /**
     * Caminhos para indicar ao autoload o que importar.
     * Defina os 'paths' na key 'autoload' no appdata na raiz do projeto.
     * @var array
     */
	protected static $paths = [];
    
    /**
     * Carrega configurações adicionais para o autoload.
     * Defina uma extensão para os arquivos: ['ext' => 'php'] 
     * @var array
     */
    protected static $config = [];

    /**
     * @var string
     */
    protected static $separator = DIRECTORY_SEPARATOR;
	
    //Static Access
    protected function __construct()
    {}
    
    /**
     * Inicializa o autoload.
     */
    public static function run()
    {   
        self::getData();
        self::load();
    }

    /**
     * Carrega os dados necessarios para o funcionamento do autoload.
     */
    protected static function getData()
    {
        $data = parent::loader('autoload');
        if(!empty($data)):
            self::$paths = $data['paths'];
            self::$config = $data['config'];
        else:
            throw new RuntimeException('Key "autoload" not found in "/appdata.php"');
        endif;
    }

    /**
     * Autoload
     */
    private static function load()
    {
        spl_autoload_register(function($className)
        {
            /**
             * Define o diretório raiz e o separador que os divide.
             * @var string
             */
            $separator = self::$separator;
            $baseDir = __DIR__ . $separator . '..';

            /**
             * Checa se o diretório já foi incluido.
             * @var boolean
             */
            $dirIncluded = false;

            /**
             * Define a extenção dos arquivos.
             * @var array
             */
            $ext = self::$config['ext'];

            foreach(self::$paths as $dir):
                if(substr($dir, -1) == '/'):
                    $dir .= str_replace(substr($dir, -1), '', substr($dir, -1));
                endif;

                if((!$dirIncluded) 
                    && (is_readable($baseDir.$separator."{$dir}".$separator."{$className}.{$ext}")) 
                    && (!is_dir($baseDir.$separator."{$dir}".$separator."{$className}.{$ext}"))):
                
                    /**
                     * Inclui a classe
                     * @return class
                     */
                    require_once ($baseDir.$separator."{$dir}".$separator."{$className}.{$ext}");
                    $dirIncluded = true;
                endif;
            endforeach;

            /**
             * Retorna uma exceção caso não encontre a classe requisitada.
             * @throws RuntimeException 
             */
            if(!$dirIncluded):
                throw new RuntimeException("Class '{$className}.{$ext}' not found in '{$dir}'!");
            endif;
        });
    }

}