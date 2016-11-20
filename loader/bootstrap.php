<?php //namespace Loader;

use \RuntimeException;

/**
 * Application Autoloader
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @copyright 2016 Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package Loader/
 */

$paths = [
    /**
     * Caminhos para indicar ao autoload o que importar.
     * Aqui é onde são declarados todos os diretorios e subdiretorios para
     * poder instanciar as classes dinamicamente.
     * @var array
     */

    //Defina aqui os diretorios a serem mapeados...

];

function __autoload($className)
{
    /**
     * Define o diretório raiz e o separador que os divide.
     * @var string
     */
    $baseDir = __DIR__ . '/..';
    $separator = DIRECTORY_SEPARATOR;

    /**
     * Carrega o array acima.
     * Checa se o diretório já foi incluido.
     * @var boolean
     */
    global $paths;
    $dirIncluded = false;

    /**
     * Define a extenção dos arquivos.
     * @var array
     */
    $ext = ['php', 'class.php', 'inc.php'];
    $extActive = $ext[0];

    /**
     * Percorre os diretórios e subdiretórios definidos no path a cima e requisita-os
     * no momento da instanciação da classe.
     */
    foreach($paths as $dir):
        if(substr($dir, -1) == '/'):
            $dir .= '';
        endif;
            
        if((!$dirIncluded) 
                && (file_exists($baseDir.$separator."{$dir}".$separator."{$className}.{$extActive}")) 
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
}