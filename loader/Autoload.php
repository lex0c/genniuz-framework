<?php //namespace Loader;

use \RuntimeException;

/**
 * Application Autoloader
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @copyright 2016 Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package Loader/
 */

class Autoload
{
	protected static $paths = [
        /**
         * Caminhos para indicar ao autoload o que importar.
         * Aqui é onde são declarados todos os diretorios e subdiretorios para
         * poder instanciar as classes dinamicamente.
         * @var array
         */

        //Defina aqui os diretorios a serem mapeados...

    ];
	
    //Static Access
    protected function __construct()
    {}

    public static function run()
    {
        spl_autoload_register(function($className)
        {
            /**
             * Define o diretório raiz e o separador que os divide.
             * @var string
             */
            $separator = DIRECTORY_SEPARATOR;
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
            $ext = ['php', 'class.php', 'inc.php'];
            $extActive = $ext[0];

            foreach(self::$paths as $dir):
                if(substr($dir, -1) == '/'):
                    $dir .= str_replace(substr($dir, -1), '', substr($dir, -1));
                endif;

                if((!$dirIncluded) 
                    && (is_readable($baseDir.$separator."{$dir}".$separator."{$className}.{$extActive}")) 
                    && (!is_dir($baseDir.$separator."{$dir}".$separator."{$className}.{$extActive}"))):
                
                    /**
                     * Inclui a classe
                     * @return class
                     */
                    require_once ($baseDir.$separator."{$dir}".$separator."{$className}.{$extActive}");
                    $dirIncluded = true;
                endif;
            endforeach;

            /**
             * Retorna uma exceção caso não encontre a classe requisitada.
             * @throws RuntimeException 
             */
            if(!$dirIncluded):
                throw new RuntimeException("Class '{$className}.{$extActive}' not found!");
            endif;
        });
    }

}